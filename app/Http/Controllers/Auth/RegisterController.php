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
    public function index(Request $request)
    {
        // if (Auth::check()) {
        //     return redirect()->intended('home');
        // }
        $request->session()->forget('alert');
        return view('pendaftaran');
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
        $query = DB::table('users')->where('email', $data['email']);
        $check = $query->count();
        if ($check == 0) {
            return DB::table('users')->insertGetId([
                'name' => $data['name'],
                'no_wa' => $data['no_wa'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }else{
            return $query->first()->id;
        }
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

    // public function showRegistrationForm()
    // {
    //     return view('auth.register');
    // }

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
        $checkUser = DB::table('users')->where('email', $request->email)->where('aktif', 1)->whereNotNull('email_verified_at')->count();
        if($checkUser == 0){
            $id = $this->create($request->all());
        }else{
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'Email Sudah terpakai.',
            ]);
            return view('pendaftaran');
        }
        $checkUserVerif = DB::table('users')->where('no_wa', $request->no_wa)->where('aktif', 1)->whereNotNull('email_verified_at')->count();
        if($checkUserVerif == 0){
            $id = DB::table('users')->where('email', $request->email)->first()->id;
            DB::table('users')->where('id', $id)->update([
                'name' => $request->name,
                'no_wa' => $request->no_wa,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'aktif' => 1,
            ]);
        }else{
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'No Hp Sudah terpakai.',
            ]);
            return view('pendaftaran');
        }
        DB::commit();
    } catch (\Throwable $th) {
        // dd(str_contains($th->getMessage(), 'no_wa'));
        if (str_contains($th->getMessage(), 'no_wa')) {
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'No Wa Sudah Terpakai.',
            ]);
        }else{ 
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'Email Sudah Terpakai.',
            ]);   
        }
        return view('pendaftaran');
        DB::rollBack();
    }
    
    $otp = mt_rand(100000, 999999);

    // DB::table('t_otp')->where('id_user', $id)->where('status', 0)->update([
    //     'status' => 2,
    // ]);

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
    $request->session()->forget('alert');
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
        'message' => 'Selamat anda sudah terverifikasi, silahkan login kembali menggunakan email dan password anda.',
    ]);
    return view('login');
}

}
