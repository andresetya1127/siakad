<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatakuliahRules;
use App\Models\tbl_matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MataKuliahController extends Controller
{
    protected $matakuliah;



    /*
    |---------------------------------------------------------------------------------------|
    |__construct
    |---------------------------------------------------------------------------------------|
    */
    public function __construct(tbl_matakuliah $mk)
    {
        $this->matakuliah = $mk;
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------
    | Index Matakuliah
    |---------------------------------------------------------------------------------------
    */
    public function index()
    {
        $matakuliah = $this->matakuliah::orderBy('id_mk', 'desc')->paginate(15);

        return view('admin.matakuliah.matakuliah', [
            'page' => 'Matakuliah',
            'matakuliah' => $matakuliah,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    | Cari Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function cari_matakuliah(Request $request)
    {
        $keyword = $request->data_result;
        if ($request->data_result) {
            $matakuliah = $this->matakuliah::where('nama_mk', 'like', '%' . $keyword . '%')
                ->orWhere('kode_mk', 'like', '%' . $keyword . '%')
                ->orWhere('jenis_mk', 'like', '%' . $keyword . '%')
                ->paginate(15);
        } else {
            $matakuliah = $this->matakuliah::paginate(15);
        }

        return view('admin.matakuliah.matakuliah', [
            'page' => 'Matakuliah',
            'matakuliah' => $matakuliah,
        ]);
    }

    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    | Form Tambah Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function tambah_matakuliah(Request $request)
    {
        return view('admin.matakuliah.tambah-matakuliah', [
            'page' => 'Tambah Matakuliah',
            'btnBack' => true
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------
    | Simpan Data matakuliah Ke Database
    |---------------------------------------------------------------------------------------
    */
    public function save_matakuliah(MatakuliahRules $request)
    {

        $validator = $request->validated();
        $matakuliah = $this->matakuliah;

        try {
            DB::beginTransaction();

            $matakuliah->kode_mk = $request->kode_mk;
            $matakuliah->nama_mk = $request->nama_mk;
            $matakuliah->jenis_mk = $request->jenis_mk;
            $matakuliah->sks_tatap_muka = $request->sks_tatap_muka;
            $matakuliah->sks_praktek = $request->sks_praktek;
            $matakuliah->sks_praktek_lapangan = $request->sks_praktek_lapangan;
            $matakuliah->sks_simulasi = $request->sks_simulasi;
            $matakuliah->id_matkul = Str::uuid()->toString();
            $matakuliah->save();

            DB::commit();

            return redirect()->route('admin.matakuliah')->with([
                'msg' => 'Matakuliah Berhasil Disimpan.',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with([
                'msg' => 'Terjadi Kesalahan.',
                'type' => 'error'
            ]);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Tampil Edit Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function edit_matakuliah($id)
    {
        $matakuliah = $this->matakuliah->where('id_matkul', $id)->first();

        return view('admin.matakuliah.edit_matakuliah', [
            'btnBack' => true,
            'page' => 'Edit Matakuliah',
            'matakuliah' => $matakuliah
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Fungsi Update Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function update_matakuliah(MatakuliahRules $request, $id)
    {

        $matakuliah = $this->matakuliah->where('id_matkul', $id)->first();

        try {
            DB::beginTransaction();

            $matakuliah->kode_mk = $request->kode_mk;
            $matakuliah->nama_mk = $request->nama_mk;
            $matakuliah->jenis_mk = $request->jenis_mk;
            $matakuliah->sks_tatap_muka = $request->sks_tatap_muka;
            $matakuliah->sks_praktek = $request->sks_praktek;
            $matakuliah->sks_praktek_lapangan = $request->sks_praktek_lapangan;
            $matakuliah->sks_simulasi = $request->sks_simulasi;
            $matakuliah->save();

            DB::commit();

            return redirect()->route('admin.matakuliah')->with([
                'msg' => 'Matakuliah Berhasil Diubah.',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with([
                'msg' => 'Terjadi Kesalahan.',
                'type' => 'error'
            ]);
        }
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Hapus Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function delete_matakuliah($id)
    {
        $matakuliah = $this->matakuliah->where('id_matkul', $id)->first();

        $matakuliah->delete();
        return redirect()->back()->with(['msg' => 'Data Berhasil Dihapus.', 'type' => 'success']);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Trash Matakuliah
    |---------------------------------------------------------------------------------------|
    */
    public function trash_matakuliah()
    {
        $matakuliah = $this->matakuliah->onlyTrashed()->paginate(10);
        return view('admin.matakuliah.trash', [
            'page' => 'Trash',
            'matakuliah' => $matakuliah,
            'btnBack' => true
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
