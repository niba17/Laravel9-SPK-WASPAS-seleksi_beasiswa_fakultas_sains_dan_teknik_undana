@extends('layouts.master')
@section('title', 'WASPAS | Bobot Mahasiswa')
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
                            Bobot Mahasiswa
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
                                <a href="/bobot_mahasiswa-add" class="btn btn-primary btn-sm mb-3">Tambah bobot sub kriteria
                                    mahasiswa</a>
                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    @foreach ($item->bobot_mahasiswa as $item2)
                                                        <li>
                                                            {{ $item2->sub_kriteria->kriteria->nama }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->bobot_mahasiswa as $item3)
                                                        <li>
                                                            {{ $item3->sub_kriteria->nama }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->bobot_mahasiswa as $item4)
                                                        <li>
                                                            {{ $item4->sub_kriteria->bobot }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($item->bobot_mahasiswa as $item4)
                                                        <a href="/bobot_mahasiswa-edit/{{ $item4->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item4->id }}','bobot_mahasiswa')"><i
                                                                class="fa-regular fa-trash-can"></i></a>
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
