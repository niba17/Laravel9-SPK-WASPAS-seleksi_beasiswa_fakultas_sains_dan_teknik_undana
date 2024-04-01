@extends('layouts.master')
@section('title', 'WASPAS | Kelurahan')
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
                            Kelurahan
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
                                <a href="/kelurahan-add" class="btn btn-primary btn-sm mb-3">Tambah Kelurahan</a>
                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kecamatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelurahan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kecamatan->nama ?? 'Kecamatan belum dipilih' }}</td>
                                                <td>
                                                    <a href="/kelurahan-edit/{{ $item->id }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="#" onclick="hapus('{{ $item->id }}','kelurahan')"><i
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
