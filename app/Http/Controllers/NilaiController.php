<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /*
   |---------------------------------------------------------------------------------------|
   |Nilai Kuliah Index
   |---------------------------------------------------------------------------------------|
   */
    public function index()
    {
        return view('admin.nilai.nilai', [
            'page' => 'Nilai Perkuliahan'
        ]);
    }
    /*
   |-----------------------------------------/ Selesai  /----------------------------------|
   */
}
