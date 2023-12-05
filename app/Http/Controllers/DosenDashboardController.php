<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DosenDashboardController extends Controller
{
    public function index()
    {
        $user = User::get();

        return view('admin.dosen.dashboard-dosen', [
            'page' => 'Dashboard Dosen',
            'user' => $user,
        ]);
    }

    public function show($data)
    {

        return view('admin.dosen.dosen-detail', [
            'page' => 'Detail Dosen'
        ]);
    }
}
