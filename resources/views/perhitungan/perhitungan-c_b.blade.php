@extends('layouts.master')
@section('title', 'WASPAS | Cost, Benefit & QI')
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
                            Cost, Benefit & QI
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
                        <a href="/perhitungan-pembobotan" class="btn btn-primary btn-sm mb-3"><i
                                class="fa-solid fa-caret-left me-1"></i> Perhitungan Pembobotan</a>
                        <a href="/home" class="btn btn-primary btn-sm mb-3">Kembali ke Home <i
                                class="fa-solid fa-caret-right ms-1"></i></a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pembobotan Cost & Benefit Mahasiswa</h3>
                            </div>
                            <div class="table-responsive px-3 py-4">

                                <table class="table table-vcenter card-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Jurusan</th>
                                            @foreach ($kriteria as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($waspas_reversed as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['nama'] }}</td>
                                                @if ($item['jurusan'])
                                                    <td>
                                                        {{ $item['jurusan'] }}
                                                    </td>
                                                @else
                                                    <td class="text-danger">Jurusan belum dipilih!</td>
                                                @endif
                                                @foreach ($item['kriteria'] as $item2)
                                                    @if (isset($item2['sub_kriteria']))
                                                        @foreach ($item2['sub_kriteria'] as $item3)
                                                            <td>
                                                                {{ $item3['bobot_c_b'] }}
                                                            </td>
                                                        @endforeach
                                                    @else
                                                        <td class="text-danger">Bobot belum ditentukan!</td>
                                                    @endif
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
                                <h3 class="card-title">WPM, WSM & QI Mahasiswa</h3>
                            </div>
                            <div class="table-responsive px-3 py-4">

                                <table class="table table-vcenter card-table" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Jurusan</th>
                                            <th>WPM</th>
                                            <th>WSM</th>
                                            <th>QI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($waspas_reversed as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['nama'] }}</td>
                                                @if ($item['jurusan'])
                                                    <td>
                                                        {{ $item['jurusan'] }}
                                                    </td>
                                                @else
                                                    <td class="text-danger">Jurusan belum dipilih!</td>
                                                @endif
                                                <td>{{ $item['bobot_WSM'] }}</td>
                                                <td>{{ $item['bobot_WPM'] }}</td>
                                                <td>{{ $item['bobot_QI'] }}</td>
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
                                <h3 class="card-title">Perankingan</h3>
                            </div>
                            <div class="table-responsive px-3 py-4">

                                <table class="table table-vcenter card-table" id="myTable3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Jurusan</th>
                                            <th>WPM</th>
                                            <th>WSM</th>
                                            <th>QI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($waspas[0] as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['nama'] }}</td>
                                                @if ($item['jurusan'])
                                                    <td>
                                                        {{ $item['jurusan'] }}
                                                    </td>
                                                @else
                                                    <td class="text-danger">Jurusan belum dipilih!</td>
                                                @endif
                                                <td>{{ $item['bobot_WSM'] }}</td>
                                                <td>{{ $item['bobot_WPM'] }}</td>
                                                <td>{{ $item['bobot_QI'] }}</td>
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
