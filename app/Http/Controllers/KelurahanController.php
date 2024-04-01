<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::with(['kecamatan'])->get();

        session()->forget('errMessage');
        return view('kelurahan', ['kelurahan' => $kelurahan]);
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();

        return view('add.kelurahan-add', ['kecamatan' => $kecamatan]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:kelurahan|max:50|required';
        $messages['nama.unique'] = 'Nama kelurahan sudah ada!';
        $messages['nama.max'] = 'Nama Kelurahan tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama Kelurahan wajib diisi!';

        $rules['kecamatan_id'] = 'required';
        $messages['kecamatan_id.required'] = 'Kecamatan wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Kelurahan::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Kelurahan berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal ditambahkan!');
        }

        return redirect('/kecamatan');
    }

    public function edit($id)
    {
        // $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::with('kecamatan')->findOrFail($id);
        // $kelurahanArr = [];
        // $kelurahanArr = $kelurahan;
        $kecamatan = Kecamatan::all();

        return view('edit.kelurahan-edit', ['kelurahan' => $kelurahan, 'kecamatan' => $kecamatan]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kelurahan = Kelurahan::findOrFail($id);

        if ($request->nama != $kelurahan->nama) {
            $rules['nama'] = 'unique:kelurahan|max:50|required';
            $messages['nama.unique'] = 'Nama Kelurahan Sudah ada!';
            $messages['nama.required'] = 'Kelurahan wajib Diisi!';
            $messages['nama.max'] = 'Nama Kelurahan tidak boleh lebih dari :max karakter!';
        }

        if ($request->kecamatan_id != $kelurahan->kecamatan_id) {
            $rules['kecamatan_id'] = 'required';
            $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';
        }

        $request->validate($rules, $messages);

        $result = $kelurahan->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Kelurahan berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal diubah!');
        }

        return redirect('/kecamatan');
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $result = $kelurahan->delete();

        if ($result) {
            Session::flash('succMessage', 'Kelurahan berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal dihapus!');
        }

        return redirect('/kecamatan');
    }
}