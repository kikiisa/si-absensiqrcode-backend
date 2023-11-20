<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = Pegawai::all()->count();
        $totalPegawaiAktif = Pegawai::all()->where('status',1)->count();
        $totalPegawaiNonaktif = Pegawai::all()->where('status',0)->count();
        return view('dashboard.index',compact('totalPegawai','totalPegawaiAktif','totalPegawaiNonaktif'));
    }
}
