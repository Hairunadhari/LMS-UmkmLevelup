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
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        $forms = DB::table('forms')->orderBy('id', 'DESC')->first();
        $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'';
        $d['data'][0]['title'] = $forms->title;
        $d['data'][0]['desc'] = $forms->description;
        return view('home', $d);
    }

    public function profil(){
        $d = [];
        $d['user'] = DB::table('profil_user')->where('id_user', Auth::user()->id)->first();
        $forms = DB::table('forms')->orderBy('id', 'DESC')->first();
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'';
        $d['data'][0]['title'] = 'Test Kuesioner';
        $d['data'][0]['desc'] = 'Desc Kuesioner';
        return view('profil', $d);
    }
}
