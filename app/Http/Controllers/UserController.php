<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Mail\ForgotMail;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Jobs\SendEmailForgotJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function submitProfil(Request $request)
    {
        // dd($request);
       try {
            DB::beginTransaction();
            
            $checkUser = DB::table('profil_user')->where('id_user', Auth::user()->id)->count();
            if($checkUser == 0){
                DB::table('profil_user')->insert([
                    'id_user' => Auth::user()->id,
                    'nama_pemilik' => $request->namaPemilik,
                    'id_provinsi' => $request->provinsi,
                    'id_kabupaten' => $request->kabupaten,
                    // 'nama_kabupaten' => $request->namaPemilik,
                    'id_kecamatan' => $request->kecamatan,
                    // 'nama_kecamatan' => $request->namaPemilik,
                    'id_keluarahan' => $request->kelurahan,
                    // 'nama_kelurahan' => $request->namaPemilik,
                    'alamat_lengkap' => $request->alamat,
                    'nama_usaha' => $request->namaUsaha,
                    'email_usaha' => $request->email,
                    'no_telp' => $request->no_telp,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenisKelamin,
                    'nik' => $request->nik,
                    'nib' => $request->nib,
                ]);
            }else{
                DB::table('profil_user')->where('id_user', Auth::user()->id)->update([
                    'id_user' => Auth::user()->id,
                    'nama_pemilik' => $request->namaPemilik,
                    'id_provinsi' => $request->provinsi,
                    'id_kabupaten' => $request->kabupaten,
                    // 'nama_kabupaten' => $request->namaPemilik,
                    'id_kecamatan' => $request->kecamatan,
                    // 'nama_kecamatan' => $request->namaPemilik,
                    'id_keluarahan' => $request->kelurahan,
                    // 'nama_kelurahan' => $request->namaPemilik,
                    'alamat_lengkap' => $request->alamat,
                    'nama_usaha' => $request->namaUsaha,
                    'email_usaha' => $request->email,
                    'no_telp' => $request->no_telp,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenisKelamin,
                    'nik' => $request->nik,
                    'nib' => $request->nib,
                ]);
            }

            DB::table('users')->where('id', Auth::user()->id)->update([
                 'profil' => 1,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'Error saat mengisi kelengkapan data.',
            ]);
       }
       $request->session()->flash('success', [
            'type' => 'info',
            'message' => 'Terimakasih anda sudah mengisi kelengkapan data.',
        ]);
        // if($request->session()->has('url'))
        // {
        //     return redirect($request->session()->get('url'));
        // }else{
        //     return redirect('home');
        // }

        if($checkUser == 0){
            $forms = DB::table('forms')->whereNull('deleted_at')->orderBy('id', 'DESC')->first();
            return redirect(config('app.url').'/kuesioner?href='.urlencode(env('KUISIONER_URL').'/forms/'.$forms->slug.'/'.Auth::user()->id));
        }

        return redirect('/home');
    }

    public function updateProfil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik'                  => 'nullable|size:16',
            // 'nib'                  => 'size:13',
           
        ],
            [
                'nik'=>'NIK harus terdiri dari 16 karakter.',
                // 'nib'=>'NIB harus terdiri dari 13 karakter.',
               
            ]
        );
        
        if ($validator->fails()) {
            $messages = $validator->messages();
            $alertMessage = $messages->first();
            // Tampilkan pesan error
            return redirect()->back()->with('error', [
              'type' => 'error',
              'message' => $alertMessage,
            ]);
          }
       try {
            DB::beginTransaction();
                DB::table('profil_user')->where('id_user', Auth::user()->id)->update([
                    'nama_pemilik' => $request->namaPemilik,
                    'id_provinsi' => $request->provinsi,
                    'id_kabupaten' => $request->kabupaten,
                    // 'nama_kabupaten' => $request->namaPemilik,
                    'id_kecamatan' => $request->kecamatan,
                    // 'nama_kecamatan' => $request->namaPemilik,
                    'id_keluarahan' => $request->kelurahan,
                    // 'nama_kelurahan' => $request->namaPemilik,
                    'alamat_lengkap' => $request->alamat,
                    'nama_usaha' => $request->namaUsaha,
                    'email_usaha' => $request->email,
                    'no_telp' => $request->no_telp,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenisKelamin,
                    'nik' => $request->nik,
                    'nib' => $request->nib,
                ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
       }
       $request->session()->flash('success', [
            'type' => 'success',
            'message' => 'Profil sudah diupdate.',
        ]);
        // if($request->session()->has('url'))
        // {
        //     return redirect($request->session()->get('url'));
        // }else{
            // return redirect('home');
            return redirect('home');
        // }
    }

    public function forgot(){
        return view('forgot');
    }

    public function forgotPassword(Request $request){
        try {
            DB::beginTransaction();
            $checkUser = DB::table('users')->where('email', $request->email)->where('aktif', 1)->first();
            if ($checkUser != null) {
                $encryptId = urlencode(Crypt::encryptString($checkUser->id));
            }else{
                $request->session()->flash('alert', [
                    'type' => 'error',
                    'message' => 'akun dengan email "'.$request->email.'" tidak terdaftar di akun',
                ]);
                return redirect('/forgot');
            }

            $mailData = [
                'title' => 'Mail from umkmlevelup.id',
                'body' => 'Berikut email lupa password anda.',
                'link' => env('APP_URL')."/reset-password/".$encryptId,
                'email' => $request->email,
            ];
            dispatch(new SendEmailForgotJob($mailData));
            // Mail::to($mailData['email'])->send(new ForgotMail($mailData));
    
        
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th);
            return back()->with('success', [
                'type' => 'error',
                'message' => 'Ada Kesalahan, '.$th->getMessage(),
            ]);
            //throw $th;
        }
        
        return redirect('/login')->with('success', [
            'type' => 'info',
            'message' => 'email "lupa password" sudah terkirim, silahkan periksa email anda.',
        ]);
    }

    public function doReset($url) {
        $d['id'] = Crypt::decryptString(urldecode($url));
        $d['url'] = $url;
        return view('reset-password', $d);
    }

    public function resetting(Request $request) {
        if ($request->password == $request->konfirmasi_password) {
            DB::table('users')->where('aktif', 1)->where('id', $request->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }else{
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'password dan konfirmasi password tidak sesuai',
            ]);
            return redirect('reset-password/'.$request->url);
        }
        return redirect('/login')->with('success', [
            'type' => 'info',
            'message' => 'password anda sudah direset, silahkan login kembali',
        ]);
    }

    public function reset_view(){
        return view('reset-pass');
    }

    public function cek_email(Request $request){
        try {
            //code...
            $cekEmail = DB::table('users')->where('email',$request->email)->first();
            $encryptEmail = Crypt::encrypt($request->email);
            if ($cekEmail == null) {
                return back()->with(['error'=>'Email Tidak Ditemukan!']);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        return redirect('/pass-view/'.$encryptEmail);
    }
    public function pass_view($encryptEmail){
        $email = Crypt::decrypt($encryptEmail);
        
        return view('pass-view',compact('email'));

    }
    public function update_password(Request $request){
        $validator = Validator::make($request->all(), [
            'password'              => 'required|min:8',
        ],
    [
        'password.min'=>'Password Minimal 8 Karakter'
    ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            $alertMessage = $messages->first();
          
            // Tampilkan pesan error
            return back()->with([
              'error' => $alertMessage,
            ]);
          }

          try {
            DB::beginTransaction();
            DB::table('users')->where('email',$request->email)->update([
                'password'=> Hash::make($request->password),
            ]);
            DB::commit();
        } catch (\Throwable $th) {
              DB::rollback();
            return back()->with(['error'=>$th->getMessage()]);
        }
         return redirect('/reset-pass')->with(['success'=>'Password Berhasil Diupdate!']);

    }

    public function privacy_policy(){
        return view('privacy-policy');
    }
}
