@extends('layouts.master')
@section('title', 'SIG | Ubah Data')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/puskesmas" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i>
                        Kembali</a>

                    <div class="card shadow card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Ubah Data Puskesmas</b></h3>
                        </div>


                        <form action="/puskesmas-update/{{ $puskesmas->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Puskesmas</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $puskesmas->nama }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="kecamatan_id">Lingkup Kecamatan</label>
                                            <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="kecamatan_id" name="kecamatan_id">
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if (isset($puskesmas->kecamatan->nama)) @if ($puskesmas->kecamatan->nama == $item->nama) {{ 'selected' }} @endif
                                                    @else { {{ '' }} } @endif>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kecamatan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">Ubah <i
                                        class="fa-solid fa-check"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
