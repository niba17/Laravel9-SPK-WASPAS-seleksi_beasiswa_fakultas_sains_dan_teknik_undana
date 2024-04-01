@extends('layouts.master')
@section('title', 'SIG | Tambah Data')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/puskesmas" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i>
                        Kembali
                    </a>

                    <div class="card shadow card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>Tambah Data Puskesmas</b>
                            </h3>
                        </div>


                        <form action="/puskesmas-store" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}"
                                                placeholder="Nama Puskesmas...">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="kecamatan_id">Kecamatan</label>
                                            <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="kecamatan_id" name="kecamatan_id">
                                                <option value="" selected disabled>Pilih Kecamatan...
                                                </option>
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kecamatan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="kecamatan_id">Lingkup Kecamatan</label>
                                            <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="kecamatan_id" name="kecamatan_id">
                                                <option value="" selected>Pilih Kecamatan...</option>
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kecamatan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}

                                        {{-- <div class="form-group">
                                            <label for="kelurahan_id">Kelurahan</label>
                                            <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                            aria-label="Default select example" id="kelurahan_id" name="kelurahan_id">
                                            <option value="" selected>Pilih Kelurahan...
                                            </option> --}}
                                        {{-- <label for="kelurahan_id">Lingkup Kelurahan</label>
                                        <div class="btn-group @error('kelurahan_id') is-invalid @enderror" role="group"
                                            aria-label="Basic checkbox toggle button group">
                                            @foreach ($kelurahan as $item) --}}
                                        {{-- <option value="{{ $item->id }}">{{ $item->nama }}</option> --}}
                                        {{-- <input type="checkbox" class="btn-check"
                                                    id="btncheck.{{ $loop->iteration }}"
                                                    name="kelurahan_id[{{ $item->id }}]" autocomplete="off">
                                                <label class="btn btn-outline-primary"
                                                    for="btncheck.{{ $loop->iteration }}">{{ $item->nama }}</label>
                                            @endforeach
                                        </div>
                                        @error('kelurahan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">Tambah <i
                                        class="fa-solid fa-check"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
