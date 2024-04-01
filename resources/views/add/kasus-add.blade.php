@extends('layouts.master')
@section('title', 'SIG | Tambah Data')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/kasus/{{ $tahun_kasus[0]->id }}" class="btn btn-warning btn-sm mb-2"><i
                            class="fa-solid fa-backward"></i>
                        Kembali</a>

                    <div class="card shadow card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Tambah Data Kasus</b></h3>
                        </div>


                        <form action="/kasus-store" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="kecamatan_id">Kecamatan</label>
                                            <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="kecamatan_id" name="kecamatan_id">
                                                <option value="" selected disabled>Pilih Kecamatan ...
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

                                        <div class="form-group">
                                            <label for="kelurahan_id">Kelurahan</label>
                                            <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="kelurahan_id" name="kelurahan_id">
                                                <option value="" selected disabled>Pilih Kecamatan terlebih dahulu ...
                                                </option>
                                            </select>
                                            @error('kelurahan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="sasaran">Sasaran</label>
                                            <input type="number"
                                                class="form-control @error('sasaran') is-invalid @enderror" id="sasaran"
                                                name="sasaran" value="{{ old('sasaran') }}"
                                                placeholder="Masukkan Sasaran ...">
                                            @error('sasaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="j_b_diukur">Jumlah Balita Diukur</label>
                                            <input type="number"
                                                class="form-control @error('j_b_diukur') is-invalid @enderror"
                                                id="j_b_diukur" name="j_b_diukur" value="{{ old('j_b_diukur') }}"
                                                placeholder="Masukkan Jumlah Balita Diukur ...">
                                            @error('j_b_diukur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="s_pendek">Jumlah balita sangat pendek</label>
                                            <input type="number"
                                                class="form-control @error('s_pendek') is-invalid @enderror" id="s_pendek"
                                                name="s_pendek" value="{{ old('s_pendek') }}"
                                                placeholder="Masukkan Jumlah balita sangat pendek ...">
                                            @error('s_pendek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="pendek">Jumlah balita pendek</label>
                                            <input type="number" class="form-control @error('pendek') is-invalid @enderror"
                                                id="pendek" name="pendek" value="{{ old('pendek') }}"
                                                placeholder="Masukkan Jumlah balita pendek ...">
                                            @error('pendek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="normal">Jumlah balita normal</label>
                                            <input type="number" class="form-control @error('normal') is-invalid @enderror"
                                                id="normal" name="normal" value="{{ old('normal') }}"
                                                placeholder="Masukkan Jumlah balita normal ...">
                                            @error('normal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="tinggi">Jumlah balita tinggi</label>
                                            <input type="number" class="form-control @error('tinggi') is-invalid @enderror"
                                                id="tinggi" name="tinggi" value="{{ old('tinggi') }}"
                                                placeholder="Masukkan Jumlah balita tinggi ...">
                                            @error('tinggi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="total">Total</label>
                                            <input type="number" class="form-control @error('total') is-invalid @enderror"
                                                id="total" name="total" value="{{ old('total') }}" disabled>
                                            @error('total')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" class="total" name="total" value="{{ old('total') }}">

                                        <div class="form-group">
                                            <label for="presentase">Persentase</label>
                                            <input type="text"
                                                class=" form-control @error('presentase') is-invalid @enderror"
                                                id="presentase" name="presentase" value="{{ old('presentase') }}"
                                                disabled>
                                            @error('presentase')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" class="presentase" name="presentase"
                                            value="{{ old('presentase') }}">

                                        <div class="form-group">
                                            <label for="tahun_id">Tahun</label>
                                            <select class="form-select @error('tahun_id') is-invalid @enderror"
                                                aria-label="Default select example" id="tahun_id" name="tahun_id">
                                                <option value="" selected disabled>Pilih Tahun ...</option>
                                                @foreach ($tahun_kasus as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('tahun_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">Tambah <i
                                        class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
