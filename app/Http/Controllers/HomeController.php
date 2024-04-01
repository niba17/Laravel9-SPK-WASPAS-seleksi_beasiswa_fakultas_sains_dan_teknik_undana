<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kasus;
use App\Models\Tahun;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Mahasiswa;
use App\Models\Puskesmas;

class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $akun = User::all();
        $mahasiswa = Mahasiswa::all();
        $kecamatan = Kecamatan::all();
        $kriteria = Kriteria::all();
        $kelurahan = Kelurahan::all();

        session()->forget('fatalErrMessage');
        return view('home', ['akun' => $akun, 'mahasiswa' => $mahasiswa, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'kriteria' => $kriteria]);
    }
}