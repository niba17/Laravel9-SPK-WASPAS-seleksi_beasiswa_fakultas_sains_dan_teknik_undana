@extends('layouts.master')
@section('title', 'WASPAS | Home')
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
                            Home
                        </h2>
                        <hr class="my-1">
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">

                    <div class="col-12">
                        <div class="row row-cards">
                            <a href="/akun" class="col-lg-6" style="text-decoration:none">
                                <div class="card card-sm card-home">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <i class="fa-solid fa-user-shield" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="fw-bold text-dark">
                                                    Akun
                                                </div>
                                                <div class="text-muted text-primary">
                                                    {{ count($akun) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/mahasiswa" class="col-lg-6" style="text-decoration:none">
                                <div class="card card-sm card-home">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <i class="fa-solid fa-users" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="fw-bold text-dark">
                                                    Mahasiswa
                                                </div>
                                                <div class="text-muted text-primary">
                                                    {{ count($mahasiswa) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/kriteria" class="col-lg-6" style="text-decoration:none">
                                <div class="card card-sm card-home">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <i class="fa-solid fa-gears" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="fw-bold text-dark">
                                                    Kriteria
                                                </div>
                                                <div class="text-muted text-primary">
                                                    {{ count($kriteria) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/kecamatan" class="col-sm-6" style="text-decoration:none">
                                <div class="card card-sm card-home">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <i class="fa-solid fa-map-location-dot" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="fw-bold text-dark">
                                                    Lokasi
                                                </div>
                                                <div class="text-muted text-primary">
                                                    {{ count($kecamatan) }} | {{ count($kelurahan) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/bobot_mahasiswa" class="col-sm-6" style="text-decoration:none">
                                <div class="card card-sm card-home">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <i class="fa-solid fa-chart-column" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="fw-bold text-dark">
                                                    Bobot Mahasiswa
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/perhitungan-pembobotan" class="col-sm-6" style="text-decoration:none">
                                <div class="card card-sm card-home">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <i class="fa-solid fa-calculator" style="font-size: 20px"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="fw-bold text-dark">
                                                    Perhitungan
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="./docs/" class="link-secondary">D style="text-decoration:none"ocumentation</a>
                            </li>
                            <li class="list-inline-item"><a href="./license.html" class="link-secondary" style="text-decoration:none">License</a>
                            </li>
                            <li class="list-inline-item"><a href="https://github.com/tabler/tabler"  style="text-decoration:none"target="_blank"
                                    class="link-secondary" rel="noopener">Source code</a></li>
                            <li class="list-inline-item">
                                <a href="https://github.com/sponsors/codecalm"  style="text-decoration:none"target="_blank" class="link-secondary"
                                    rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                    Sponsor
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; 2022
                                <a href="." class="link-secondary">Tabler</a style="text-decoration:none">.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="./changelog.html" class="link-secondary" style="text-decoration:none" rel="noopener">
                                    v1.0.0-beta16
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>

@endsection
