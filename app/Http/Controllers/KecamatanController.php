<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KecamatanController extends Controller
{
    public function index(Type $var = null)
    {
        $kecamatan = Kecamatan::with(['kelurahan'])->get();
        $kelurahan = Kelurahan::with(['kecamatan'])->get();

        session()->forget('errMessage');
        return view('kecamatan', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('add.kecamatan-add', ['kecamatan' => $kecamatan]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:kecamatan|max:50|required';
        $messages['nama.unique'] = 'Nama kecamatan sudah ada!';
        $messages['nama.max'] = 'Nama kecamatan tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama kecamatan wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Kecamatan::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Kecamatan berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kecamatan gagal ditambahkan!');
        }

        return redirect('/kecamatan');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        return view('edit.kecamatan-edit', ['kecamatan' => $kecamatan]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kecamatan = Kecamatan::findOrFail($id);

        if ($request->nama != $kecamatan->nama) {
            $rules['nama'] = 'unique:kecamatan|max:50|required';
            $messages['nama.unique'] = 'Nama Kecamatan Sudah ada!';
            $messages['nama.required'] = 'Kecamatan wajib Diisi!';
            $messages['nama.max'] = 'Nama Kecamatan tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $kecamatan->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Kecamatan berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kecamatan gagal diubah!');
        }

        return redirect('/kecamatan');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $result = $kecamatan->delete();

        if ($result) {
            Session::flash('succMessage', 'Kecamatan berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kecamatan gagal dihapus!');
        }

        return redirect('/kecamatan');
    }

    public function request()
    {
        $kecamatan = Kecamatan::with(['kelurahan'])->get();
        return response()->json([$kecamatan]);
    }
}