<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Tahun;
use Illuminate\Http\Request;

class DataKasusController extends Controller
{
    public function index($tahun_id)
    {
        $dataKasus = Kasus::with(['kelurahan.puskesmas.kecamatan', 'tahun'])->get();

        $tahun = Tahun::get();
        $tahun_button = Tahun::where('id', $tahun_id)->first();


        foreach ($dataKasus as $key => $value) {
            if ($value->tahun_id != $tahun_id) {
                unset($dataKasus[$key]);
            }
        }

        return view('dataKasus', ['dataKasus' => $dataKasus, 'tahun' => $tahun, 'tahun_button' => $tahun_button]);
    }
}