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
        ->selectRaw('(select count(upm.materi_id) from user_progres_materis upm where upm.materi_id=m_materi.id and upm.progres=100) as jumlah_progres_user_selesai')
        ->selectRaw('(select count(upm.materi_id) from user_progres_materis upm where upm.materi_id=m_materi.id and upm.progres<100) as jumlah_progres_user_belom_selesai')
        ->where('m_materi.aktif', 1)
        ->get();

        // dd($d['Materi']);
    
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
        ->selectRaw('(select count(upm.materi_id) from user_progres_materis upm where upm.materi_id=m_materi.id) as jumlah_user_berpartisipasi')
        ->selectRaw('(select u.name from users u where u.id=m_materi.created_by limit 1) as author')
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
        // return view("lms.lowonganHomeExam",compact('Materi'));
    }

    public function viewMateri($materiid,$id){
        $d['materiid'] = $materiid;
        $d['sub_materi'] = 
        DB::table('t_sub_materi')
        ->select('t_sub_materi.*', 't_sub_materi_file.file_location','t_sub_materi_file.video_url', 'users.name')
        ->leftJoin('t_sub_materi_file', 't_sub_materi.id', '=', 't_sub_materi_file.id_sub_materi')
        ->leftJoin('users', 'users.id', '=', 't_sub_materi.created_by')
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

        $data = DB::table('user_progres_materis')->insert([
            'user_id' => Auth::user()->id,
            'sub_materi_id' => $id,
            'materi_id' =>  $dataSub->id_materi,
            'progres_pdf' =>  100,
            'progres_video' =>  100,
            'progres' => 100,
        ]);
        return redirect('lowonganHomeExam/'.$dataSub->id_materi);
    }

    public function update_progres_video(Request $request){
        $cek = DB::table('user_progres_materis')->where('user_id', Auth::user()->id)->where('sub_materi_id', $request->id_submateri)->first();
        if ($cek == null) {
            DB::table('user_progres_materis')->insert([
                'user_id' => Auth::user()->id,
                'sub_materi_id' => $request->id_submateri,
                'materi_id' => $request->id_materi,
                'progres_pdf' => $request->progres_pdf,
                'progres_video' => $request->progres_video,
                'progres'=> ($request->progres_pdf + $request->progres_video) / 2,
            ]);
        } else{
            // cek file pdf dan video
            $a = DB::table('t_sub_materi')
            ->select('t_sub_materi.*','t_sub_materi_file.video_url','t_sub_materi_file.file_location')
            ->leftJoin('t_sub_materi_file','t_sub_materi.id','=','t_sub_materi_file.id_sub_materi')
            ->where('id', $request->id_submateri)
            ->first();

            if ($a->video_url != null && $a->file_location != null) {
                if ($cek->progres_video < 100 && $request->progres_video > $cek->progres_video) {
                    DB::table('user_progres_materis')
                    ->where('user_id', Auth::user()->id)
                    ->where('sub_materi_id', $request->id_submateri)
                    ->update([
                        'progres_video' => $request->progres_video,
                        'progres'=> ($cek->progres_pdf + $request->progres_video) / 2,
                    ]);
                }
                
            } elseif ($a->file_location == null) {
                if ($cek->progres_video < 100 && $request->progres_video > $cek->progres_video) {
                    DB::table('user_progres_materis')
                    ->where('user_id', Auth::user()->id)
                    ->where('sub_materi_id', $request->id_submateri)
                    ->update([
                        'progres_video'=> $request->progres_video,
                        'progres'=> $request->progres_video
                    ]);
                }
            }
                
            if ($cek->progres == 100) {
                $dataSub = DB::table('t_sub_materi')->where('id', $request->id_submateri)->first();
                DB::table('t_log_materi')
                ->where('id_user', Auth::user()->id)
                ->where('id_sub_materi', $request->id_submateri)
                ->update([
                    'id_sub_materi' => $request->id_submateri,
                    'id_materi' => $dataSub->id_materi,
                    'status' => 1,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => Auth::user()->id,
                ]);
            }
        }
        
        return response()->json(['success' => 'true']);
        
    }

    public function update_progres_pdf(Request $request){
        $cek = DB::table('user_progres_materis')->where('user_id', Auth::user()->id)->where('sub_materi_id', $request->id_submateri)->first();
     
        if ($cek == null) {
            DB::table('user_progres_materis')->insert([
                'user_id' => Auth::user()->id,
                'sub_materi_id' => $request->id_submateri,
                'materi_id' => $request->id_materi,
                'progres_pdf' => $request->progres_pdf,
                'progres_video' => $request->progres_video,
                'progres'=> ($request->progres_pdf + $request->progres_video) / 2,
            ]);
        } else{
            $a = DB::table('t_sub_materi')
            ->select('t_sub_materi.*','t_sub_materi_file.video_url','t_sub_materi_file.file_location')
            ->leftJoin('t_sub_materi_file','t_sub_materi.id','=','t_sub_materi_file.id_sub_materi')
            ->where('id', $request->id_submateri)
            ->first();

            if ($a->video_url != null && $a->file_location != null) {
                if ($cek->progres_pdf < 100 && $request->progres_pdf > $cek->progres_pdf) {
                    DB::table('user_progres_materis')
                    ->where('user_id', Auth::user()->id)
                    ->where('sub_materi_id', $request->id_submateri)
                    ->update([
                        'progres_pdf' => $request->progres_pdf,
                        'progres'=> ($cek->progres_video + $request->progres_pdf) / 2,
                    ]);
                }
                
            } elseif ($a->video_url == null) {
                if ($cek->progres_pdf < 100 && $request->progres_pdf > $cek->progres_pdf) {
                    DB::table('user_progres_materis')
                    ->where('user_id', Auth::user()->id)
                    ->where('sub_materi_id', $request->id_submateri)
                    ->update([
                        'progres_pdf'=> $request->progres_pdf,
                        'progres'=> $request->progres_pdf
                    ]);
                }
            }
                
            if ($cek->progres == 100) {
                $dataSub = DB::table('t_sub_materi')->where('id', $request->id_submateri)->first();
                DB::table('t_log_materi')
                ->where('id_user', Auth::user()->id)
                ->where('id_sub_materi', $request->id_submateri)
                ->update([
                    'id_sub_materi' => $request->id_submateri,
                    'id_materi' => $dataSub->id_materi,
                    'status' => 1,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => Auth::user()->id,
                ]);
            }
            
        }
        
        return response()->json(['success' => 'true']);
        
    }
}
