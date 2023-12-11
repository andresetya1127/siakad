<?php

namespace App\Http\Controllers;

use App\Models\tbl_kurikulum;
use App\Models\tbl_matakuliah;
use App\Models\tbl_mk_kurikulum;
use App\Models\tbl_semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KurikulumController extends Controller
{
    /*
    |---------------------------------------------------------------------------------------
    | Index Kurikulum
    |---------------------------------------------------------------------------------------
    */
    public function index()
    {
        $kurikulum = tbl_kurikulum::with('prodi:kode_program_studi,nama_program_studi', 'semester:semester,nama_semester')->paginate(10);
        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Cari Kurikulum
    |---------------------------------------------------------------------------------------|
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
                ->paginate(10);
        } else {
            $kurikulum = tbl_kurikulum::paginate(10);
        }
        return view('admin.kurikulum.kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Form Tambah Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function tambah_kurikulum()
    {
        $semester = tbl_semester::get();
        return view('admin.kurikulum.tambah_kurikulum', [
            'page' => 'Tambah Kurikulum',
            'semester' => $semester,
        ]);
    }

    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Simpan Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function simpan_kurikulum(Request $request)
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
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Tampil Detail Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function detail_kurikulum($id_kurikulum)
    {
        $kurikulum = tbl_kurikulum::where('id_kurikulum', '=', $id_kurikulum)
            ->with([
                'prodi:kode_program_studi,nama_program_studi',
                'semester:semester,nama_semester',
                'mk_kurikulum' => function ($query) {
                    $query->join('mata_kuliah', 'tbl_mk_kurikulum.kode_mk', '=', 'mata_kuliah.kode_mk');
                }
            ])
            ->first();

        $mk_kurikulum = tbl_mk_kurikulum::with('matakuliah')->where('id_kurikulum', '=', $kurikulum->id_kurikulum)->paginate(10);

        $matakuliah = tbl_matakuliah::where('kode_prodi', '=', $kurikulum->id_prodi)
            ->select('kode_mk', 'nama_mk')
            ->get();

        return view('admin.kurikulum.detail-kurikulum', [
            'page' => 'Kurikulum',
            'kurikulum' => $kurikulum,
            'mk_kur' => $mk_kurikulum,
            'matakuliah' => $matakuliah,
            'btnBack' => true,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Simpan matakuliah dalam Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function simpan_mk_kurikulum(Request $request, $id, $prodi)
    {
        $kode_mk = $request->kode_mk;
        $semester = $request->semester;

        // menghandle error
        try {

            DB::beginTransaction();

            if (!empty($kode_mk) && !empty($semester)) {

                // proses multiple insert
                foreach ($kode_mk as $key => $value) {
                    $mk = new tbl_mk_kurikulum();
                    $mk->id_kurikulum = $id;
                    $mk->kode_prodi = $prodi;
                    $mk->kode_mk = $value;
                    $mk->semester = $semester[$key];
                    $mk->save();
                }

                // proses commit
                DB::commit();
                return redirect()->back()->with(['msg' => 'Data Berhasil Disimpan.', 'type' => 'success']);
            } else {
                return redirect()->back()->with(['msg' => 'Lengkapi Data Dengan Benar.', 'type' => 'error']);
            }
            // jika error data akan dikembalikan
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(['msg' => 'Terjadi Kesalahan.', 'type' => 'error']);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |fungsi Hapus Mtakuliah Dalam Kurikulum
    |---------------------------------------------------------------------------------------|
    */
    public function hapus_mk_kurikulum($id, $mk_kur)
    {
        tbl_mk_kurikulum::find($id)->delete();

        return redirect()->back()->with(['msg' => 'Data Berhasil Dihapus.', 'type' => 'success']);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
