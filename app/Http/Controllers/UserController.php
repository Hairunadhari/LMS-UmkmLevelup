<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\ForgotMail;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

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

        return redirect('/home');
    }

    public function updateProfil(Request $request)
    {
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
            'type' => 'info',
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
        $checkUser = DB::table('users')->where('email', $request->email)->where('aktif', 1)->first();
        if ($checkUser != null) {
            $encryptId = urlencode(Crypt::encryptString($checkUser->id));
        }else{
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'akun dengan email "'.$request->email.'" tidak terdaftar di akun',
            ]);
            return view('forgot');
        }

        $mailData = [
            'title' => 'Mail from umkmlevelup.id',
            'body' => 'Berikut email lupa password anda.',
            'link' => env('APP_URL')."/reset-password/".$encryptId
        ];
    
        Mail::to($request->email)->send(new ForgotMail($mailData));
    
        $d['email'] = $request->email;

        $request->session()->flash('success', [
            'type' => 'info',
            'message' => 'email "lupa password" sudah terkirim, silahkan periksa email anda.',
        ]);
        return view('login');
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
        $request->session()->flash('success', [
            'type' => 'info',
            'message' => 'password anda sudah direset, silahkan login kembali',
        ]);
        return view('login');
    }
}
