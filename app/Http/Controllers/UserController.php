<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\ForgotMail;

class UserController extends Controller
{
    public function submitProfil(Request $request)
    {
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
            dd($th);
       }
       $request->session()->flash('success', [
            'type' => 'info',
            'message' => 'Terimakasih anda sudah mengisi kelengkapan data.',
        ]);
        if($request->session()->has('url'))
        {
            return redirect($request->session()->get('url'));
        }else{
            return redirect('home');
        }
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
            return redirect('home');
        // }
    }

    public function forgot(){
        return view('forgot');
    }

    public function forgotPassword(Request $request){
        $mailData = [
            'title' => 'Mail from umkmlevelup.id',
            'body' => 'Berikut email lupa password anda.',
        ];
    
        Mail::to($request->email)->send(new ForgotMail($mailData));
    
        $d['email'] = $request->email;

        $request->session()->flash('success', [
            'type' => 'info',
            'message' => 'email "lupa password" sudah terkirim, silahkan periksa email anda.',
        ]);
        return view('login');
    }
}
