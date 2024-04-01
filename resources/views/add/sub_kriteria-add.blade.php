@extends('layouts.master')
@section('title', 'WASPAS | Tambah Sub Kriteria {{ $kriteria->nama }}')
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
                            Tambah Sub Kriteria {{ $kriteria->nama }}
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
                        <form class="card" action="/sub_kriteria-validator_add" method="post">
                            @csrf
                            <div class="card-header">
                                <a href="/kriteria">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-1">
                                    <label class="form-label" for="nama">Nama Sub Kriteria</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="..." value="{{ old('nama') }}" name="nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id" id="kriteria_id">
                                <div class="col-lg-6 p-1">
                                    <label class="form-label" for="bobot">Bobot Sub Kriteria</label>
                                    <input type="text" class="form-control @error('bobot') is-invalid @enderror"
                                        placeholder="..." value="{{ old('bobot') }}" name="bobot" id="bobot">
                                    <small class="form-hint fst-italic">Range bobot adalah 1 - 100</small>
                                    @error('bobot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
