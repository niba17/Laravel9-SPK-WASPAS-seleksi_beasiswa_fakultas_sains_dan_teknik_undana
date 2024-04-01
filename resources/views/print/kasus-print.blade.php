@extends('layouts.masterPrint')
@section('title', 'SIG | Kasus')
@section('content')



    <section class="content p-5 mt-5">
        <h1 class="text-center mb-5">Laporan Data Kasus Stunting Tahun {{ $tahun_button->nama }}</h1>
        <div class="container-fluid">

            <table class="table table-bordered text-xs" id="">
                <thead>
                    <tr>
                        <th class="align-middle" style="background:#78a0dd; color:#343a40;" rowspan="2">
                            No</th>
                        <th class="align-middle" style="background:#78a0dd; color:#343a40;" rowspan="2">
                            Lingkup Kelurahan
                        </th>
                        <th class="align-middle" style="background:#78a0dd; color:#343a40;" rowspan="2">
                            Lingkup Kecamatan
                        </th>
                        <th class="align-middle" style="background:#78a0dd; color:#343a40;" rowspan="2">
                            Puskesmas
                        </th>
                        <th class="align-middle" style="background:#78a0dd; color:#343a40;" rowspan="2">
                            Sasaran
                        </th>
                        <th class="align-middle" style="background:#78a0dd; color:#343a40;" rowspan="2">
                            Balita
                            Diukur
                        </th>
                        <th class="text-center" style="background:#74d78a; color:#343a40;" colspan="4">
                            Status Gizi
                        </th>
                        <th class="text-center" style="background:#db7a83; color:#343a40;" colspan="5">
                            Stunting</th>
                    </tr>
                    <tr>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Sangat
                            Pendek
                        </th>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Pendek</th>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Normal</th>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Tinggi</th>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Total</th>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Persentase
                        </th>
                        <th class="align-middle" style="background:#ebe657; color:#343a40;">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kasus as $item)
                        <tr>
                            <td class="align-middle fw-bold">
                                {{ $loop->iteration }}
                            </td>
                            <td class="align-middle">
                                {{ $item->kelurahan->nama ?? 'NULL' }}
                            </td>
                            <td class="align-middle">
                                {{ $item->kelurahan->puskesmas->kecamatan->nama ?? 'NULL' }}
                            </td>
                            <td class="align-middle">
                                {{ $item->kelurahan->puskesmas->nama ?? 'NULL' }}
                            </td>
                            <td class="align-middle">{{ $item->sasaran }}</td>
                            <td class="align-middle">{{ $item->j_b_diukur }}</td>
                            <td class="align-middle">{{ $item->s_pendek }}</td>
                            <td class="align-middle">{{ $item->pendek }}</td>
                            <td class="align-middle">{{ $item->normal }}</td>
                            <td class="align-middle">{{ $item->tinggi }}</td>
                            <td class="align-middle">{{ $item->total }}</td>
                            <td class="align-middle">{{ $item->presentase }} %</td>
                            <td class="align-middle">{{ $item->tahun->nama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        </div>
    </section>
    <script type="text/javascript">
        window.print()
    </script>
@endsection
