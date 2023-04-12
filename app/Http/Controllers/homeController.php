<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(Request $request  ){
        $d = [];
        $currenturl = url()->full();
        if (Auth::user()) {
            $request->session()->put('url', $currenturl);
        }else{
            redirect('login');
        }
        $check = DB::table('form_submissions')->where('id_user', Auth::user()->id)->count();
        if($check == 0){
            $d['done'] = false;
        }else{
            $d['done'] = true;
        }
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        $forms = DB::table('forms')->whereNotNull('deleted_at')->orderBy('id', 'DESC')->first();
        $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'/'.Auth::user()->id;
        $d['data'][0]['title'] = $forms->title;
        $d['data'][0]['desc'] = $forms->description;

        return view('home', $d);
    }

    public function profil(){
        $d = [];
        $d['user'] = DB::table('profil_user')->where('id_user', Auth::user()->id)->first();
        $d['nama_kabupaten'] = DB::table('m_kabupaten')->where('id_kabupaten', $d['user']->id_kabupaten)->first()->nama_kabupaten;
        $d['nama_kecamatan'] = DB::table('m_kecamatan')->where('id_kecamatan', $d['user']->id_kecamatan)->first()->nama_kecamatan;
        $d['nama_kelurahan'] = DB::table('m_kelurahan')->where('id_kelurahan', $d['user']->id_keluarahan)->first()->nama_kelurahan;
        $forms = DB::table('forms')->orderBy('id', 'DESC')->first();
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'/'.Auth::user()->id;
        $d['data'][0]['title'] = 'Test Kuesioner';
        $d['data'][0]['desc'] = 'Desc Kuesioner';
        return view('profil', $d);
    }

     public function kuesioner()
    {
        $check = DB::table('form_submissions')->where('id_user', Auth::user()->id)->count();
        if($check == 0){
            $d['done'] = false;
        }else{
            $d['done'] = true;
        }
        return view('kuesioner', $d);
    }
}
