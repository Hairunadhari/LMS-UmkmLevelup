<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        $d = [];
        $d['dataProv'] = DB::table('m_provinsi')->where('aktif', 1)->get();
        $d['data'][0]['link'] = 'http://localhost:8000/kuesioner?href=http://194.59.165.67:8082/forms/test-kuesioner';
        $d['data'][0]['title'] = 'Test Kuesioner';
        $d['data'][0]['desc'] = 'Desc Kuesioner';
        return view('home', $d);
    }
}
