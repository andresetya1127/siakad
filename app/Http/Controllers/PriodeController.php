<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriodeController extends Controller
{

    /*
    |---------------------------------------------------------------------------------------|
    |Index Setting Priode
    |---------------------------------------------------------------------------------------|
    */
    public function index()
    {
        return view('admin.priode.priode', [
            'page' => 'Pengaturan',
        ]);
    }
    /*
    |-----------------------------------------/ Selesai  /----------------------------------|
    */
}
