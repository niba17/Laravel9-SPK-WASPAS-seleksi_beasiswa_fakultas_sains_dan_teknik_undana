<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Jurusan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function index(Type $var = null)
    {
        $mahasiswa = Mahasiswa::with(['kecamatan', 'kelurahan', 'jurusan'])->get();

        session()->forget('errMessage');
        return view('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('add.mahasiswa-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:mahasiswa|max:50|required';
        $messages['nama.unique'] = 'Nama mahasiswa sudah ada!';
        $messages['nama.max'] = 'Nama mahasiswa tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama mahasiswa wajib diisi!';

        $rules['nim'] = 'unique:mahasiswa|max:50|required';
        $messages['nim.unique'] = 'NIM sudah ada!';
        $messages['nim.max'] = 'NIM tidak boleh lebih dari :max karakter!';
        $messages['nim.required'] = 'NIM wajib diisi!';

        $rules['jk'] = 'max:50|required';
        $messages['jk.required'] = 'Jenis Kelamin wajib dipilih!';

        $rules['tgl_lahir'] = 'required';
        $messages['tgl_lahir.required'] = 'Tanggal wajib dipilih!';

        $rules['bln_lahir'] = 'required';
        $messages['bln_lahir.required'] = 'Bulan wajib dipilih!';

        $rules['thn_lahir'] = 'required';
        $messages['thn_lahir.required'] = 'Tahun wajib dipilih!';

        $rules['jurusan_id'] = 'max:50|required';
        $messages['jurusan_id.required'] = 'jurusan wajib dipilih!';

        $rules['kecamatan_id'] = 'max:50|required';
        $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';

        $rules['kelurahan_id'] = 'max:50|required';
        $messages['kelurahan_id.required'] = 'Kelurahan wajib dipilih!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kasus = Mahasiswa::create($arrayAdd->all());

        if ($kasus) {
            Session::flash('succMessage', 'Mahasiswa berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Mahasiswa gagal ditambahkan!');
        }

        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        // dd($id);
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();
        $kecamatan = Kecamatan::with('kelurahan')->get();
        $kelurahan = Kelurahan::all();
        $jk = ['Laki - Laki', 'Perempuan'];

        return view('edit.mahasiswa-edit', ['mahasiswa' => $mahasiswa, 'kecamatan' => $kecamatan, 'jk' => $jk, 'kelurahan' => $kelurahan, 'jurusan' => $jurusan]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $rules = [];
        $messages = [];
        $mahasiswa = Mahasiswa::findOrFail($id);
        // dd($request->tgl_lahir !== $mahasiswa->tgl_lahir);

        if ($request->nama != $mahasiswa->nama) {
            $rules['nama'] = 'unique:mahasiswa|max:50|required';
            $messages['nama.unique'] = 'Nama Mahasiswa Sudah ada!';
            $messages['nama.required'] = 'Mahasiswa wajib Diisi!';
            $messages['nama.max'] = 'Nama Mahasiswa tidak boleh lebih dari :max karakter!';
        }

        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'unique:mahasiswa|required';
            $messages['nim.unique'] = 'NIM Sudah ada!';
            $messages['nim.required'] = 'NIM wajib Diisi!';
        }

        if ($request->jk !== $mahasiswa->jk) {
            $rules['jk'] = 'required';
            $messages['jk.required'] = 'Jenis kelamin wajib diisi!';
        }

        if ($request->tgl_lahir !== $mahasiswa->tgl_lahir) {
            $rules['tgl_lahir'] = 'required';
            $messages['tgl_lahir.required'] = 'Tanggal wajib dipilih!';
        }

        if ($request->bln_lahir !== $mahasiswa->bln_lahir) {
            $rules['bln_lahir'] = 'required';
            $messages['bln_lahir.required'] = 'Bulan wajib dipilih!';
        }

        if ($request->thn_lahir !== $mahasiswa->thn_lahir) {
            $rules['thn_lahir'] = 'required';
            $messages['thn_lahir.required'] = 'Tahun wajib dipilih!';
        }

        if ($request->jurusan_id !== $mahasiswa->jurusan_id) {
            $rules['jurusan_id'] = 'required';
            $messages['jurusan_id.required'] = 'Jurusan wajib dipilih!';
        }

        if ($request->kecamatan_id !== $mahasiswa->kecamatan_id) {
            $rules['kecamatan_id'] = 'required';
            $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';
        }

        if ($request->kelurahan_id !== $mahasiswa->kelurahan_id) {
            $rules['kelurahan_id'] = 'required';
            $messages['kelurahan_id.required'] = 'Kelurahan wajib diisi!';
        }


        // dd($messages);
        $request->validate($rules, $messages);

        $result = $mahasiswa->update($request->all());



        if ($result) {
            Session::flash('succMessage', 'Mahasiswa berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Mahasiswa gagal diubah!');
        }

        return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        $kecamatan = Mahasiswa::findOrFail($id);
        $result = $kecamatan->delete();

        if ($result) {
            Session::flash('succMessage', 'Mahasiswa berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Mahasiswa gagal dihapus!');
        }

        return redirect('/mahasiswa');
    }
}