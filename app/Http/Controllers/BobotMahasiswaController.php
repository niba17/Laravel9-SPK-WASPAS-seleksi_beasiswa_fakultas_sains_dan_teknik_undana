<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Models\BobotMahasiswa;
use Illuminate\Support\Facades\Session;

class BobotMahasiswaController extends Controller
{
    public function index(Type $var = null)
    {
        $mahasiswa = Mahasiswa::with(['bobot_mahasiswa.sub_kriteria'])->get();

        session()->forget('fatalErrMessage');
        return view('bobot_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $kriteria = Kriteria::all();
        $sub_kriteria = SubKriteria::with('kriteria')->get();

        return view('add.bobot_mahasiswa-add', ['mahasiswa' => $mahasiswa, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    }

    public function validator_add(Request $request)
    {
        $rules = [];
        $messages = [];
        $rules['mahasiswa_id'] = 'required';
        $messages['mahasiswa_id.required'] = 'Mahasiswa wajib dipilih!';

        $rules['sub_kriteria_id'] = 'required';
        $messages['sub_kriteria_id.required'] = 'Sub Kriteria wajib dipilih!';

        $request->validate($rules, $messages);

        $bobot_mahasiswa = BobotMahasiswa::get();

        $valid = true;
        foreach ($bobot_mahasiswa as $key => $value) {
            if ($request->mahasiswa_id == $value->mahasiswa_id && $request->sub_kriteria_id == $value->sub_kriteria_id) {
                $valid = false;
            }
        }

        if ($valid == true) {
            return $this->store($request);
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'sub_kriteria_id' => ['Sub kriteria sudah ada!']
            ]);
            throw $error;
        }

    }

    public function store($request)
    {
        $arrayAdd = [];
        $arrayAdd = $request;

        $result = BobotMahasiswa::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Bobot mahasiswa berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Bobot mahasiswa gagal ditambahkan!');
        }

        return redirect('/bobot_mahasiswa');
    }

    public function edit($id)
    {
        $bobot_mahasiswa = BobotMahasiswa::with(['mahasiswa', 'sub_kriteria.kriteria'])->findOrFail($id);
        $mahasiswa = Mahasiswa::get();
        $kriteria = Kriteria::with(['sub_kriteria'])->get();

        $kriteria_id = 0;

        foreach ($kriteria as $key => $value) {
            if ($bobot_mahasiswa->sub_kriteria->kriteria->id == $value->id) {
                $kriteria_id = $value->id;
            }
        }
        // dd($kriteria_id);
        return view('edit.bobot_mahasiswa-edit', ['bobot_mahasiswa' => $bobot_mahasiswa, 'mahasiswa' => $mahasiswa, 'kriteria' => $kriteria, 'kriteria_id' => $kriteria_id]);
    }

    public function validator_edit(Request $request, $id)
    {
        // dd($id);
        $rules = [];
        $messages = [];

        $bobot_mahasiswa = BobotMahasiswa::findOrFail($id);
        // dd($bobot_mahasiswa);

        if ($bobot_mahasiswa->mahasiswa_id != $request->mahasiswa_id) {
            $rules['mahasiswa_id'] = 'required';
            $messages['mahasiswa_id.required'] = 'Mahasiswa wajib dipilih!';
        }

        if ($bobot_mahasiswa->sub_kriteria_id != $request->sub_kriteria_id) {
            $rules['sub_kriteria_id'] = 'required';
            $messages['sub_kriteria_id.required'] = 'Kriteria wajib dipilih!';
        }

        $request->validate($rules, $messages);

        $arrayUp = [];
        $arrayUp = $request;

        // if ($bobot_mahasiswa->bobot != $request->bobot) {
        //     $arrayUp['bobot'] = $arrayUp['bobot'] / 100;
        // }

        $bobot_mahasiswa_all = BobotMahasiswa::all();

        $valid = true;
        if ($bobot_mahasiswa->mahasiswa_id != $request->mahasiswa_id && $bobot_mahasiswa->sub_kriteria_id != $request->sub_kriteria_id) {
            foreach ($bobot_mahasiswa_all as $key => $value) {
                if ($request->mahasiswa_id == $value->mahasiswa_id && $request->sub_kriteria_id == $value->sub_kriteria_id) {
                    $valid = false;
                }
            }
        }

        if ($valid == true) {
            return $this->update($arrayUp, $id);
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'sub_kriteria_id' => ['Sub kriteria sudah ada!']
            ]);
            throw $error;
        }

    }

    public function update($request, $id)
    {
        $bobot_mahasiswa = BobotMahasiswa::findOrFail($id);

        $result = $bobot_mahasiswa->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/bobot_mahasiswa');
    }

    public function destroy($id)
    {
        $bobot_mahasiswa = BobotMahasiswa::findOrFail($id);
        $result = $bobot_mahasiswa->delete();

        if ($result) {
            Session::flash('succMessage', 'Bobot Mahasiswa berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Bobot Mahasiswa gagal dihapus!');
        }

        return redirect('/bobot_mahasiswa');
    }
}