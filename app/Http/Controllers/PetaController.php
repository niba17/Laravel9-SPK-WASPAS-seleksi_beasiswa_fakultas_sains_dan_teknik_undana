<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tahun;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index(Request $request, $tahun_id = null)
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();
        $tahun_button = Tahun::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $persentase_fill_kec = [];

        foreach ($tahun_button as $item) {
            if ($item->id == $tahun_id) {
                $tahun_selected = $item->nama;
            }
        }

        $i = 0;
        foreach ($kecamatan as $key => $value) {
            $tKasus = 0;
            $tBdiukur = 0;
            foreach ($kasus as $key2 => $value2) {
                if ($value2->tahun_id == $tahun_id) {
                    if ($value2->kelurahan->puskesmas->kecamatan->id == $value->id) {
                        $tKasus = $tKasus + $value2->total;
                        $tBdiukur = $tBdiukur + $value2->j_b_diukur;
                    }
                }
            }
            if ($tKasus == 0 || $tKasus == null || $tBdiukur == 0 || $tBdiukur == null) {
                $persentase_fill_kec[$i]['persentase'] = 0;
            } else {
                $persentase_fill_kec[$i]['persentase'] = sprintf('%0.2f', round(($tKasus / $tBdiukur) * 100, 1));
            }

            $persentase_fill_kec[$i]['fill'] = $value->warna_fill;
            $i++;
        }

        // dd($persentase_fill_kec);

        $persentase_fill_kel = [];
        $i = 0;
        foreach ($kelurahan as $key => $value) {
            $w_fill = '';
            $tKasus = 0;
            $tBdiukur = 0;
            foreach ($kasus as $key2 => $value2) {
                if ($value2->tahun_id == $tahun_id) {
                    if ($value2->kelurahan_id == $value->id) {
                        $tKasus = $tKasus + $value2->total;
                        $tBdiukur = $tBdiukur + $value2->j_b_diukur;
                    }
                }
            }

            foreach ($kecamatan as $key3 => $value3) {
                if ($value->puskesmas->kecamatan->id == $value3->id) {
                    $w_fill = $value3->warna_fill;
                }
            }

            if ($tKasus == 0 || $tKasus == null || $tBdiukur == 0 || $tBdiukur == null) {
                $persentase_fill_kel[$i]['persentase'] = 0;
            } else {
                $persentase_fill_kel[$i]['persentase'] = sprintf('%0.2f', round(($tKasus / $tBdiukur) * 100, 1));
            }

            $persentase_fill_kel[$i]['fill'] = $w_fill;
            $i++;
        }
        // dd($persentase_fill_kel);

        return view('peta', ['kasus' => $kasus, 'tahun_id' => $tahun_id, 'tahun_button' => $tahun_button, 'kecamatan' => $kecamatan, 'persentase_fill_kec' => $persentase_fill_kec, 'kelurahan' => $kelurahan, 'persentase_fill_kel' => $persentase_fill_kel]);
    }

    public function request()
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();
        $kecamatan = Kecamatan::with(['puskesmas.kelurahan.kasus'])->get();
        return response()->json([$kasus, $kecamatan]);
    }
}
