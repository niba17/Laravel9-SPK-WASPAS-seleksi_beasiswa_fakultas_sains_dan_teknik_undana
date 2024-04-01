<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    public function index(Type $var = null)
    {
        $kriteria = Kriteria::with(['sub_kriteria'])->get();

        session()->forget('errMessage');
        return view('kriteria', ['kriteria' => $kriteria]);
    }

    public function create()
    {
        $role = ['Benefit', 'Cost'];
        return view('add.kriteria-add', ['role' => $role]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:kriteria|max:100|required';
        $messages['nama.unique'] = 'Kriteria sudah ada!';
        $messages['nama.max'] = 'Kriteria tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Kriteria wajib diisi!';

        $rules['role'] = 'required';
        $messages['role.required'] = 'Role wajib diisi!';

        $rules['bobot'] = 'required|numeric|gte:1|lte:100|max:100';
        $messages['bobot.required'] = 'Bobot kriteria wajib diisi!';
        $messages['bobot.numeric'] = 'Bobot kriteria harus berupa angka!';
        $messages['bobot.gte'] = 'Bobot kriteria minimal adalah 1!';
        $messages['bobot.lte'] = 'Bobot kriteria maksimal adalah 100!';
        $messages['bobot.max'] = 'Bobot kriteria tidak boleh lebih dari :max karakter!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;
        // $arrayAdd['bobot'] = $arrayAdd['bobot'] / 100;

        $kriteria = Kriteria::create($arrayAdd->all());

        if ($kriteria) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria');
    }

    public function edit($id)
    {
        $role = ['Benefit', 'Cost'];
        $kriteria = Kriteria::findOrFail($id);
        return view('edit.kriteria-edit', ['kriteria' => $kriteria, 'role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kriteria = Kriteria::findOrFail($id);

        if ($request->nama != $kriteria->nama) {
            $rules['nama'] = 'unique:kriteria|max:100|required';
            $messages['nama.unique'] = 'Username Sudah ada!';
            $messages['nama.required'] = 'Username wajib Diisi!';
            $messages['nama.max'] = 'Username tidak boleh lebih dari :max karakter!';
        }

        if ($request->role != $kriteria->role) {
            $rules['role'] = 'required';
            $messages['role.required'] = 'Role wajib diisi!';
        }

        if ($request->bobot != $kriteria->bobot) {
            $rules['bobot'] = 'required|numeric|gte:1|lte:100|max:100';
            $messages['bobot.required'] = 'Bobot kriteria wajib diisi!';
            $messages['bobot.numeric'] = 'Bobot kriteria harus berupa angka!';
            $messages['bobot.gte'] = 'Bobot kriteria minimal adalah 1!';
            $messages['bobot.lte'] = 'Bobot kriteria maksimal adalah 100!';
            $messages['bobot.max'] = 'Bobot kriteria tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $arrayUp = [];
        $arrayUp = $request;

        // if ($request->bobot != $kriteria->bobot) {
        //     $arrayUp['bobot'] = $arrayUp['bobot'] / 100;
        // }

        $result = $kriteria->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/kriteria');
    }

    public function request()
    {
        $kriteria = Kriteria::with(['sub_kriteria.bobot_mahasiswa'])->get();
        return response()->json([$kriteria]);
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $result = $kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/kriteria');
    }
}