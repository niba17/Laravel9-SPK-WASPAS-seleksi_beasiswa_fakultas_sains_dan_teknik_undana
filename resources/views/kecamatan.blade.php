@extends('layouts.master')
@section('title', 'WASPAS | Lokasi')
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
                            Lokasi
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
                            <div class="row">
                                <div class="table-responsive px-3 py-4 col-lg-6">
                                    <a href="/kecamatan-add" class="btn btn-primary btn-sm mb-3">Tambah Kecamatan</a>
                                    <table class="table table-vcenter card-table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kecamatan as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>

                                                    <td>
                                                        @foreach ($item->kelurahan as $item2)
                                                            <li>
                                                                {{ $item2->nama }}
                                                            </li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="/kecamatan-edit/{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item->id }}','kecamatan')"><i
                                                                class="fa-regular fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive px-3 py-4 col-lg-6">

                                    <a href="/kelurahan-add" class="btn btn-primary btn-sm mb-3">Tambah Data Kelurahan</a>

                                    <table class="table table-vcenter card-table" id="myTable2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelurahan</th>
                                                <th>Kecamatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelurahan as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if (isset($item->kecamatan->nama))
                                                            {{ $item->kecamatan->nama }}
                                                        @else
                                                            <span class="text-danger">Kecamatan belum dipilih!</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/kelurahan-edit/{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item->id }}','kelurahan')"><i
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

    </div>

@endsection
