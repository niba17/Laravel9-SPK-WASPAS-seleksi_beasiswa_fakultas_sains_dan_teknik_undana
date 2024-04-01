@extends('layouts.master')
@section('title', 'SIG | Ubah Tahun Kasus')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/tahun" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i>
                        Kembali</a>

                    <div class="card shadow card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Ubah Tahun Kasus</b></h3>
                        </div>

                        <form action="/tahun-update/{{ $tahun->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nama">Tahun</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $tahun->nama }}"
                                                placeholder="Masukkan Tahun...">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">Ubah <i class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
