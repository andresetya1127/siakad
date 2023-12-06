<?php

namespace App\Http\Controllers;

use App\Models\tbl_agama;
use App\Models\tbl_kurikulum;
use App\Models\tbl_mahasiswa;
use App\Models\tbl_semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KurikulumController extends Controller
{
    /**
     * Fungsi tampil kurikulum
     *
     * @method GET
     */

    public function kurikulum()
    {
        $kurikulum = tbl_kurikulum::with('prodi:kode_program_studi,nama_program_studi', 'semester:semester,nama_semester')->get();
        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum
        ]);
    }

    /**
     * Fungsi cari kurikulum
     *
     * @method GET
     */

    public function cari_kurikulum(Request $request)
    {
        $keyword = $request->data_result;
        if ($request->data_result) {
            $kurikulum = tbl_kurikulum::where('nama_kurikulum', 'like', '%' . $keyword . '%')
                ->orWhere('jumlah_sks_lulus', 'like', '%' . $keyword . '%')
                ->orWhere('jumlah_sks_wajib', 'like', '%' . $keyword . '%')
                ->orWhere('jumlah_sks_pilihan', 'like', '%' . $keyword . '%')
                ->whereRelation('prodi', 'nama_program_studi', 'like', '%' . $keyword . '%')
                ->orWhereRelation('semester', 'nama_semester', 'like', '%' . $keyword . '%')
                ->orWhereRelation('semester', 'nama_semester', 'like', '%' . $keyword . '%')
                ->get();
        } else {
            $kurikulum = tbl_kurikulum::get();
        }
        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum
        ]);
    }

    /**
     * Fungsi talpil form tambah kurikulum
     *
     * @method GET
     */

    public function tambah_kurikulum()
    {
        $semester = tbl_semester::get();
        return view('admin.kurikulum.tambah_kurikulum', [
            'page' => 'Tambah Kurikulum',
            'semester' => $semester,
        ]);
    }

    /**
     * Fungsi tambah kurikulum
     *
     * @method GET
     */

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
            $kurikulum->jumlah_sks_wajib = $request->sks_wajib;
            $kurikulum->jumlah_sks_pilihan = $request->sks_pilihan;
            $kurikulum->jumlah_sks_lulus = $request->sks_wajib + $request->sks_pilihan;
            $kurikulum->id_semester = $request->masa_berlaku;
            $kurikulum->status = 1;
            $kurikulum->save();

            return response()->json(['success' => 'success', 'route' => route('admin.kurikulum')]);
        }
    }

    public function view_kurikulum($id)
    {
        $kurikulum = tbl_kurikulum::where('id_kurikulum', $id)
            ->with('prodi:kode_program_studi,nama_program_studi', 'semester:semester,nama_semester', 'mk_kurikulum.matakuliah')
            ->first();
        return view('admin.kurikulum.detail-kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum,
        ]);
    }
}
