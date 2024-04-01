@extends('layouts.master')
@section('title', 'WASPAS | Edit Kelurahan')
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
                            Edit Kelurahan
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
                        <form class="card" action="/kelurahan-update/{{ $kelurahan->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="/kecamatan">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-1">
                                    <label class="form-label" for="nama">Nama Kelurahan</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ $kelurahan->nama }}" name="nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 p-1">
                                    <label class="form-label" for="kecamatan_id">Kecamatan</label>
                                    <div>
                                        <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                            name="kecamatan_id" id="kecamatan_id">
                                            @foreach ($kecamatan as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($kelurahan->kecamatan_id == $item->id) selected @endif>{{ $item->nama }}
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
