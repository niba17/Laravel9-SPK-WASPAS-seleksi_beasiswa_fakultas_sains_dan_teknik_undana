@extends('layouts.master')
@section('title', 'WASPAS | Mahasiswa')
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
                            Mahasiswa
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
                        <div class="card">
                            <div class="table-responsive px-3 py-4">
                                <a href="/mahasiswa-add" class="btn btn-primary btn-sm mb-3">Tambah Mahasiswa</a>
                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jurusan</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->jk }}</td>
                                                <td>{{ $item->tgl_lahir . ' - ' . $item->bln_lahir . ' - ' . $item->thn_lahir }}
                                                </td>
                                                <td>
                                                    @if (isset($item->jurusan->nama))
                                                        {{ $item->jurusan->nama }}
                                                    @else
                                                        <span class="text-danger">Jurusan belum dipilih!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->kecamatan->nama))
                                                        {{ $item->kecamatan->nama }}
                                                    @else
                                                        <span class="text-danger">Kecamatan belum dipilih!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->kelurahan->nama))
                                                        {{ $item->kelurahan->nama }}
                                                    @else
                                                        <span class="text-danger">Kelurahan belum dipilih!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/mahasiswa-edit/{{ $item->id }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="#" onclick="hapus('{{ $item->id }}','mahasiswa')"><i
                                                            class="fa-regular fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
