<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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
        //     return view('pendaftaran');
        // }
            return view('pendaftaran');
        // $request->session()->forget('alert');    
        // return view('underconstruct');
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

    // protected function create(array $data)
    // {
    //     $query = DB::table('users')->where('email', $data['email']);
    //     $check = $query->count();
    //     if ($check == 0) {
    //         return DB::table('users')->insertGetId([
    //             'name' => $data['name'],
    //             'no_wa' => $data['no_wa'],
    //             'email' => $data['email'],
    //             'password' => Hash::make($data['password']),
    //         ]);
    //     }else{
    //         return $query->first()->id;
    //     }
    // }


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
    $validator = Validator::make($request->all(), [
        'name'                  => 'required',
        'email'                 => 'required|email',
        'no_wa'                 => 'required',
        'password'              => 'required|min:8',
        'konfirmasi_password' => 'required|same:password',
    ],
        [
            'name'=>'Nama Harus Diisi',
            'email'=>'Email Sudah Dipakai',
            'no_wa'=>'No HP Sudah Dipakai',
            'password'=>'Password min 8 character',
            'konfirmasi_password'=>'Konfirmasi Password Tidak Cocok',
        ]
    );
    
    if ($validator->fails()) {
        $messages = $validator->messages();
        $alertMessage = $messages->first();
      
        // Simpan data inputan email sebelumnya
        session()->flash('name', $request->name);
        session()->flash('email', $request->email);
        session()->flash('no_wa', $request->no_wa);
      
        // Tampilkan pesan error
        return redirect()->back()->with('success', [
          'type' => 'error',
          'message' => $alertMessage,
        ]);
      }
    

      try {
          DB::beginTransaction();
          $cekWa = DB::table('users')->where('no_wa',$request->no_wa)->first();
          if ($cekWa !== null) {
              if ($request->no_wa == $cekWa->no_wa) {
                  session()->flash('name', $request->name);
                  session()->flash('email', $request->email);
                  session()->flash('no_wa', $request->no_wa);
                  return redirect()->back()->with('success', [
                      'type' => 'error',
                      'message' => 'No HP Sudah Dipakai',
                  ]);
              }           
          }
        
        $cekuser = DB::table('users')->where('email',$request->email)->first();           
        if ($cekuser == null) {
            DB::table('users')->insert([
                'name' => $request->name,
                'no_wa' => $request->no_wa,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'aktif' => 1,
                'final_level' => 0,
            ]);
        }
        $getuser = DB::table('users')->where('email',$request->email)->first();           
        $otp = mt_rand(100000, 999999);
        $konvers_tanggal = Carbon::parse(now(),'UTC')->setTimezone('Asia/Jakarta');
        $now = $konvers_tanggal->format('Y-m-d H:i:s');
        DB::table('t_otp')->insert([
            'kode_otp' => $otp,
            'id_user' => $getuser->id,
            'status' => 0,
            'created_at' => $now,
        ]);
    
        $mailData = [
            'title' => 'Mail from noreply@umkmlevelup.id',
            'body' => 'Harap isi kode otp berikut ini.',
            'otp' => $otp
        ];
        
        Mail::to($request->email)->send(new DemoMail($mailData));
        $request->session()->forget('alert');
        $encryptEmail = Crypt::encrypt($request->email);
        $encryptIduser = Crypt::encrypt($getuser->id);
        DB::commit();

    } catch (\Throwable $th) {
        dd($th);
        return view('ndaran');
        DB::rollBack();
    }
    

    return redirect('verifikasiOtp/'.$encryptEmail.'/'.$encryptIduser);

}

public function submitOtp(Request $request){
    $otp = $request->otp;
    try {
        $checkOtp = DB::table('t_otp')->where('kode_otp', $otp)->where('id_user', $request->id_user)->where('status', 0)->count();
        // dd($request->id_user);
        // dd($checkOtp);
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
    return redirect('login');
}


    public function verifikasiOtp($encryptEmail, $encryptId_user){
        $email = Crypt::decrypt($encryptEmail);
        $id_user = Crypt::decrypt($encryptId_user);
        return view('verifikasiOtp', compact('email', 'id_user'));
    }

    public function resend_otp($email_user){
        $getuser = DB::table('users')->where('email',$email_user)->first();           
        $otp = mt_rand(100000, 999999);
        $konvers_tanggal = Carbon::parse(now(),'UTC')->setTimezone('Asia/Jakarta');
        $now = $konvers_tanggal->format('Y-m-d H:i:s');
        DB::table('t_otp')->insert([
            'kode_otp' => $otp,
            'id_user' => $getuser->id,
            'status' => 0,
            'created_at' => $now,
        ]);
    
        $mailData = [
            'title' => 'Mail from noreply@umkmlevelup.id',
            'body' => 'Harap isi kode otp berikut ini.',
            'otp' => $otp
        ];
        
        Mail::to($email_user)->send(new DemoMail($mailData));
        return response()->json('success');
    }

    public function tes(){
        $otp = mt_rand(100000, 999999);
       
        $mailData = [
            'title' => 'Mail from noreply@umkmlevelup.id',
            'body' => 'Harap isi kode otp berikut ini.',
            'otp' => $otp
        ];
        
        Mail::to('hairunadhari@gmail.com')->send(new DemoMail($mailData));
        return 'success';
    }
}
