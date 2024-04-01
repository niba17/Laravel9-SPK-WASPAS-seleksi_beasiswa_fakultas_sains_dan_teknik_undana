<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use PHPUnit\Util\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TahunController extends Controller
{
    public function index(Type $var = null)
    {
        $tahun = Tahun::get();
        return view('tahun', ['tahun' => $tahun]);
    }

    public function create()
    {
        $tahun = Tahun::get();
        return view('add.tahun-add', ['tahun' => $tahun]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:tahun|max:50|required';
        $messages['nama.unique'] = 'Tahun sudah ada!';
        $messages['nama.max'] = 'Tahun tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Tahun wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Tahun::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Tahun berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Tahun gagal ditambahkan!');
        }

        return redirect('/tahun');
    }

    public function edit($id)
    {
        // dd($id);
        $tahun = Tahun::findOrFail($id);
        return view('edit.tahun-edit', ['tahun' => $tahun]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $tahun = Tahun::findOrFail($id);

        if ($request->nama != $tahun->nama) {
            $rules['nama'] = 'unique:tahun|max:50|required';
            $messages['nama.unique'] = 'Tahun Sudah ada!';
            $messages['nama.required'] = 'Tahun wajib Diisi!';
            $messages['nama.max'] = 'Tahun tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $tahun->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Tahun berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Tahun gagal diubah!');
        }

        return redirect('/tahun');
    }

    public function destroy($id)
    {
        $tahun = Tahun::findOrFail($id);
        $result = $tahun->delete();

        if ($result) {
            Session::flash('succMessage', 'Tahun berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Tahun gagal dihapus!');
        }

        return redirect('/tahun');
    }
}