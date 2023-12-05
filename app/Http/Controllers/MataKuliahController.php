<?php

namespace App\Http\Controllers;

use App\Models\tbl_matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function matakuliah()
    {
        $matakuliah = tbl_matakuliah::get();

        return view('admin.matakuliah', [
            'page' => 'Matakuliah',
            'matakuliah' => $matakuliah,
        ]);
    }
}
