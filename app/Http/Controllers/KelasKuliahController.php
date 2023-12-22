<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasKuliahRules;
use App\Models\tbl_kelas_kuliah;
use App\Models\tbl_matakuliah;
use App\Models\tbl_prodi;
use App\Models\tbl_semester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KelasKuliahController extends Controller
{
    /*
    |---------------------------------------------------------------------------------------|
    |Protected variabel
    |---------------------------------------------------------------------------------------|
    */
    protected $kelas;
    protected $prodi;
    protected $semester;
    protected $matakuliah;
    protected $log;



    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */


    /*
    |---------------------------------------------------------------------------------------|
    |  __contruct Setup
    |---------------------------------------------------------------------------------------|
    */
    public function __construct(tbl_kelas_kuliah $kelas, tbl_prodi $prodi, tbl_semester $semester, tbl_matakuliah $matakuliah)
    {
        $this->kelas = $kelas;
        $this->prodi = $prodi->select('kode_prodi', 'nama_program_studi')->get();
        $this->semester = $semester->select('semester', 'nama_semester')->get();
        $this->matakuliah = $matakuliah->select('kode_mk', 'nama_mk')->get();
        $this->log = Log::channel('siakad');
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Index Kelas Kuliah
    |---------------------------------------------------------------------------------------|
    */
    public function kelas_kuliah()
    {
        $kelas = $this->kelas::with('matakuliah')->paginate(10);
        return view('admin.kelas_kuliah.kelas-kuliah', [
            'page' => 'Kelas Kuliah',
            'kelas' => $kelas,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Tampil Form Tambah Kelas Kuliah
    |
    |*****************************************NOTE*******************************************
    |Jika Menggunakan Input bertipe Select Tambahkan Index "data,value,sub"
    |
    |*data Berfungsi untuk menampilkan data dalam tag <option>
    |*value Berfungsi untuk menambahkan value pada tag <option value="$value">
    |*sub Berfungsi untuk menambahkan nama pada tag <option>$nama</option>
    |---------------------------------------------------------------------------------------|
    */
    public function tambah_kelas_kuliah()
    {

        $input = [
            [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Program Studi',
                'type' => 'select',
                'name' => 'prodi',
                'data' => $this->prodi,
                'value' => 'kode_prodi',
                'sub' => 'nama_program_studi',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Semester',
                'type' => 'select',
                'name' => 'semester',
                'data' => $this->semester,
                'value' => 'semester',
                'sub' => 'nama_semester',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Matakuliah',
                'type' => 'select',
                'name' => 'matakuliah',
                'data' => $this->matakuliah,
                'value' => 'kode_mk',
                'sub' => 'nama_mk',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Nama Kelas',
                'type' => 'text',
                'name' => 'nm_kelas',
                'placeholder' => 'Nama Kelas...',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Lingkup',
                'type' => 'select',
                'name' => 'lingkup_kelas',
                'data' => [
                    'Internal' => 'Internal',
                    'External' => 'External',
                ],
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Mode Kuliah',
                'type' => 'select',
                'name' => 'mode_kuliah',
                'data' => [
                    'Luring' => 'Luring',
                    'Daring' => 'Daring',
                ],
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Tanggal Mulai Aktif',
                'type' => 'date',
                'name' => 'tgl_aktif',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Tanggal Akhir Efektif',
                'type' => 'date',
                'name' => 'tgl_akhir',
            ]
        ];

        $link = route('save.kelasKuliah');

        return view('admin.form.tambah', [
            'page' => 'Tambah Kelas Kuliah',
            'input' => $input,
            'link' => $link
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Simpan Kelas Kuliah
    |---------------------------------------------------------------------------------------|
    */
    public function simpan_kelas_kuliah(KelasKuliahRules $request)
    {

        try {
            DB::beginTransaction();
            $this->kelas->semester = $request->semester;
            $this->kelas->kode_mk = strtoupper($request->matakuliah);
            $this->kelas->nama_kelas = $request->nm_kelas;
            $this->kelas->lingkup_kelas = $request->lingkup_kelas;
            $this->kelas->mode_kuliah = $request->mode_kuliah;
            $this->kelas->kode_prodi = $request->prodi;
            $this->kelas->save();

            DB::commit();

            $this->log->info('User Telah Menambah Kelas Kuliah', ['user' => Auth::user()->name, 'data' => $request->all()]);

            return redirect()->route('admin.kelas')->with([
                'msg' => 'Kelas Kuliah Berhasil Disimpan.',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            $this->log->error('Terjadi Kesalahan', ['user' => Auth::user()->name, 'message' => $th->getMessage()]);

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
    |Form Edit Kelas Kuliah
    |
    |*****************************************NOTE*******************************************
    |Jika Menggunakan Input bertipe Select Tambahkan Index "data,value,sub"
    |
    |*data Berfungsi untuk menampilkan data dalam tag <option>
    |*value Berfungsi untuk menambahkan value pada tag <option value="$value">
    |*sub Berfungsi untuk menambahkan nama pada tag <option>$nama</option>
    |---------------------------------------------------------------------------------------|
    |---------------------------------------------------------------------------------------|
    */
    public function edit_kelas_kuliah($id)
    {

        $kelas = $this->kelas::find($id);

        $link = route('update.kelasKuliah', $kelas->id_kelas);

        $input = [
            [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Program Studi',
                'type' => 'select',
                'name' => 'prodi',
                'data' => $this->prodi,
                'value' => 'kode_prodi',
                'sub' => 'nama_program_studi',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Semester',
                'type' => 'select',
                'name' => 'semester',
                'data' => $this->semester,
                'value' => 'semester',
                'sub' => 'nama_semester',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Matakuliah',
                'type' => 'select',
                'name' => 'matakuliah',
                'data' => $this->matakuliah,
                'value' => 'kode_mk',
                'sub' => 'nama_mk',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Nama Kelas',
                'type' => 'text',
                'name' => 'nm_kelas',
                'placeholder' => 'Nama Kelas...',
                'value' => $kelas->nama_kelas,
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Lingkup',
                'type' => 'select',
                'name' => 'lingkup_kelas',
                'data' => [
                    'External' => 'External',
                    'Internal' => 'Internal',
                ],
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Mode Kuliah',
                'type' => 'select',
                'name' => 'mode_kuliah',
                'data' => [
                    'Luring' => 'Luring',
                    'Daring' => 'Daring',
                ],
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Tanggal Mulai Aktif',
                'type' => 'date',
                'name' => 'tgl_aktif',
                'placeholder' => '',
                'value' => '',
            ], [
                'length' => 'col-xxl-6 col-xl-6 col-md-6',
                'title' => 'Tanggal Akhir Efektif',
                'type' => 'date',
                'name' => 'tgl_akhir',
                'placeholder' => '',
                'value' => '',

            ]
        ];

        return view('admin.form.edit', [
            'page' => 'Ubah Kelas Kuliah',
            'input' => $input,
            'data' => $kelas,
            'link' => $link

        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Ubabh Kelas Kuliah
    |---------------------------------------------------------------------------------------|
    */
    public function ubah_kelas_kuliah(KelasKuliahRules $request, $id)
    {

        try {
            $kelas = $this->kelas::find($id);

            $kelas->kode_prodi = $request->prodi;
            $kelas->semester = $request->semester;
            $kelas->kode_mk = $request->matakuliah;
            $kelas->nama_kelas = $request->nm_kelas;
            $kelas->lingkup_kelas = $request->lingkup_kelas;
            $kelas->mode_kuliah = $request->mode_kuliah;
            $kelas->save();

            $this->log->info(
                'User Mencoba Untuk Mengubah Kelas Kuliah',
                [
                    'user' => Auth::user()->name,
                    'old' => $kelas,
                    'new' => $request->all()
                ]
            );

            return redirect()->route('admin.kelas')->with([
                'msg' => 'Kelas Kuliah Berhasil Diubah.',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            $this->log->error(
                'Terjadi Kesalahan',
                [
                    'user' => Auth::user()->name,
                    'message' => $th->getMessage(),
                ]
            );

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
    |Hapus Kelas Kuliah
    |---------------------------------------------------------------------------------------|
    */
    public function hapus_kelas_kuliah($id)
    {
        $this->log->warning('User Mencoba Menghapus kelas Kuliah', ['user' => Auth::user()->name, 'id_kelas' => $id]);

        $this->kelas::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'Kelas Berhasil Dihapus.',
            'type' => 'success'
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
