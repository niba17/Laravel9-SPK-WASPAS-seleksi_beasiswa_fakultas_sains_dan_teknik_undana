<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Mahasiswa;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

class PerhitunganController extends Controller
{
    protected $perhitungan;
    public function __construct()
    {
        $this->perhitungan = new Perhitungan();
    }

    public function pembobotan(Type $var = null)
    {
        $mahasiswa = Mahasiswa::with(['bobot_mahasiswa.sub_kriteria.kriteria'])->get();
        $kriteria = Kriteria::all();

        session()->forget('fatalErrMessage');
        return view('perhitungan.perhitungan-pembobotan', ['mahasiswa' => $mahasiswa, 'kriteria' => $kriteria]);
    }
    public function b_c(Type $var = null)
    {
        $waspas = $this->perhitungan->waspas();
        if ($waspas == 'false') {
            $akun = User::all();
            $kecamatan = Kecamatan::all();
            $kelurahan = Kelurahan::all();

            $mahasiswa = Mahasiswa::with(['bobot_mahasiswa.sub_kriteria'])->get();
            $kriteria = Kriteria::with(['sub_kriteria.bobot_mahasiswa'])->get();

            //validasi kriteria semua mahasiswa
            foreach ($mahasiswa as $value_mahasiswa) {
                $i = 0;
                $nama = '';
                foreach ($value_mahasiswa->bobot_mahasiswa as $value_bobot_mahasiswa) {
                    $i++;
                }


                if ($i !== count($kriteria)) {
                    Session::flash('errMessage', 'Lengkapi dahulu kriteria mahasiswa an.' . $value_mahasiswa->nama . ' !');

                    return view('home', ['akun' => $akun, 'mahasiswa' => $mahasiswa, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'kriteria' => $kriteria]);
                }
            }


        } else {
            $mahasiswa = Mahasiswa::with(['bobot_mahasiswa.sub_kriteria.kriteria'])->get();
            $kriteria = Kriteria::with(['sub_kriteria'])->get();
            $waspas_reversed = array_reverse($waspas[0]);
            // dd($waspas_reversed);

            return view('perhitungan.perhitungan-c_b', ['mahasiswa' => $mahasiswa, 'kriteria' => $kriteria, 'waspas' => $waspas, 'waspas_reversed' => $waspas_reversed]);
        }
    }
}