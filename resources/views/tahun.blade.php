@extends('layouts.master')
@section('title', 'SIG | Tahun Kasus')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/tahun-add" class="btn btn-success btn-sm mb-2">Tambah Data <i class="fa-solid fa-plus"></i></a>

                    <div class="card shadow card-primary">
                        <div class="card-header border-transparent">
                            <h3 class="text-center">Tahun Kasus</h3>
                        </div>

                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tahun as $item)
                                            <tr>
                                                <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                                <td style="vertical-align: middle;">{{ $item->nama }}</td>
                                                <td style="vertical-align: middle;">
                                                    <a href="/tahun-edit/{{ $item->id }}"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="hapus('{{ $item->id }}','{{ $controller = 'tahun' }}')"><i
                                                            class="fa-solid fa-trash"></i>
                                                    </a>
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
