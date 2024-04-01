<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\BobotMahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perhitungan extends Model
{
    use HasFactory;

    public function waspas()
    {
        $mahasiswa_get = Mahasiswa::with(['bobot_mahasiswa.sub_kriteria.kriteria', 'jurusan'])->get();
        $kriteria_get = Kriteria::with(['sub_kriteria.bobot_mahasiswa'])->get();
        $sub_kriteria_get = SubKriteria::with(['bobot_mahasiswa'])->get();
        $bobot_mahasiswa_get = BobotMahasiswa::with(['sub_kriteria'])->get();

        //validasi kriteria semua mahasiswa
        foreach ($mahasiswa_get as $value_mahasiswa) {
            $i = 0;
            foreach ($value_mahasiswa->bobot_mahasiswa as $value_bobot_mahasiswa) {
                $i++;

            }

            if ($i + 1 !== count($kriteria_get)) {
                return ('false');
            }
        }

        //pembobotan kriteria mahasiswa
        $mahasiswa = [];
        $sub_kriteria_min = [];
        $i = 0;
        foreach ($mahasiswa_get as $key => $value) {
            $mahasiswa[$i]['id'] = $value->id;
            $mahasiswa[$i]['nama'] = $value->nama;
            $mahasiswa[$i]['jurusan'] = $value->jurusan->nama ?? '';
            $j = 0;
            foreach ($kriteria_get as $key2 => $value2) {
                $mahasiswa[$i]['kriteria'][$j]['id'] = $value2->id;
                $mahasiswa[$i]['kriteria'][$j]['nama'] = $value2->nama;
                $mahasiswa[$i]['kriteria'][$j]['role'] = $value2->role;
                $mahasiswa[$i]['kriteria'][$j]['bobot'] = $value2->bobot;

                $sub_kriteria_min[$j]['kriteria_id'] = $value2->id;
                $sub_kriteria_min[$j]['kriteria'] = $value2->nama;
                $x = 0;
                foreach ($sub_kriteria_get as $key3 => $value3) {
                    if ($value2['id'] == $value3->kriteria_id) {
                        $y = 0;
                        foreach ($bobot_mahasiswa_get as $key4 => $value4) {
                            if ($value4->mahasiswa_id == $value->id && $value4->sub_kriteria_id == $value3->id) {
                                $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$y]['id'] = $value3->id;
                                $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$y]['nama'] = $value3->nama;
                                $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$y]['bobot'] = $value3->bobot;

                                $sub_kriteria_min[$j]['mahasiswa_id'] = $value->id;
                                $sub_kriteria_min[$j]['mahasiswa'] = $value->nama;
                                $sub_kriteria_min[$j]['sub_kriteria'][$y]['id'] = $value3->id;
                                $sub_kriteria_min[$j]['sub_kriteria'][$y]['nama'] = $value3->nama;
                                $sub_kriteria_min[$j]['sub_kriteria'][$y]['bobot'] = $value3->bobot;
                                $y++;
                            }
                        }
                        $x++;
                    }
                }
                $j++;
            }
            $i++;
        }


        $sub_kriteria_min = [];
        $i = 0;
        foreach ($mahasiswa_get as $key => $value) {

            $j = 0;
            foreach ($kriteria_get as $key2 => $value2) {

                $sub_kriteria_min[$j]['kriteria_id'] = $value2->id;
                $sub_kriteria_min[$j]['kriteria'] = $value2->nama;
                $sub_kriteria_min[$j]['bobot'] = $value2->bobot;
                $x = 0;
                foreach ($sub_kriteria_get as $key3 => $value3) {
                    if ($value2['id'] == $value3->kriteria_id) {
                        $y = 0;
                        foreach ($bobot_mahasiswa_get as $key4 => $value4) {
                            if ($value4->mahasiswa_id == $value->id && $value4->sub_kriteria_id == $value3->id) {
                                $sub_kriteria_min[$j]['sub_kriteria'][$i]['id'] = $value3->id;
                                $sub_kriteria_min[$j]['sub_kriteria'][$i]['nama'] = $value3->nama;
                                $sub_kriteria_min[$j]['sub_kriteria'][$i]['bobot'] = $value3->bobot;
                                $y++;
                            }
                        }
                        $x++;
                    }
                }
                $j++;
            }
            $i++;
        }

        //normalisasi bobot kriteria
        $i = 0;
        foreach ($mahasiswa as $key => $value) {
            $j = 0;
            foreach ($kriteria_get as $key2 => $value2) {
                $mahasiswa[$i]['kriteria'][$j]['bobot_ternormalisasi'] = $mahasiswa[$i]['kriteria'][$j]['bobot'] / 100;
                $j++;
            }
            $i++;
        }

        //mencari max & min dari sub  kriteria mahasiswa 
        $sub_kriteria_m_n = $this->bubble_sort($sub_kriteria_min);

        // dd($sub_kriteria_m_n);

        //perhitungan benefit & cost
        $i = 0;
        foreach ($mahasiswa as $key => $value) {
            $j = 0;
            foreach ($value['kriteria'] as $key2 => $value2) {
                $x = 0;
                if (isset($value2['sub_kriteria'])) {

                    foreach ($value2['sub_kriteria'] as $key3 => $value3) {

                        // dd($value2);

                        foreach ($sub_kriteria_m_n[0] as $key4 => $value4) {

                            // dd($value4);
                            if ($value4['kriteria']['kriteria_id'] == $value2['id']) {
                                if ($value2['role'] == 'Cost') {
                                    $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$x]['bobot_c_b'] = $value4['kriteria']['sub_kriteria']['min']['bobot'] / $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$x]['bobot'];
                                } else if ($value2['role'] == 'Benefit') {
                                    $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$x]['bobot_c_b'] = $mahasiswa[$i]['kriteria'][$j]['sub_kriteria'][$x]['bobot'] / $value4['kriteria']['sub_kriteria']['max']['bobot'];
                                }
                            }
                        }
                        $x++;
                    }
                }
                $j++;
            }
            $i++;
        }

        //perhitungan WSM, WPM & QI
        $i = 0;
        foreach ($mahasiswa as $key => $value) {
            $mahasiswa[$i]['bobot_WSM'] = 0;
            $mahasiswa[$i]['bobot_WPM'] = 0;
            $mahasiswa[$i]['bobot_QI'] = 0;
            $j = 0;
            foreach ($value['kriteria'] as $key2 => $value2) {
                $x = 0;
                if (!isset($value2['sub_kriteria'])) {
                    return ('false');
                }
                if (isset($value2['sub_kriteria'])) {
                    foreach ($value2['sub_kriteria'] as $key3 => $value3) {
                        $mahasiswa[$i]['bobot_WSM'] = $mahasiswa[$i]['bobot_WSM'] + ($value3['bobot_c_b'] * $value2['bobot_ternormalisasi']);

                        if ($j == 0) {
                            $mahasiswa[$i]['bobot_WPM'] = (pow($value3['bobot_c_b'], $value2['bobot_ternormalisasi']));
                        } else {
                            $mahasiswa[$i]['bobot_WPM'] = $mahasiswa[$i]['bobot_WPM'] * (pow($value3['bobot_c_b'], $value2['bobot_ternormalisasi']));
                        }


                        $x++;
                    }
                }
                $j++;
            }
            $mahasiswa[$i]['bobot_QI'] = ($mahasiswa[$i]['bobot_WSM'] * 0.5) + ($mahasiswa[$i]['bobot_WPM'] * 0.5);
            $i++;
        }

        //mencari ranking dari mahasiswa
        $mahasiswa = $this->bubble_sort_final($mahasiswa, 'bobot_QI');

        // dd($mahasiswa);
        return $mahasiswa;
    }

    function bubble_sort($arr)
    {
        $x = 0;
        foreach ($arr as $item => $value) {
            $size = count($arr[$x]['sub_kriteria']) - 1;
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size - $i; $j++) {
                    $k = $j + 1;
                    if ($arr[$x]['sub_kriteria'][$k]['bobot'] > $arr[$x]['sub_kriteria'][$j]['bobot']) {
                        // Swap elements at indices: $j, $k
                        list($arr[$x]['sub_kriteria'][$j], $arr[$x]['sub_kriteria'][$k]) = array($arr[$x]['sub_kriteria'][$k], $arr[$x]['sub_kriteria'][$j]);
                    }
                }
            }
            $x++;
        }

        $result = [];
        $i = 0;
        foreach ($arr as $key => $value) {
            $result[$i]['kriteria']['kriteria_id'] = $value['kriteria_id'];
            $result[$i]['kriteria']['nama'] = $value['kriteria'];
            // $result[$i]['kriteria']['bobot'] = $value['bobot'];

            $result[$i]['kriteria']['sub_kriteria']['max'] = reset($value['sub_kriteria']);
            $result[$i]['kriteria']['sub_kriteria']['min'] = end($value['sub_kriteria']);
            $i++;
        }
        // dd($result);

        return [$result];
    }
    function bubble_sort_final($arr, $key)
    {

        $size = count($arr) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($arr[$k][$key] > $arr[$j][$key]) {
                    // Swap elements at indices: $j, $k
                    list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                }
            }
        }

        return [$arr];
    }
}