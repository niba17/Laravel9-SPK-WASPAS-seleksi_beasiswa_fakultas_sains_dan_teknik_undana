<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Tahun;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class KasusController extends Controller
{
    public function index($tahun_id = null)
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan', 'tahun'])->get();
        $tahun_kasus = Tahun::get();

        if ($tahun_id == null) {
            $tahun_id = $tahun_kasus[0]->nama;
        } else {
            $tahun_button = Tahun::where('id', $tahun_id)->first();
        }

        foreach ($kasus as $key => $value) {
            if ($value->tahun_id != $tahun_id) {
                unset($kasus[$key]);
            }
        }
        // dd($tahun_id);

        return view('kasus', ['kasus' => $kasus, 'tahun_id' => $tahun_id, 'tahun_kasus' => $tahun_kasus, 'tahun_button' => $tahun_button]);
    }

    public function create()
    {
        $puskesmas = Puskesmas::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $tahun_kasus = Tahun::all();

        return view('add.kasus-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'puskesmas' => $puskesmas, 'tahun_kasus' => $tahun_kasus]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $kasus = Kasus::with('kelurahan')->get();
        // dd($kasus);

        foreach ($kasus as $key) {
            if ($request->kelurahan_id == $key->kelurahan_id) {
                if ($request->tahun == $key->tahun) {
                    Session::flash('errMessage', 'Data Kelurahan ' . $key->kelurahan->nama . ' Tahun ' . $key->tahun . ' Sudah Ada!');
                    return redirect('/kasus-add');
                }
            }
        }
        // die;

        $rules = [
            'kelurahan_id' => 'required',
            'sasaran' => 'max:10|required',
            'j_b_diukur' => 'max:10|required',
            's_pendek' => 'max:10|required',
            'pendek' => 'max:10|required',
            'normal' => 'max:10|required',
            'tinggi' => 'max:10|required',
            'total' => 'max:10|required',
            'presentase' => 'max:10|required',
            'tahun_id' => 'max:10|required',
        ];

        $messages = [
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
            'sasaran.required' => 'Sasaran wajib diisi!',
            'j_b_diukur.required' => 'Jumlah balita wajib diisi!',
            's_pendek.required' => 'Status Gizi wajib diisi!',
            'pendek.required' => 'Status Gizi wajib diisi!',
            'normal.required' => 'Status Gizi wajib diisi!',
            'tinggi.required' => 'Status Gizi wajib diisi!',
            'total.required' => 'Total wajib diisi!',
            'presentase.required' => 'Presentase wajib diisi!',
            'tahun_id.required' => 'Tahun wajib diisi!',
            'sasaran.max' => 'Sasaran tidak boleh lebih dari :max karakter!',
            'j_b_diukur.max' => 'Jumlah balita tidak boleh lebih dari :max karakter!',
            's_pendek.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'pendek.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'normal.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'tinggi.max' => 'Status Gizi tidak boleh lebih dari :max karakter!',
            'total.max' => 'Total tidak boleh lebih dari :max karakter!',
            'presentase.max' => 'Presentase tidak boleh lebih dari :max karakter!',
            'tahun_id.max' => 'Tahun tidak boleh lebih dari :max karakter!',
        ];

        // dd($request->all());
        $request->validate($rules, $messages);

        $kasus = Kasus::create($request->all());

        $tahun_kasus = Tahun::get();

        if ($kasus) {
            Session::flash('succMessage', 'Kasus berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kasus gagal ditambahkan!');
        }

        return redirect('/kasus/' . $request->tahun_id);
    }

    public function edit($id)
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->findOrFail($id);

        $puskesmas = Puskesmas::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $tahun_kasus = Tahun::all();

        //  dd($kasus->all());

        return view('edit.kasus-edit', ['kasus' => $kasus, 'puskesmas' => $puskesmas, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'tahun_kasus' => $tahun_kasus]);
    }

    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);

        $kasuses = Kasus::with('kelurahan')->get();
        // dd($kasus);
        if ($request->kelurahan_id != $kasus->kelurahan_id) {
            foreach ($kasuses as $key) {
                if ($request->kelurahan_id == $key->kelurahan_id) {
                    if ($request->tahun == $key->tahun) {
                        Session::flash('errMessage', 'Data Kelurahan ' . $key->kelurahan->nama . ' Tahun ' . $key->tahun . ' Sudah Ada!');
                        return redirect('/kasus-edit' . '/' . $id);
                    }
                }
            }
        }

        $rules = [];

        $messages = [];

        // if ($request->kelurahan_id != $kasus->kelurahan_id) {
        //     $rules['kelurahan_id'] = 'unique:kasus';
        //     $messages['kelurahan_id.unique'] = 'Kelurahan sudah ada!';
        // }
        // dd($request->all());
        $validator = false;
        foreach ($request->all() as $key => $value) {
            if ($key == 'kelurahan_id' && $key == 'tahun_id') {
                $validator = true;
            }

            if ($validator == true) {
                if ($value != $kasus[$key] || $value == null) {
                    $rules[$key] = 'max:100|required';
                    $messages[$key . '.max'] = 'Karakter tidak boleh lebih dari :max';
                    $messages[$key . '.required'] = 'Kolom wajib Diisi!';
                }
            }
        }
        // dd($request->all());
        // dd($messages);

        $request->validate($rules, $messages);

        $kasusUp = $kasus->update($request->all());

        if ($kasusUp) {
            Session::flash('succMessage', 'Data kasus berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Data kasus gagal diubah!');
        }

        return redirect('/kasus/' . $request->tahun_id);
    }

    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $tahun_id = $kasus->tahun_id;
        $kasus = $kasus->delete();

        if ($kasus) {
            Session::flash('succMessage', 'Data kasus berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Data kasus gagal dihapus!');
        }

        return redirect('/kasus/' . $tahun_id);
    }

    public function cetak($tahun_id = null)
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan', 'tahun'])->get();
        $tahun_kasus = Tahun::get();

        if ($tahun_id == null) {
            $tahun_id = $tahun_kasus[0]->nama;
        } else {
            $tahun_button = Tahun::where('id', $tahun_id)->first();
        }

        foreach ($kasus as $key => $value) {
            if ($value->tahun_id != $tahun_id) {
                unset($kasus[$key]);
            }
        }

        return view('print.kasus-print', ['kasus' => $kasus, 'tahun_id' => $tahun_id, 'tahun_kasus' => $tahun_kasus, 'tahun_button' => $tahun_button]);
    }

// public function export($tahun_id = null)
// {
//     // dd($tahun_id);
//     $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan', 'tahun'])->get();
//     $tahun_kasus = Tahun::get();

//     if ($tahun_id == null) {
//         $tahun_id = $tahun_kasus[0]->nama;
//     } else {
//         $tahun_button = Tahun::where('id', $tahun_id)->first();
//     }

//     foreach ($kasus as $key => $value) {
//         if ($value->tahun_id != $tahun_id) {
//             unset($kasus[$key]);
//         }
//     }

//     // return view('print.kasus-export', ['kasus' => $kasus, 'tahun_id' => $tahun_id, 'tahun_kasus' => $tahun_kasus, 'tahun_button' => $tahun_button]);

//     return Excel::download(new UsersExport, 'users.xlsx');
// }
}