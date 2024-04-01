<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    public function index(Type $var = null)
    {
        $akun = User::get();
        $current_id = Auth::id();

        session()->forget('errMessage');
        return view('akun', ['akun' => $akun, 'current_id' => $current_id]);
    }

    public function create()
    {
        return view('add.akun-add');
    }

    public function store(Request $request)
    {
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:users|max:50|required';
        $messages['nama.unique'] = 'Username sudah ada!';
        $messages['nama.max'] = 'Username tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Username wajib diisi!';

        $rules['password'] = 'required';
        $messages['password.required'] = 'Password wajib diisi!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $arrayAdd['password'] = Hash::make($arrayAdd['password']);

        $kasus = User::create($arrayAdd->all());

        if ($kasus) {
            Session::flash('succMessage', 'Akun berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Akun gagal ditambahkan!');
        }

        return redirect('/akun');
    }

    public function edit($id)
    {
        $akun = User::findOrFail($id);
        return view('edit.akun-edit', ['akun' => $akun]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $akun = User::findOrFail($id);

        if ($request->nama != $akun->nama) {
            $rules['nama'] = 'unique:users|max:50|required';
            $messages['nama.unique'] = 'Username Sudah ada!';
            $messages['nama.required'] = 'Username wajib Diisi!';
            $messages['nama.max'] = 'Username tidak boleh lebih dari :max karakter!';
        }

        if ($request->password != $akun->password) {
            $rules['password'] = 'max:50|required';
            $messages['password.required'] = 'Password wajib Diisi!';
            $messages['password.max'] = 'Password tidak boleh lebih dari :max karakter!';
        }

        $rules['password_c'] = 'same:password|required';
        $messages['password_c.required'] = 'Konfirmasi Password wajib Diisi!';
        $messages['password_c.same'] = 'Konfirmasi Password tidak sesuai!';

        $request->validate($rules, $messages);
        $arrayUp = [];
        $arrayUp = $request;

        $arrayUp['password'] = Hash::make($arrayUp['password']);

        $result = $akun->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Akun berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Akun gagal diubah!');
        }

        return redirect('/akun');
    }

    public function destroy($id)
    {
        $kecamatan = User::findOrFail($id);
        $result = $kecamatan->delete();

        if ($result) {
            Session::flash('succMessage', 'Akun berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Akun gagal dihapus!');
        }

        return redirect('/akun');
    }
}