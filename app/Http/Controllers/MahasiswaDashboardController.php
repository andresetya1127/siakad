<?php

namespace App\Http\Controllers;

use App\Models\tbl_agama;
use App\Models\tbl_mahasiswa;
use App\Models\tbl_matakuliah;
use Illuminate\Http\Request;

class MahasiswaDashboardController extends Controller
{

    public function index()
    {
        $mahasiswa = tbl_mahasiswa::with('mahasiswa:id_agama,nm_agama')
            ->orderBy('mulai_smt', 'desc')
            ->select(['nm_pd', 'tmpt_lahir', 'nipd', 'jk', 'id_agama', 'kode_jurusan', 'id_mahasiswa'])
            ->get();

        return view('admin.Dashboard-mahasiswa', [
            'page' => 'Dashboard Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function detail_mahasiwa($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.profile-mahasiswa', [
            'page' => 'Profil Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama

        ]);
    }

    public function krs_mahasiswa($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.krs-mahasiswa', [
            'page' => 'KRS Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama

        ]);
    }

    public function aktivitas_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.aktivitas-mahasiswa', [
            'page' => 'Aktivitas Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama

        ]);
    }

    public function nilai_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.nilai-mahasiswa', [
            'page' => 'Nilai Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama
        ]);
    }

    public function transkrip_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.transkrip-mahasiswa', [
            'page' => 'Transkrip Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama
        ]);
    }

    public function bimbingan_mhs($data)
    {
        $agama = tbl_agama::get();
        $mahasiswa = tbl_mahasiswa::where('id_mahasiswa', $data)->first();

        return view('admin.bimbingan-mahasiswa', [
            'page' => 'Bimbingan Dosen PA',
            'mahasiswa' => $mahasiswa,
            'agama' => $agama
        ]);
    }

    public function matakuliah()
    {
        $matakuliah = tbl_matakuliah::get();

        return view('admin.matakuliah', [
            'page' => 'Matakuliah',
            'matakuliah' => $matakuliah,
        ]);
    }

    public function kurikulum()
    {
        $mahasiswa = tbl_mahasiswa::with('mahasiswa:id_agama,nm_agama')
            ->orderBy('mulai_smt', 'desc')
            ->select(['nm_pd', 'tmpt_lahir', 'nipd', 'jk', 'id_agama', 'kode_jurusan', 'id_mahasiswa'])
            ->paginate(15);

        return view('admin.kurikulum', [
            'page' => 'Kurikulum',
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function kelas_kuliah()
    {
        $mahasiswa = tbl_mahasiswa::with('mahasiswa:id_agama,nm_agama')
            ->orderBy('mulai_smt', 'desc')
            ->select(['nm_pd', 'tmpt_lahir', 'nipd', 'jk', 'id_agama', 'kode_jurusan', 'id_mahasiswa'])
            ->paginate(15);

        return view('admin.kelas-kuliah', [
            'page' => 'Kurikulum',
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
