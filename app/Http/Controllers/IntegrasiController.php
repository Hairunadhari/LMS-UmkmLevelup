<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IntegrasiController extends Controller
{
    public function getKabupaten($id)
    {
        $data = DB::table('m_kabupaten')
            ->select('id_kabupaten AS id', 'nama_kabupaten AS value')
            ->where('id_provinsi', $id)
            ->where('aktif', 1)
            ->get();
        return response()->json($data);
    }

    public function getKecamatan($id)
    {
        $data = DB::table('m_kecamatan')
            ->select('id_kecamatan AS id', 'nama_kecamatan AS value')
            ->where('id_kabupaten', $id)
            ->where('aktif', 1)
            ->get();
        return response()->json($data);
    }

    public function getKelurahan($id)
    {
        $data = DB::table('m_kelurahan')
            ->select('id_kelurahan AS id', 'nama_kelurahan AS value')
            ->where('id_kecamatan', $id)
            ->where('aktif', 1)
            ->get();
        return response()->json($data);
    }
}
