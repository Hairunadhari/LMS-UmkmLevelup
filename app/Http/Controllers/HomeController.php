<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request  ){
        $d = [];
        $currenturl = url()->full();
        $hashids = new Hashids();
        if (Auth::user()) {
            $request->session()->put('url', $currenturl);
        }else{
            redirect('login');
        }
        $forms = DB::table('forms')->whereNull('deleted_at')->orderBy('id', 'DESC')->first();
        $check = DB::table('form_submissions')->where('id_user', Auth::user()->id)->count();
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        if($check == 0){
            $d['done'] = false;
            $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'/'.Auth::user()->id.'&read=true';
            $d['data'][0]['title'] = $forms->title;
            $d['data'][0]['desc'] = $forms->description;
        }else{
            $d['done'] = true;
            $checkSubmission = DB::table('form_submissions')->where('id_user', Auth::user()->id)->where('savedSession', 1)->count();
            $submission = DB::table('form_submissions')->where('id_user', Auth::user()->id)->orderBy('form_id', 'desc')->first();
            if($checkSubmission == 0){
                // $d['data'][0]['link'] = '';
                $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'?submission_id='.$hashids->encode($submission->id);
                $d['data'][0]['title'] = $forms->title;
                $d['data'][0]['desc'] = $forms->description;
            }else{
                $d['done'] = false;
                $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'?submission_id='.$hashids->encode($submission->id);
                $d['data'][0]['title'] = $forms->title;
                $d['data'][0]['desc'] = $forms->description;
            }
        }
        return view('home', $d);
    }

    public function profil(){
        $d = [];
        $d['user'] = DB::table('profil_user')->where('id_user', Auth::user()->id)->first();
        if ($d['user'] == null) {
            return redirect()->back()->with('success', [
                'type' => 'error',
                'message' => 'Harap lengkapi profil usaha anda terlebih dahulu!',
              ]);
        }
        if ($d['user'] == '') {
            $d['nama_kabupaten'] = '';    
            $d['nama_kecamatan'] = '';
            $d['nama_kelurahan'] = '';
        }else{
            $d['nama_kabupaten'] = DB::table('m_kabupaten')->where('id_kabupaten', $d['user']->id_kabupaten)->first()->nama_kabupaten;
            $d['nama_kecamatan'] = DB::table('m_kecamatan')->where('id_kecamatan', $d['user']->id_kecamatan)->first()->nama_kecamatan;
            $d['nama_kelurahan'] = DB::table('m_kelurahan')->where('id_kelurahan', $d['user']->id_keluarahan)->first()->nama_kelurahan;
        }
        $forms = DB::table('forms')->orderBy('id', 'DESC')->first();
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        $d['data'][0]['link'] = config('app.url').'/kuesioner?href='.env('KUISIONER_URL').'/forms/'.$forms->slug.'/'.Auth::user()->id;
        $d['data'][0]['title'] = 'Test Kuesioner';
        $d['data'][0]['desc'] = 'Desc Kuesioner';
        return view('profil', $d);
    }

    public function kuesioner()
    {
        // $currenturl = url()->full();
        if (Auth::user() == null) {
            return redirect('login');
        }else{
        }
        $check = DB::table('form_submissions')->where('savedSession', 1)->where('id_user', Auth::user()->id)->count();
        if($check == 0){
            $d['done'] = false;
        }else{
            $d['done'] = false;
            // $submission = DB::table('form_submissions')->where('savedSession', 1)->where('id_user', Auth::user()->id)->first();
        }
        return view('kuesioner', $d);
    }

    

}
