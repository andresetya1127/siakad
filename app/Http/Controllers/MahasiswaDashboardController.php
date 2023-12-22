<?php

namespace App\Http\Controllers;

use App\Models\tbl_agama;
use App\Models\tbl_mahasiswa;
use App\Models\tbl_matakuliah;
use App\Models\tbl_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    /*
    |---------------------------------------------------------------------------------------|
    |Protected
    |---------------------------------------------------------------------------------------|
    */
    protected $agama;
    protected $prodi;
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Contruct
    |---------------------------------------------------------------------------------------|
    */
    public function __construct(tbl_agama $agama, tbl_prodi $prodi)
    {
        $this->agama = $agama->select('id_agama', 'nm_agama')->get();
        $this->prodi = $prodi->select('kode_prodi', 'nama_program_studi')->get();
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */



    /*
    |---------------------------------------------------------------------------------------|
    |Mahasiswa Dashboard Index
    |---------------------------------------------------------------------------------------|
    */
    public function index()
    {
        $mahasiswa = tbl_mahasiswa::with('mahasiswa:id_agama,nm_agama')
            ->orderBy('mulai_smt', 'desc')
            ->select(['nm_pd', 'tmpt_lahir', 'nipd', 'jk', 'id_agama', 'kode_jurusan', 'id_mahasiswa'])
            ->paginate(15);

        return view('admin.mahasiswa.Dashboard-mahasiswa', [
            'page' => 'Dashboard Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |
    |---------------------------------------------------------------------------------------|
    */
    public function tambah_mahasiswa()
    {

        $input = [
            [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Nama Peserta Didik',
                'type' => 'text',
                'name' => 'nm_pd',
                'placeholder' => 'Nama Mahasiswa...',
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Tempat lahir',
                'type' => 'text',
                'name' => 'tmpt_lahir',
                'placeholder' => 'Tempat Lahir...',
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'NISN',
                'type' => 'number',
                'name' => 'nisn',
                'placeholder' => 'NISN...',
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Jenis Kelamin',
                'type' => 'select',
                'name' => 'jk',
                'data' => [
                    'L' => 'Laki-Laki',
                    'P' => 'Prempuan',
                ],
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Agama',
                'type' => 'select',
                'name' => 'agama',
                'data' => $this->agama,
                'value' => 'id_agama',
                'sub' => 'nm_agama'
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Program Studi',
                'type' => 'select',
                'name' => 'prodi',
                'data' => $this->prodi,
                'value' => 'kode_prodi',
                'sub' => 'nama_program_studi'
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'NIPD',
                'type' => 'number',
                'name' => 'nipd',
                'placeholder' => 'NIPD...',
            ], [
                'length' => 'col-xxl-4 col-xl-6 col-md-6',
                'title' => 'Tanggal Masuk',
                'type' => 'date',
                'name' => 'tgl_masuk',
            ]
        ];

        $link = '#';


        return view('admin.form.tambah', [
            'page' => 'Tambah Peserta Didik Baru.',
            'input' => $input,
            'link' => $link
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Detail Mahasiswa
    |---------------------------------------------------------------------------------------|
    */
    public function detail_mahasiswa($id_mhs)
    {
        $agama = tbl_agama::get();

        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $id_mhs)->first();

        return view('admin.mahasiswa.profile-mahasiswa', [
            'page' => 'Profil Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama

        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |KRS Mahasiswa
    |---------------------------------------------------------------------------------------|
    */
    public function krs_mahasiswa($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.mahasiswa.krs-mahasiswa', [
            'page' => 'KRS Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama

        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */




    /*
    |---------------------------------------------------------------------------------------|
    |Aktivitas Mahasiswa
    |---------------------------------------------------------------------------------------|
    */
    public function aktivitas_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.mahasiswa.aktivitas-mahasiswa', [
            'page' => 'Aktivitas Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama

        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Nilai Mahasiswa
    |---------------------------------------------------------------------------------------|
    */
    public function nilai_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.mahasiswa.nilai-mahasiswa', [
            'page' => 'Nilai Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Transkrip Mahasiswa
    |---------------------------------------------------------------------------------------|
    */
    public function transkrip_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.mahasiswa.transkrip-mahasiswa', [
            'page' => 'Transkrip Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */





    /*
    |---------------------------------------------------------------------------------------|
    |Bimmbingan Mahasiswa
    |---------------------------------------------------------------------------------------|
    */
    public function bimbingan_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.mahasiswa.bimbingan-mahasiswa', [
            'page' => 'Bimbingan Dosen PA',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
