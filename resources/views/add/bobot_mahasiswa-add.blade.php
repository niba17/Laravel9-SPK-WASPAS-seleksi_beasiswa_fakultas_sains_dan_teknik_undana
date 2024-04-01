@extends('layouts.master')
@section('title', 'WASPAS | Tambah Bobot Sub Kriteria Mahasiswa')
@section('content')

    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        {{-- <div class="page-pretitle">
                        index
                    </div> --}}
                        <h2 class="page-title">
                            Tambah Bobot Sub Kriteria Mahasiswa
                        </h2>
                        <hr class="my-1">
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">

                    <div class="col-lg-12">
                        <form class="card" action="/bobot_mahasiswa-validator_add" method="post">
                            @csrf
                            <div class="card-header">
                                <a href="/bobot_mahasiswa">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">

                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="mahasiswa_id">Mahasiswa</label>
                                    <div>
                                        <select class="form-select @error('mahasiswa_id') is-invalid @enderror"
                                            name="mahasiswa_id" id="mahasiswa_id">
                                            <option selected disabled>Pilih Mahasiswa</option>
                                            @foreach ($mahasiswa as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('mahasiswa_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="kriteria_id">Kriteria</label>
                                    <div>
                                        <select class="form-select @error('kriteria_id') is-invalid @enderror"
                                            id="kriteria_id">
                                            <option selected disabled>Pilih mahasiswa terlebih dahulu</option>
                                            {{-- @foreach ($kriteria as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="sub_kriteria_id">Sub Kriteria</label>
                                    <div>
                                        <select class="form-select @error('sub_kriteria_id') is-invalid @enderror"
                                            name="sub_kriteria_id" id="sub_kriteria_id">
                                            <option selected disabled>Pilih kriteria terlebih dahulu</option>
                                        </select>
                                        @error('sub_kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-start">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
