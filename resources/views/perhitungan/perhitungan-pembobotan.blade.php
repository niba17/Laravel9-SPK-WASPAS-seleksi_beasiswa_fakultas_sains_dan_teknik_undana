@extends('layouts.master')
@section('title', 'WASPAS | Pembobotan')
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
                            Pembobotan
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
                        <a href="/home" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-caret-left me-1"></i>Kembali ke Home</a>
                        <a href="/perhitungan-b_c" class="btn btn-primary btn-sm mb-3">Perhitungan Cost, Benefit & QI <i
                                class="fa-solid fa-caret-right ms-1"></i></a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kriteria Mahasiswa</h3>
                            </div>
                            <div class="table-responsive px-3 py-4">

                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            @foreach ($kriteria as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                @foreach ($kriteria as $item3)
                                                    <td>
                                                        @foreach ($item->bobot_mahasiswa as $item2)
                                                            @if ($item3->id == $item2->sub_kriteria->kriteria_id)
                                                                {{ $item2->sub_kriteria->nama }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bobot Kriteria Mahasiswa</h3>
                            </div>
                            <div class="table-responsive px-3 py-4">

                                <table class="table table-vcenter card-table" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            @foreach ($kriteria as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                @foreach ($kriteria as $item3)
                                                    <td>
                                                        @foreach ($item->bobot_mahasiswa as $item2)
                                                            @if ($item3->id == $item2->sub_kriteria->kriteria_id)
                                                                {{ $item2->sub_kriteria->bobot }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                @endforeach
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
