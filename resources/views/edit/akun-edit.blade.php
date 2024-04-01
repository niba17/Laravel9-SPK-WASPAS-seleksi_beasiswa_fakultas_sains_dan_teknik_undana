@extends('layouts.master')
@section('title', 'WASPAS | Edit Akun')
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
                            Edit Akun
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
                        <form class="card" action="/akun-update/{{ $akun->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="/akun">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-4 p-1">
                                    <label for="nama" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        aria-describedby="emailHelp" value="{{ $akun->nama }}" name="nama"
                                        id="nama" autocomplete="off">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="..." name="password" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label for="password_c" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control @error('password_c') is-invalid @enderror"
                                        placeholder="..." name="password_c" id="password_c">
                                    @error('password_c')
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
