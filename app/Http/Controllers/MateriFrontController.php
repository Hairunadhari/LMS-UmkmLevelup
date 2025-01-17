<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\MateriChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
    
        $d['Notifikasi'] = DB::table('notifikasis')->where('status_aktif',1)->get();

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
        ->select('t_sub_materi.*')
        ->selectRaw('(select IF(ISNULL(t_log_materi.status)=1, 0, t_log_materi.status) from t_log_materi where t_log_materi.id_user = '.Auth::user()->id.' and t_log_materi.id_sub_materi = t_sub_materi.id limit 1) as status')
        ->where('t_sub_materi.aktif', 1)
        ->where('t_sub_materi.id_materi', $id)
        ->get();

        $tot_sub = DB::table('t_sub_materi')
        ->select('t_sub_materi.*')
        ->where('t_sub_materi.id_materi',$id)
        ->where('t_sub_materi.aktif',1)
        ->count();
        $tot_progres_user = DB::table('user_progres_materis')
        ->where('user_id',Auth::user()->id)
        ->where('user_progres_materis.materi_id',$id)
        ->where('status',1)
        ->sum('progres');
        // dd($tot_sub, $tot_progres_user);
        if ($tot_sub == 0) {
            $totalKeseluruhanProgresUser = 0;
        } else {
            $totalKeseluruhanProgresUser = $tot_progres_user / $tot_sub;
        }
        // dd($totalKeseluruhanProgresUser);

        if ($Materi) {
            return view("lms.lowonganHomeExam",compact('Materi', 'subMateri','totalKeseluruhanProgresUser'));
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
        $d['chats'] = DB::table('materi_chats')
        ->select('materi_chats.*','users.name','users.id')
        ->leftJoin('users','materi_chats.user_id','=','users.id')
        // ->where('materi_chats.user_id','!=',session('id_user'))
        ->where('materi_chats.sub_materi_id',$id)
        ->get();
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
        $getsubmateri = DB::table('user_progres_materis')->where('sub_materi_id',$id)->where('user_id',Auth::user()->id)->first();
        if ($getsubmateri == null) {
            $data = DB::table('user_progres_materis')->insert([
                'user_id' => Auth::user()->id,
                'sub_materi_id' => $id,
                'materi_id' =>  $dataSub->id_materi,
                'progres_pdf' =>  100,
                'progres_video' =>  100,
                'progres' => 100,
            ]);
            
            } else {
            $data = DB::table('user_progres_materis')->update([
                'user_id' => Auth::user()->id,
                'sub_materi_id' => $id,
                'materi_id' =>  $dataSub->id_materi,
                'progres_pdf' =>  100,
                'progres_video' =>  100,
                'progres' => 100,
            ]);
        }
        
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
            
        }
        $ceknew = DB::table('user_progres_materis')->where('user_id', Auth::user()->id)->where('sub_materi_id', $request->id_submateri)->first();

        if ($ceknew->progres == 100) {
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
                
           
            
        }
        $ceknew = DB::table('user_progres_materis')->where('user_id', Auth::user()->id)->where('sub_materi_id', $request->id_submateri)->first();

        if ($ceknew->progres == 100) {
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
        return response()->json(['success' => 'true']);
        
    }

    public function addSubMateri(Request $request, $id, $name) {
        if ($request->session()->get('id_user') == null) {
            $request->session()->flash('alert', [
                'type' => 'error',
                'message' => 'Silahkan periksa kembali email password anda.',
            ]);
            return redirect('login');
        }
        try {
            DB::beginTransaction();

            $lastId = DB::table('t_sub_materi')->insertGetId([
                'nama' => $request->title,
                'deskripsi' => $request->deskripsi,
                'id_materi' => $id,
                'created_by' => $request->session()->get('id_user'),
                'created_at' => date("Y-m-d")
            ]);
            if ($request->hasFile('file') && $request->hasFile('video') ) {
                $file = Str::random(3).time().'.'.$request->file->getClientOriginalExtension();
                $request->file('file')->move(public_path().'/storage/data_upload_lms/', $file);

                $video = Str::random(3).time().'.'.$request->video->getClientOriginalExtension();
                $request->file('video')->move(public_path().'/storage/data_upload_lms/', $video);

                DB::table('t_sub_materi_file')->insert([
                    'id_sub_materi' => $lastId,
                    'video_url' => env('APP_URL').'/storage/data_upload_lms/'.$video,
                    'file_location' => env('APP_URL').'/storage/data_upload_lms/'.$file,
                    'file_name' => $file,
                    'video_name' => $video,
                    'created_by' => $request->session()->get('id_user'),
                    'created_at' => date("Y-m-d")
                ]);

            }elseif ($request->hasFile('file')) {
                $file = Str::random(3).time().'.'.$request->file->getClientOriginalExtension();
                $request->file('file')->move(public_path().'/storage/data_upload_lms/', $file);
                DB::table('t_sub_materi_file')->insert([
                    'id_sub_materi' => $lastId,
                    'file_location' => env('APP_URL').'/storage/data_upload_lms/'.$file,
                    'file_name' => $file,
                    'created_by' => $request->session()->get('id_user'),
                    'created_at' => date("Y-m-d")
                ]);
            }elseif ($request->hasFile('video')) {
                $video = Str::random(3).time().'.'.$request->video->getClientOriginalExtension();
                $request->file('video')->move(public_path().'/storage/data_upload_lms/', $video);
                DB::table('t_sub_materi_file')->insert([
                    'id_sub_materi' => $lastId,
                    'video_url' => env('APP_URL').'/storage/data_upload_lms/'.$video,
                    'video_name' => $video,
                    'created_by' => $request->session()->get('id_user'),
                    'created_at' => date("Y-m-d")
                ]);
            } else{
                DB::table('t_sub_materi_file')->insert([
                    'id_sub_materi' => $lastId,
                    'created_by' => $request->session()->get('id_user'),
                    'created_at' => date("Y-m-d")
                ]);
            }


          
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th);
            throw $th;
        }

        return response()->json(['message'=>'success']);
    }

    public function send_chatting(Request $request){
        $now = now()->setTimezone('Asia/Jakarta');

        MateriChat::create([
            'user_id' => $request->id_user,
            'sub_materi_id' => $request->sub_materi_id,
            'chat' => $request->chat,
            'tanggal' => $now,
        ]);
        return response()->json(['message'=>'success']);
    }

    public function downloadPdf($id){
        $user_id = Crypt::decrypt($id);
        $d = DB::table('users')
        ->select('users.*')
        ->where('users.id',$user_id)
        ->first();
        $pdf = PDF::loadView('generate.pdf',compact('d'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('sertifikat-umkm.pdf');
    } 

}
