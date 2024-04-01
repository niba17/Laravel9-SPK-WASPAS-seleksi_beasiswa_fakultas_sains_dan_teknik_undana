@extends('layouts.master')
@section('title', 'SIG | Puskesmas')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">
            {{-- @foreach ($puskesmas as $item)
                {{ print_r($item->all()) }}
                {{ '<br>' }}
                {{ '<br>' }}
                {{ '<br>' }}
            @endforeach --}}
            {{-- {{ dd($puskesmas) }}
            {{ die() }} --}}
            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/puskesmas-add" class="btn btn-success btn-sm mb-2">Tambah Data <i class="fa-solid fa-plus"></i>
                    </a>

                    <div class="card shadow card-primary">
                        <div class="card-header border-transparent">
                            <h3 class="text-center">Data Puskesmas</h3>
                        </div>

                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Lingkup Kecamatan</th>
                                            <th>Lingkup Kelurahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($puskesmas as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kecamatan->nama ?? 'NULL' }}
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($item->kelurahan as $value)
                                                            <li>
                                                                {{ '* ' . $value->nama ?? 'NULL' }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="/puskesmas-edit/{{ $item->id }}"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="hapus('{{ $item->id }}','puskesmas')"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- <button type="submit" class="btn btn-success btn-sm">Submit <i
                                    class="fa-solid fa-check"></i></button> --}}
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    @endsection
