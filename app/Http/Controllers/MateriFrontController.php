<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class MateriFrontController extends Controller
{
    public function index(){
        $d['Materi'] = DB::table('m_materi')
        ->select('m_materi.*')
        ->selectRaw('(select count(tmat.id) from t_sub_materi tmat where tmat.id_materi=m_materi.id and tmat.aktif=1 group by tmat.id_materi ) as jumlahData')
        ->where('m_materi.aktif', 1)
        ->get();
        $d['Notifikasi'] = DB::table('notifikasis')->get();

        if ($d['Materi']) {
            return view("lms.lowongan", $d);
        }else {
            return response()->json(['message'=>'Tidak Ada Data'], 200);
        }
        
        return view("lms.lowongan", $d);
    }

    public function lowonganHomeExam($id){
        $Materi = DB::table('m_materi')
        ->select('m_materi.*')
        ->selectRaw('(select count(tmat.id) from t_sub_materi tmat where tmat.id_materi=m_materi.id and tmat.aktif=1 group by tmat.id_materi ) as jumlahData')
        ->where('m_materi.aktif', 1)
        ->find($id);

        $subMateri = DB::table('t_sub_materi')
        ->select('t_sub_materi.*', 't_sub_materi_file.file_location')
        ->selectRaw('(select IF(ISNULL(t_log_materi.status)=1, 0, t_log_materi.status) from t_log_materi where t_log_materi.id_user = '.Auth::user()->id.' and t_log_materi.id_sub_materi = t_sub_materi.id limit 1) as status')
        ->leftJoin('t_sub_materi_file', 't_sub_materi.id', '=', 't_sub_materi_file.id_sub_materi')
        ->where('t_sub_materi.aktif', 1)
        ->where('t_sub_materi.id_materi', $id)
        ->get();
        // dd($subMateri);
        if ($Materi) {
            return view("lms.lowonganHomeExam",compact('Materi', 'subMateri'));
        }else {
            return response()->json(['message'=>'Tidak Ada Data'], 200);
        }
        // return view("lms.exam",compact('Materi'));
        return view("lms.lowonganHomeExam",compact('Materi'));
    }

    public function viewMateri($id){
        $d['sub_materi'] = 
        DB::table('t_sub_materi')
        ->select('t_sub_materi.*', 't_sub_materi_file.file_location')
        ->leftJoin('t_sub_materi_file', 't_sub_materi.id', '=', 't_sub_materi_file.id_sub_materi')
        ->where('t_sub_materi.aktif', 1)
        ->where('t_sub_materi.id', $id)
        ->first();

        DB::table('t_log_materi')
        ->insert([
            'id_user' => Auth::user()->id,
            'id_sub_materi' => $id,
            'id_materi' => $d['sub_materi']->id_materi,
            'status' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        // dd($d);
        return view('lms.pageChat', $d);
    }

    public function addStatus($id){
        $dataSub = DB::table('t_sub_materi')->where('id', $id)->first();
        DB::table('t_log_materi')
        ->where('id_user', Auth::user()->id)
        ->where('id_sub_materi', $id)
        ->update([
            'id_sub_materi' => $id,
            'id_materi' => $dataSub->id_materi,
            'status' => 1,
            'updated_at' => date("Y-m-d H:i:s"),
            'updated_by' => Auth::user()->id,
        ]);
        return redirect('lowonganHomeExam/'.$dataSub->id_materi);
    }
}
