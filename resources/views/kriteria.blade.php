@extends('layouts.master')
@section('title', 'WASPAS | Kriteria')
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
                            Kriteria
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
                                <div class="d-flex mb-3">
                                    <a href="/kriteria-add" class="btn btn-primary btn-sm me-2">Tambah
                                        Kriteria</a>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Tambah Sub Kriteria
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @foreach ($kriteria as $item)
                                                <li><a class="dropdown-item"
                                                        href="/sub_kriteria-add/{{ $item->id }}">{{ $item->nama }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Bobot Kriteria</th>
                                            <th>Aksi Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Bobot Sub Kriteria</th>
                                            <th>Aksi Sub Kriteria</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->role }}</td>
                                                <td>{{ $item->bobot }}</td>
                                                <td>
                                                    <a href="/kriteria-edit/{{ $item->id }}"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="#" onclick="hapus('{{ $item->id }}','kriteria')"><i
                                                            class="fa-regular fa-trash-can"></i></a>
                                                </td>
                                                <td>
                                                    @foreach ($item->sub_kriteria as $item2)
                                                        <li>
                                                            {{ $item2->nama }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->sub_kriteria as $item3)
                                                        <li>
                                                            {{ $item3->bobot }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->sub_kriteria as $item4)
                                                        <a href="/sub_kriteria-edit/{{ $item4->id }}">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item4->id }}','sub_kriteria')">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </a>
                                                        <br>
                                                    @endforeach
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
