<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class PuskesmasController extends Controller
{
    public function index(Type $var = null)
    {
        $puskesmas = Puskesmas::with(['kecamatan', 'kelurahan'])->get();
        // dd($puskesmas);
        return view('puskesmas', ['puskesmas' => $puskesmas]);
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $puskesmas = Puskesmas::all();

        return view('add.puskesmas-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'puskesmas' => $puskesmas]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'unique:puskesmas|max:50|required',
            // 'kecamatan_id' => 'required',
            // 'kelurahan_id' => 'required',
        ];

        $messages = [
            'nama.unique' => 'Nama Puskesmas sudah ada!',
            'nama.max' => 'Nama Puskesmas tidak boleh lebih dari :max karakter!',
            'nama.required' => 'Nama Puskesmas wajib diisi!',
            // 'kecamatan_id.required' => 'Kecamatan wajib dipilih!',
            // 'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $puskes = Puskesmas::create($request->all());

        if ($puskes) {
            Session::flash('succMessage', 'Puskesmas berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Puskesmas gagal ditambahkan!');
        }

        return redirect('/puskesmas');
    }

    public function edit($id)
    {
        $puskesmas = Puskesmas::with(['kecamatan', 'kelurahan'])->findOrFail($id);

        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        //  dd($puskesmas->all());

        return view('edit.puskesmas-edit', ['puskesmas' => $puskesmas, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function update(Request $request, $id)
    {
        $kasus = Puskesmas::findOrFail($id);

        $rules = [];

        $messages = [];

        // dd($request->penderita);

        if ($request->nama != $kasus->nama) {
            $rules['nama'] = 'unique:puskesmas|max:50|required';
            $messages['nama.unique'] = 'Nama Puskesmas Sudah ada!';
            $messages['nama.required'] = 'Nama Puskesmas wajib Diisi!';
            $messages['nama.max'] = 'Nama Puskesmas tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $puskesmasUp = $kasus->update($request->all());

        if ($puskesmasUp) {
            Session::flash('succMessage', 'Puskesmas berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Puskesmas gagal diubah!');
        }

        return redirect('/puskesmas');
    }

    public function destroy($id)
    {
        $puskesmas = Puskesmas::findOrFail($id);
        $puskesmas = $puskesmas->delete();

        if ($puskesmas) {
            Session::flash('succMessage', 'Puskesmas berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Puskesmas gagal dihapus!');
        }

        return redirect('/puskesmas');
    }
}