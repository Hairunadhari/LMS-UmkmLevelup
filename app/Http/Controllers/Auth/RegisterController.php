<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\DemoMail;
use App\Jobs\SendEmailJob;
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
            'email'=>'Email Harus Diisi',
            'no_wa'=>'No HP Harus Diisi',
            'password'=>'Password Harus Diisi dan min 8 character',
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
        return redirect('/pendaftaran')->with('success', [
          'type' => 'error',
          'message' => $alertMessage,
        ]);
      }
    

      try {
          DB::beginTransaction();
          $cekWa = DB::table('users')->where('aktif', 1)->where('no_wa',$request->no_wa)->whereNotNull('email_verified_at')->first();
          $konvers_tanggal = Carbon::parse(now(),'UTC')->setTimezone('Asia/Jakarta');
          $now = $konvers_tanggal->format('Y-m-d H:i:s');
          if ($cekWa !== null) {
                  session()->flash('name', $request->name);
                  session()->flash('email', $request->email);
                  session()->flash('no_wa', $request->no_wa);
                  return redirect('/pendaftaran')->with('success', [
                      'type' => 'error',
                      'message' => 'No HP Sudah Dipakai',
                  ]);
          }
        
        $cekuser = DB::table('users')->where('aktif', 1)->where('email',$request->email)->whereNotNull('email_verified_at')->first();           
        if ($cekuser == null) {
            $cekuserVerifiedNull = DB::table('users')->where('aktif', 1)->where('email',$request->email)->whereNull('email_verified_at')->orderBy('id','desc')->first();           
            if ($cekuserVerifiedNull != null) {
                DB::table('users')->where('aktif', 1)->where('email',$request->email)->whereNull('email_verified_at')->orderBy('id','desc')->update([
                    'name' => $request->name,
                    'no_wa' => $request->no_wa,
                    'password' => Hash::make($request->password),
                    'updated_at' => $now,
                ]);
            } else{
             
                DB::table('users')->insert([
                    'name' => $request->name,
                    'no_wa' => $request->no_wa,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'aktif' => 1,
                    'final_level' => 0,
                    'created_at' => $now,
                ]);
              
            }
            
        }else{
            session()->flash('name', $request->name);
            session()->flash('email', $request->email);
            session()->flash('no_wa', $request->no_wa);
            
            return redirect()->back()->with('success', [
                'type' => 'error',
                'message' => 'Email Sudah Dipakai',
            ]);
        }

        $getuser = DB::table('users')->where('aktif', 1)->where('email',$request->email)->first();           
        $otp = mt_rand(100000, 999999);
      
        DB::table('t_otp')->insert([
            'kode_otp' => $otp,
            'id_user' => $getuser->id,
            'status' => 0,
            'created_at' => $now,
        ]);
    
        
        $mailData = [
            'title' => 'Mail from noreply@umkmlevelup.id',
            'body' => 'Harap isi kode otp berikut ini.',
            'otp' => $otp,
            'email' => $request->email
        ];
        dispatch(new SendEmailJob($mailData));
        $request->session()->forget('alert');
        $encryptEmail = Crypt::encrypt($request->email);
        $encryptIduser = Crypt::encrypt($getuser->id);

        DB::commit();

    } catch (\Throwable $th) {
        DB::rollback();
        return back()->with('success', [
            'type' => 'error',
            'message' => $th->getMessage(),
        ]);
    }
    

    return redirect('/verifikasiOtp/'.$encryptEmail.'/'.$encryptIduser);
    // return redirect('/login')->with('success', [
    //     'type' => 'success',
    //     'message' => 'Registrasi Berhasil, Silahkan Login',
    // ]);
   

}

public function submitOtp(Request $request){
    try {
        DB::beginTransaction();
        $otp = $request->otp;
        $checkOtp = DB::table('t_otp')->where('id_user', $request->id_user)->where('status', 0)->latest()->first();
        if($checkOtp->kode_otp == $otp){
            DB::table('t_otp')->where('id_user', $request->id_user)->where('kode_otp',$otp)->where('status', 0)->latest()->update([
                'status' => 1,
            ]);
            DB::table('users')->where('aktif', 1)->where('id', $request->id_user)->update([
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]);
        }else{
            throw new \Exception('');
        }
        DB::commit();
    } catch (\Exception $th) {
        DB::rollback();
        //throw $th;
        $request->session()->flash('alert', [
            'type' => 'error',
            'message' => 'Kode OTP salah.',
        ]);
        $d['email'] = $request->email;
        
        return back()->with($d);
    }
    $request->session()->forget('alert');
    $request->session()->flash('success', [
        'type' => 'info',
        'message' => 'Selamat anda sudah terverifikasi, silahkan login kembali menggunakan email dan password anda.',
    ]);
    return redirect('/login');
}


    public function verifikasiOtp($encryptEmail, $encryptIduser){
        $email = Crypt::decrypt($encryptEmail);
        $id_user = Crypt::decrypt($encryptIduser);
        return view('verifikasiOtp', compact('email','id_user'));
    }

    public function resend_otp($email_user){
        try {
            DB::beginTransaction();
            $getuser = DB::table('users')->where('aktif', 1)->where('email',$email_user)->orderBy('id','desc')->first();           
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
                'otp' => $otp,
                'email' => $email_user
            ];
            
            dispatch(new SendEmailJob($mailData));
            // Mail::to($mailData['email'])->send(new DemoMail($mailData));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th)
        }
        return response()->json('success');
    }

    public function tes(){ 
        try {
            DB::beginTransaction();
            // Loop untuk mengirim email sebanyak 100 kali
            for ($i = 2605; $i <= 2620; $i++) {
                $otp = mt_rand(100000, 999999);
                
                $mail = 'arunzxxxxxxx+' . $i . '@gmail.com'; // Menambahkan nomor ke alamat email
                $a = DB::table('users')->where('email',$mail)->where('email_verified_at','!=',null)->first();
                $mailData = [
                    'title' => 'Mail from noreply@umkmlevelup.id',
                    'body' => 'Harap isi kode otp berikut ini.',
                    'otp' => $otp,
                    'email' => $mail,
                ];
            
                    DB::table('users')->insert([
                        'name' => 'testing'.$i,
                        'no_wa' => 22,
                        'email' => $mail,
                        'password' => Hash::make('testing'),
                        'aktif' => 1,
                        'final_level' => 0,
                    ]);
               
                
                dispatch(new SendEmailJob($mailData));
               
            }
                
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            // Menangani kesalahan
        }
        
        return 'success';
        
    }

    public function tesipin(){
        $otp = mt_rand(100000, 999999);
       
        $mailData = [
            'title' => 'Mail from noreply@umkmlevelup.id',
            'body' => 'Harap isi kode otp berikut ini.',
            'otp' => $otp
        ];
        
        Mail::to('arifin.officialwork@gmail.com')->send(new DemoMail($mailData));
        return 'success';
    }
}
