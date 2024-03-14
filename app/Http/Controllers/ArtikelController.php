<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriArtikel;
use Illuminate\Support\Facades\Crypt;

class ArtikelController extends Controller
{
    public function index(){
        $data = MateriArtikel::where('status',1)->where('end','>=',date('Y-m-d'))->get();
        foreach ($data as $key ) {
            $key->encryptId = Crypt::encrypt($key->id);
        }
        return view('artikel',compact('data'));
    }

    public function detail($encryptId){
        $id = Crypt::decrypt($encryptId);
        $data = MateriArtikel::find($id);
        return view('detail-artikel',compact('data'));
    }
}
