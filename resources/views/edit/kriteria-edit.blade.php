@extends('layouts.master')
@section('title', 'WASPAS | Edit Kriteria')
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
                            Edit Kriteria
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
                        <form class="card" action="/kriteria-update/{{ $kriteria->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="/kriteria">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="nama">Nama Kriteria</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ $kriteria->nama }}" name="nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="role">Role</label>
                                    <div>
                                        <select class="form-select @error('role') is-invalid @enderror" name="role"
                                            id="role">
                                            <option selected disabled>Pilih Role</option>
                                            @foreach ($role as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="bobot">Bobot Kriteria</label>
                                    <input type="text" class="form-control @error('bobot') is-invalid @enderror"
                                        value="{{ $kriteria->bobot }}" name="bobot" id="bobot">
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
