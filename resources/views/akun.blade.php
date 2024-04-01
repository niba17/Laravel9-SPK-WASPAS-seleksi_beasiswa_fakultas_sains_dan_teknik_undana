@extends('layouts.master')
@section('title', 'WASPAS | Akun')
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
                            Akun
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
                                <a href="/akun-add" class="btn btn-primary btn-sm mb-3">Tambah Akun</a>
                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($akun as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>*****</td>
                                                <td>
                                                    @if ($current_id == $item->id)
                                                        <a href="/akun-edit/{{ $item->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a href="#" onclick="hapus('{{ $item->id }}','akun')"><i
                                                                class="fa-regular fa-trash-can"></i>
                                                        </a href="#">
                                                    @endif
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
