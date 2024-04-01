<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubKriteriaController extends Controller
{
    public function create($kriteria_id)
    {
        $kriteria = Kriteria::findOrFail($kriteria_id);
        return view('add.sub_kriteria-add', ['kriteria' => $kriteria]);
    }

    public function validator_add(Request $request)
    {
        $rules = [];
        $messages = [];
        $rules['nama'] = 'max:50|required';
        $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama wajib diisi!';

        $rules['bobot'] = 'required|numeric|gte:1|lte:100|max:100';
        $messages['bobot.required'] = 'Bobot kriteria wajib diisi!';
        $messages['bobot.numeric'] = 'Bobot kriteria harus berupa angka!';
        $messages['bobot.gte'] = 'Bobot sub kriteria minimal adalah 1!';
        $messages['bobot.lte'] = 'Bobot sub kriteria maksimal adalah 100!';
        $messages['bobot.max'] = 'Bobot sub kriteria tidak boleh lebih dari :max karakter!';

        $request->validate($rules, $messages);

        $sub_kriteria = SubKriteria::get();

        $valid = true;
        foreach ($sub_kriteria as $key => $value) {
            if ($request->nama == $value->nama && $request->kriteria_id == $value->kriteria_id) {
                $valid = false;
            }
        }

        if ($valid == true) {
            return $this->store($request);
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'nama' => ['Sub kriteria sudah ada!']
            ]);
            throw $error;
        }

    }

    public function store($request)
    {
        $arrayAdd = [];
        $arrayAdd = $request;
        // $arrayAdd['bobot'] = $arrayAdd['bobot'] / 100;

        $result = SubKriteria::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Sub Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Sub Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria');
    }

    public function edit($id)
    {
        // $kriteria = Kriteria::findOrFail($id);
        $sub_kriteria = SubKriteria::findOrFail($id);
        return view('edit.sub_kriteria-edit', ['sub_kriteria' => $sub_kriteria]);
    }

    public function validator_edit(Request $request, $id)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $sub_kriteria = SubKriteria::findOrFail($id);



        if ($sub_kriteria->nama != $request->nama) {
            $rules['nama'] = 'max:50|required';
            $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
            $messages['nama.required'] = 'Nama wajib diisi!';
        }

        if ($sub_kriteria->bobot != $request->bobot) {
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

        // if ($sub_kriteria->bobot != $request->bobot) {
        //     $arrayUp['bobot'] = $arrayUp['bobot'] / 100;
        // }

        $sub_kriteria_all = SubKriteria::get();

        $valid = true;
        if ($sub_kriteria->nama != $request->nama) {
            foreach ($sub_kriteria_all as $key => $value) {
                if ($request->nama == $value->nama && $request->kriteria_id == $value->kriteria_id) {
                    $valid = false;
                }
            }
        }

        if ($valid == true) {
            return $this->update($arrayUp, $id);
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'nama' => ['Sub kriteria sudah ada!']
            ]);
            throw $error;
        }

    }

    public function update($request, $id)
    {
        // dd($request->all());


        $sub_kriteria = SubKriteria::findOrFail($id);

        $result = $sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/kriteria');
    }

    public function destroy($id)
    {
        $kriteria = SubKriteria::findOrFail($id);
        $result = $kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Sub kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Sub kriteria gagal dihapus!');
        }

        return redirect('/kriteria');
    }
}