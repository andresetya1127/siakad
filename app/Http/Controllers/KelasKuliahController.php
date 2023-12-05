<?php

namespace App\Http\Controllers;

use App\Models\tbl_mahasiswa;
use Illuminate\Http\Request;

class KelasKuliahController extends Controller
{
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
