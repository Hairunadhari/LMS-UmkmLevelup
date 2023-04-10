<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Mail;
use App\Mail\DemoMail;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    protected function create(array $data)
    {
    
    return DB::table('users')->insertGetId([
        'name' => $data['name'],
        'no_wa' => $data['no_wa'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showRegistrationForm()
{
    return view('auth.register');
}

protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    // return true;
}

public function register(Request $request)
{
    try {
        DB::beginTransaction();
        $checkUser = DB::table('users')->where('email', $request->email)->count();
        if($checkUser == 0){
            $id = $this->create($request->all());
        }else{
            $checkUserVerif = DB::table('users')->where('email', $request->email)->whereNotNull('email_verified_at')->count();
            if($checkUser == 0){
                $id = DB::table('users')->where('email', $request->email)->first()->id;
                DB::table('users')->where('id', $id)->update([
                    'name' => $request->name,
                    'no_wa' => $request->no_wa,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }else{
                $request->session()->flash('alert', [
                    'type' => 'error',
                    'message' => 'Email / No Hp Sudah terpakai.',
                ]);
                return view('pendaftaran');
            }
        }
        DB::commit();
    } catch (\Throwable $th) {
        DB::rollBack();
        $request->session()->flash('alert', [
            'type' => 'error',
            'message' => 'Email / No Hp Sudah Terpakai.',
        ]);
        return view('pendaftaran');
    }
    $otp = mt_rand(100000, 999999);

    DB::table('t_otp')->where('id_user', $id)->where('status', 0)->update([
        'status' => 2,
    ]);

    DB::table('t_otp')->insert([
        'kode_otp' => $otp,
        'id_user' => $id,
        'status' => 0,
        'created_at' => null,
    ]);

    $mailData = [
        'title' => 'Mail from umkmlevelup.id',
        'body' => 'Harap isi kode otp berikut ini.',
        'otp' => $otp
    ];

    Mail::to($request->email)->send(new DemoMail($mailData));

    $d['email'] = $request->email;
    $d['id_user'] = $id;

    return view('verifikasiOtp', $d);
}

public function submitOtp(Request $request){
    $otp = $request->otp;
    try {
        $checkOtp = DB::table('t_otp')->where('kode_otp', $otp)->where('id_user', $request->id_user)->where('status', 0)->count();
        // dd($request->id_user);
        if($checkOtp > 0){
            DB::table('t_otp')->where('kode_otp', $otp)->where('id_user', $request->id_user)->where('status', 0)->update([
                'status' => 1,
            ]);
            DB::table('users')->where('id', $request->id_user)->update([
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]);
        }else{
            throw new \Exception('');
        }
    } catch (\Exception $th) {
        //throw $th;
        $request->session()->flash('alert', [
            'type' => 'error',
            'message' => 'Kode OTP salah.',
        ]);
        $d['email'] = $request->email;
        $d['id_user'] = $request->id_user;
        
        return view('verifikasiOtp', $d);
    }
    $request->session()->forget('alert');
    $request->session()->flash('success', [
        'type' => 'info',
        'message' => 'Selamat anda sudah terverifikasi, silahkan login kembali menggunakan username dan password anda.',
    ]);
    return view('login');
}

}
