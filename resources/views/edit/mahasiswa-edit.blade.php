@extends('layouts.master')
@section('title', 'WASPAS | Edit Mahasiswa')
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
                            Edit Mahasiswa
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
                        <form class="card" action="/mahasiswa-update/{{ $mahasiswa->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="/mahasiswa">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="nama">Nama Mahasiswa</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ $mahasiswa->nama }}" name="nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="nim">NIM</label>
                                    <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                        value="{{ $mahasiswa->nim }}" name="nim" id="nim">
                                    @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="jk">Jenis Kelamin</label>
                                    <select class="form-select @error('jk') is-invalid @enderror" name="jk"
                                        id="jk">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        @foreach ($jk as $item)
                                            <option value="{{ $item }}"
                                                @if ($item == $mahasiswa->jk) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select> @error('jk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-5 p-1">
                                    @php
                                        $tgl = [];
                                        $bln = [];
                                        $thn = [];
                                    @endphp
                                    @for ($i = 0; $i < 31; $i++)
                                        @php $tgl[$i]=$i+1; @endphp
                                    @endfor
                                    @php
                                        $bln = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    @endphp
                                    @for ($i = 1897; $i <= 2023; $i++)
                                        @php
                                            $thn[$i] = $i;
                                        @endphp
                                    @endfor
                                    <label class="form-label">Tanggal Lahir</label>
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <select name="tgl_lahir"
                                                class="form-select @error('tgl_lahir') is-invalid @enderror">
                                                <option selected disabled>Pilih Tanggal</option>
                                                @foreach ($tgl as $item)
                                                    <option value="{{ $item }}"
                                                        @if ($item == $mahasiswa->tgl_lahir) selected @endif>
                                                        {{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <select name="bln_lahir"
                                                class="form-select @error('bln_lahir') is-invalid @enderror">
                                                <option selected disabled>Pilih Bulan</option>
                                                @foreach ($bln as $item)
                                                    <option value="{{ $item }}"
                                                        @if ($item == $mahasiswa->bln_lahir) selected @endif>
                                                        {{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('bln_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <select name="thn_lahir"
                                                class="form-select @error('thn_lahir') is-invalid @enderror">
                                                <option selected disabled>Pilih Tahun</option>
                                                @foreach ($thn as $item)
                                                    <option value="{{ $item }}"
                                                        @if ($item == $mahasiswa->thn_lahir) selected @endif>
                                                        {{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('thn_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 p-1">
                                    <label class="form-label" for="jurusan_id">Jurusan</label>
                                    <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id"
                                        name="jurusan_id">
                                        <option selected disabled>Pilih Jurusan</option>
                                        @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $mahasiswa->jurusan_id) selected @endif>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select> @error('jurusan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="kecamatan_id">Kecamatan</label>
                                    <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                        id="kecamatan_id" name="kecamatan_id">
                                        <option selected disabled>Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $mahasiswa->kecamatan_id) selected @endif>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select> @error('kecamatan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-3 p-1">
                                    <label class="form-label" for="kelurahan_id">Kelurahan</label>
                                    <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                        id="kelurahan_id" name="kelurahan_id">
                                        @foreach ($kelurahan as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $mahasiswa->kelurahan_id) selected @endif>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select> @error('kelurahan_id')
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
