<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    public function index(Type $var = null)
    {
        $jurusan = Jurusan::get();

        session()->forget('errMessage');
        return view('jurusan', ['jurusan' => $jurusan]);
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('add.jurusan-add', ['jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:jurusan|max:50|required';
        $messages['nama.unique'] = 'Nama jurusan sudah ada!';
        $messages['nama.max'] = 'Nama jurusan tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama jurusan wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Jurusan::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Jurusan berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Jurusan gagal ditambahkan!');
        }

        return redirect('/jurusan');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('edit.jurusan-edit', ['jurusan' => $jurusan]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $jurusan = Jurusan::findOrFail($id);

        if ($request->nama != $jurusan->nama) {
            $rules['nama'] = 'unique:jurusan|max:50|required';
            $messages['nama.unique'] = 'Nama Jurusan Sudah ada!';
            $messages['nama.required'] = 'Jurusan wajib Diisi!';
            $messages['nama.max'] = 'Nama Jurusan tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $jurusan->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Jurusan berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Jurusan gagal diubah!');
        }

        return redirect('/jurusan');
    }
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $result = $jurusan->delete();

        if ($result) {
            Session::flash('succMessage', 'Jurusan berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Jurusan gagal dihapus!');
        }

        return redirect('/jurusan');
    }
}