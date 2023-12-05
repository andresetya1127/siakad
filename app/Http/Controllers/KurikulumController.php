<?php

namespace App\Http\Controllers;

use App\Models\tbl_agama;
use App\Models\tbl_kurikulum;
use App\Models\tbl_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KurikulumController extends Controller
{
    public function kurikulum()
    {
        $mahasiswa = tbl_mahasiswa::with('mahasiswa:id_agama,nm_agama')
            ->orderBy('mulai_smt', 'desc')
            ->select(['nm_pd', 'tmpt_lahir', 'nipd', 'jk', 'id_agama', 'kode_jurusan', 'id_mahasiswa'])
            ->paginate(15);

        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function tambah_kurikulum()
    {
        return view('admin.kurikulum.tambah_kurikulum', [
            'page' => 'Tambah Kurikulum',
        ]);
    }

    public function save_kurikulum(Request $request)
    {
        $msg = ['nm_kurikulum.required' => 'Nama Kurikulum Wajib Diisi.'];
        $validator = Validator::make($request->all(), [
            'nm_kurikulum' => 'required',
            'program_studi' => 'required',
            'sks_wajib' => 'required|numeric',
            'sks_pilihan' => 'required|numeric',
            'masa_berlaku' => 'required',
        ], $msg);

        if ($validator->fails()) {
            return response()->json(['error' => 'Terjadi Kesalahan.', 'errors' => $validator->errors()]);
        } else {

            $kurikulum = new tbl_kurikulum();
            $kurikulum->nama_kurikulum = $request->nm_kurikulum;
            $kurikulum->id_prodi = $request->program_studi;
            $kurikulum->id_semester = '20191';
            $kurikulum->jumlah_sks_wajib = $request->sks_wajib;
            $kurikulum->jumlah_sks_pilihan = $request->sks_pilihan;
            $kurikulum->status = 1;
            $kurikulum->save();

            return response()->json(['success' => 'success', 'route' => route('admin.kurikulum')]);
        }
    }
}
