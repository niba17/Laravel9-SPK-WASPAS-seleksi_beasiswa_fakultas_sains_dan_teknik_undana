@extends('layouts.masterLanding')
@section('title', 'SIG | Peta')
@section('content')

    <div class="container-fluid p-3">
        <a href="/" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i> Kembali</a>

        <div class="card shadow">

            <div class="card-header" style="background-color: #174A41">
                <h2 class="text-center text-white"><strong>Sebaran Stunting wilayah kota Kupang</strong></h2>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <select class="form-select alert alert-secondary font-weight-bold" id="tahun_id" role="alert"
                            style="font-size: 20px; height:78px;">
                            <option class="text-white" value="0">Pilih Tahun Persebaran
                            </option>
                            @php
                                $tahun_selected = '';
                            @endphp
                            @foreach ($tahun_button as $item)
                                @php
                                    if ($item->id == $tahun_id) {
                                        $tahun_selected = $item->nama;
                                    }
                                @endphp
                                <option value="{{ $item->id }}" @if ($item->id == $tahun_id) selected @endif>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="alert alert-warning" role="alert" style="height:78px;">
                            <strong>
                                <h5 class="card-title"><b>Total Sasaran</b></h5>
                                <p class="card-text" id="tSasaran">-</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="alert alert-success" role="alert" style="height:78px;">
                            <strong>
                                <h5 class="card-title"><b>Total Balita Diukur</b></h5>
                                <p class="card-text text-white" id="tBDiukur">-</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="alert alert-danger" role="alert" style="height:78px;">
                            <strong>
                                <h5 class="card-title"><b>Total Kasus</b></h5>
                                <p class="card-text text-white" id="tKasus">-</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="alert alert-primary" role="alert" style="height:78px;">
                            <strong>
                                <h5 class="card-title"><b>Persentase</b></h5>
                                <p class="card-text text-white" id="persentase">-</p>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="alert text-white" role="alert" style="background-color:#174A41;">
                    Silahkan centang wilayah srebaran yang diinginkan pada pojok kanan atas peta!
                </div>

                <div class="row">
                    @foreach ($kecamatan as $item)
                        <div class="col-sm-4 col-md-2">
                            <h5 class="text-center">{{ $item->nama }}</h5>
                            <div class="color-palette-set">
                                <div class="color-palette" style="background-color: {{ $item->warna_fill }};opacity:0.6;">
                                    <span style="color:{{ $item->warna_fill }};">.</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="row py-1">
                    <div class="col-lg-12">
                        <div id="map" style="height: 690px;"></div>
                    </div>
                </div>

                {{-- <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grafik Batang
                        </div>
                        <div class="panel-body">
                            <iframe src="" frameborder="0"></iframe>
                        </div>
                    </div>
                </div> --}}
                <div class="h2 text-center my-2">Chart Persentase Kasus Kecamatan Tahun {{ $tahun_selected }}</div>
                <hr>
                <div class="chart">
                    <div class="col-12">
                        <canvas id="barChart" height="30" width="100"></canvas>
                    </div>
                </div>
                <div class="h2 text-center my-2">Chart Persentase Kasus Kelurahan Tahun {{ $tahun_selected }}</div>
                <hr>
                <div class="chart">
                    <div class="col-12">
                        <canvas id="barChartKel" height="30" width="100"></canvas>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                {{-- <button type="submit" class="btn btn-success btn-sm">Submit <i
                    class="fa-solid fa-check"></i></button> --}}
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById("barChart").getContext("2d")
        var data1 = {
            labels: [<?php
            $i = 0;
            while ($i < count($kecamatan)) {
                echo '"' . $kecamatan[$i]->nama . ' (' . $tahun_selected . ') ' . '",';
                $i++;
            } ?>],
            datasets: [{
                label: 'Persentase Kecamatan',
                data: [<?php
                $i = 0;
                while ($i < count($persentase_fill_kec)) {
                    echo '"' . $persentase_fill_kec[$i]['persentase'] . '",';
                    $i++;
                } ?>],
                fill: true,
                backgroundColor: [<?php
                $i = 0;
                while ($i < count($persentase_fill_kec)) {
                    echo '"' . $persentase_fill_kec[$i]['fill'] . '",';
                    $i++;
                } ?>],

            }]
        }

        var ctx2 = document.getElementById("barChartKel").getContext("2d")
        var data2 = {
            labels: [<?php
            $i = 0;
            while ($i < count($kelurahan)) {
                echo '"' . $kelurahan[$i]->nama . ' (' . $tahun_selected . ') ' . '",';
                $i++;
            } ?>],
            datasets: [{
                label: 'Persentase Kelurahan',
                data: [<?php
                $i = 0;
                while ($i < count($persentase_fill_kel)) {
                    echo '"' . $persentase_fill_kel[$i]['persentase'] . '",';
                    $i++;
                } ?>],
                fill: true,
                backgroundColor: [<?php
                $i = 0;
                while ($i < count($persentase_fill_kel)) {
                    echo '"' . $persentase_fill_kel[$i]['fill'] . '",';
                    $i++;
                } ?>],

            }]
        }

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data1,
            options: {
                legend: {
                    display: false
                },
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: 'blue'
                        }
                    }]
                }
            }
        })

        var myBarChart = new Chart(ctx2, {
            type: 'bar',
            data: data2,
            options: {
                legend: {
                    display: false
                },
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: 'blue'
                        }
                    }]
                }
            }
        })


        var kecamatan = L.layerGroup();
        var kelurahan = L.layerGroup();

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var streets = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
            });

        var satellite = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                id: 'mapbox/satellite-v9',
                tileSize: 512,
                zoomOffset: -1,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
            });

        var map = L.map('map', {
            center: [-10.207078, 123.604489],
            zoom: 12,
            layers: [osm]
        });

        function popUp(f, l) {
            var out = []
            if (f.properties) {
                for (key in f.properties) {
                    if (key == 'KECAMATAN') {
                        out.push("<b>KECAMATAN : </b>" + f.properties[key])
                    } else if (key == 'DESA') {
                        out.push("<b>KELURAHAN : </b>" + f.properties[key])
                    }
                }
                l.bindPopup(out.join("<br />"))
            }
        }

        function style(feature) {
            return {
                opacity: 0.6,
                color: 'blue',
                fillOpacity: 0.1,
                fillColor: 'blue',
                weight: 1
            }
        }

        var kotaKupang = new L.GeoJSON.AJAX(["{{ asset('/plugin/mapGEOJSON') }}" + "/kelurahan.geojson"], {
            onEachFeature: popUp,
            style
        }).addTo(map)

        $('#tahun_id').on('change', function(geojsonLayer) {
            window.location.replace('/peta/' + $(this).val());
            // kecamatan.eachLayer(function(layer) {

            //     map.removeLayer(layer);

            // });
            // kelurahan.eachLayer(function(layer) {
            //     map.removeLayer(layer);
            // });

        })

        var tahun_selected = {{ $tahun_selected }}
        var tahun_id = {{ $tahun_id }}
        var tKasus = 0
        var sasaran = 0
        var j_b_diukur = 0
        var persentase = 0

        // console.log(tahun_id)

        $.ajax({
            url: "{{ route('peta-request') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // console.log(data[0])
                data[0].forEach(element => {
                    var out = []
                    if (tahun_id == element.tahun_id) {
                        // console.log(element.kelurahan.puskesmas.nama)
                        tKasus = tKasus + element.total
                        sasaran = sasaran + element.sasaran
                        j_b_diukur = j_b_diukur + element.j_b_diukur
                        persentase = (tKasus / j_b_diukur) * 100
                        geoLayer = new L.GeoJSON.AJAX([
                            "{{ asset('/plugin/mapGEOJSON/kelurahan') }}" +
                            "/" +
                            element.kelurahan.geojson
                        ], {

                            style: function(feature) {
                                return {
                                    opacity: 0.3,
                                    color: element.kelurahan.puskesmas.kecamatan
                                        .warna_fill,
                                    fillOpacity: 0.3,
                                    fillColor: element.kelurahan.puskesmas
                                        .kecamatan.warna_fill,
                                    weight: 1
                                }
                            },

                            onEachFeature: function(f, l) {
                                l.on({
                                    mouseover: highlightFeature1,
                                    mouseout: resetHighlight1
                                    // click: zoomToFeature
                                }).addTo(kelurahan)
                                if (f.properties) {
                                    for (key in f.properties) {
                                        if (key == 'DESA') {
                                            out.push("<b>Kelurahan : </b>" + f
                                                .properties[key])
                                            out.push("<b>Puskesmas : </b>" +
                                                element.kelurahan.puskesmas
                                                .nama)

                                            out.push("<b>Sasaran : </b>" +
                                                element
                                                .sasaran)
                                            out.push("<b>Total balita diukur : </b>" +
                                                element
                                                .j_b_diukur)
                                            out.push(
                                                "<b>A. Total Balita Sangat Pendek  : </b>" +
                                                element.s_pendek)
                                            out.push(
                                                "<b>B. Total Balita Pendek  : </b>" +
                                                element.pendek)
                                            out.push(
                                                "<b>C. Total Balita Normal  : </b>" +
                                                element.normal)
                                            out.push(
                                                "<b>D. Total Balita Tinggi  : </b>" +
                                                element.tinggi)
                                            out.push(
                                                `<b style="color:red;">Kasus</b><b> : </b> ` +
                                                element
                                                .total + ` ( A + B)`)
                                            out.push("<b>Persentase : </b>" +
                                                element.presentase + " %")
                                            out.push("<b>Tahun : </b>" + tahun_selected)
                                        } else if (key == 'KECAMATAN') {
                                            out.push("<b>Kecamatan : </b>" + f
                                                .properties[key])
                                        }
                                    }
                                    l.bindPopup(out.join("<br />"))
                                }
                            }
                        }).addTo(kelurahan)
                    }
                })

                // console.log(data[1])
                data[1].forEach(element => {
                    // console.log(element)
                    // console.log(element.nama)
                    var out2 = []
                    var tSasaran = 0
                    var tJBDdiukur = 0
                    var tSPendek = 0
                    var tPendek = 0
                    var tNormal = 0
                    var tTinggi = 0
                    var tTotal = 0


                    element.puskesmas.forEach(element => {
                        element.kelurahan.forEach(element => {
                            if (element.kasus !== null) {
                                element.kasus.forEach(element => {
                                    if (element.tahun_id !== null) {
                                        if (tahun_id == element.tahun_id) {
                                            // console.log(element.nama)
                                            tSasaran = tSasaran +
                                                element.sasaran
                                            tJBDdiukur = tJBDdiukur +
                                                element.j_b_diukur
                                            tSPendek = tSPendek +
                                                element.s_pendek
                                            tPendek = tPendek + element
                                                .pendek
                                            tNormal = tNormal + element
                                                .normal
                                            tTinggi = tTinggi + element
                                                .tinggi
                                            tTotal = tTotal + element
                                                .total
                                        }
                                    }
                                })
                            }
                        })
                    })

                    // console.log(tTotal)

                    geoLayer = new L.GeoJSON.AJAX([
                        "{{ asset('/plugin/mapGEOJSON/kecamatan') }}" + '/' +
                        element.geojson
                    ], {

                        // highlightFeature: function(e) {
                        //     var layer = e.target;

                        //     layer.setStyle({
                        //         weight: 5,
                        //         color: '#666',
                        //         dashArray: '',
                        //         fillOpacity: 0.7
                        //     });

                        //     layer.bringToFront();
                        // },

                        // resetHighlight: function(e) {
                        //     geojson.resetStyle(e.target);
                        // },

                        // zoomToFeature: function(e) {
                        //     map.fitBounds(e.target.getBounds());
                        // },

                        style: function(feature) {
                            return {
                                opacity: 0.3,
                                color: element.warna_fill,
                                fillOpacity: 0.3,
                                fillColor: element.warna_fill,
                                weight: 2
                            }
                        },

                        // onEachFeature: function(feature, layer) {
                        //     layer.on({
                        //         mouseover: highlightFeature,
                        //         mouseout: resetHighlight,
                        //         click: console.log('ok')
                        //     });
                        // },


                        onEachFeature: function(f, l) {

                            l.on({
                                mouseover: highlightFeature2,
                                mouseout: resetHighlight2
                                // click: zoomToFeature
                            }).addTo(kecamatan)
                            if (f.properties) {
                                for (key in f.properties) {
                                    if (key == 'KECAMATAN') {
                                        var persentase = (tTotal / tJBDdiukur) *
                                            100
                                        out2.push("<b>KECAMATAN : </b>" + f
                                            .properties[key])
                                        out2.push("<b>Total Sasaran : </b>" +
                                            tSasaran)
                                        out2.push(
                                            "<b>Total Balita Diukur  : </b>" +
                                            tJBDdiukur)
                                        out2.push(
                                            "<b>A. Total Balita Sangat Pendek  : </b>" +
                                            tSPendek)
                                        out2.push(
                                            "<b>B. Total Balita Pendek  : </b>" +
                                            tPendek)
                                        out2.push(
                                            "<b>C. Total Balita Normal  : </b>" +
                                            tNormal)
                                        out2.push(
                                            "<b>D. Total Balita Tinggi  : </b>" +
                                            tTinggi)
                                        out2.push(
                                            `<b style="color:red;">Total Kasus</b><b> : </b>` +
                                            tTotal + ` ( A + B )`)
                                        out2.push(
                                            "<b>Total Persentase  : </b>" +
                                            persentase.toFixed(1) + " %")
                                        out2.push(
                                            "<b>Tahun  : </b>" + tahun_selected)
                                    }
                                }
                                l.bindPopup(out2.join("<br />"))
                            }
                        }
                    }).addTo(kecamatan)


                })






                if (tahun_id == 0) {
                    $('#tSasaran').html('-')
                    $('#tBDiukur').html('-')
                    $('#tKasus').html('-')
                    $('#persentase').html('-')
                } else {
                    $('#tSasaran').html(sasaran + ' (' + tahun_selected + ')')
                    $('#tBDiukur').html(j_b_diukur + ' (' + tahun_selected + ')')
                    $('#tKasus').html(tKasus + ' (' + tahun_selected + ')')
                    $('#persentase').html(persentase.toFixed(1) + ' %' + ' (' +
                        tahun_selected + ')')
                }
            }
        })

        function highlightFeature1(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                opacity: 0.9,
                // color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
        }

        function resetHighlight1(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 2,
                opacity: 0.3,
                // color: '#666',
                dashArray: '',
                fillOpacity: 0.3
            });

            layer.bringToFront();
        }

        function highlightFeature2(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                opacity: 0.9,
                // color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
        }

        function resetHighlight2(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 2,
                opacity: 0.3,
                // color: '#666',
                dashArray: '',
                fillOpacity: 0.3
            });

            layer.bringToFront();
        }



        var baseLayers = {
            'OpenStreetMap': osm,
            'Jalanan': streets,
            'Satelit': satellite
        };

        var overlays = {
            'Kecamatan': kecamatan,
            'Kelurahan': kelurahan
        };

        var layerControl = L.control.layers(baseLayers, overlays).addTo(map);
        $('.leaflet-control-layers').addClass('leaflet-control-layers-expanded')
        // $('.leaflet-control-layers-overlays').children('label').children('span').children('input').attr(
        //     'checked', 'checked')
        $('#map').on('click', function() {
            $('.leaflet-control-layers').addClass('leaflet-control-layers-expanded')
        })
        $('.leaflet-control-layers').on('mouseenter', function() {
            $(this).addClass('leaflet-control-layers-expanded')
        })
        $('.leaflet-control-layers').on('mouseleave', function() {
            $(this).addClass('leaflet-control-layers-expanded')
        })
        // $('.leaflet-control-layers').addClass('leaflet-control-layers-expanded')


        const delay = (delayInms) => {
            return new Promise(resolve => setTimeout(resolve, delayInms));
        }

        const sample = async () => {
            // console.log('a');
            // console.log('waiting...')
            let delayres = await delay(5000);
            Swal.fire({
                // icon: 'warning',


                title: `<i class="fa-solid fa-rotate fa-3x" style="color:#174A41;"></i><br>Untuk pengguna smartphone disarankan menggunakan mode Landscape</div>`,
                timer: 7000
            })
        }
        sample();



        // console.log(overlays)

        // var crownHill = L.marker([-10.167008, 123.589998]).bindPopup(
        //     'This is Crown Hill Park.');
        // var rubyHill = L.marker([-10.168529, 123.598410]).bindPopup(
        //     'This is Ruby Hill Park.');

        // var parks = L.layerGroup([crownHill, rubyHill]);


        // layerControl.addBaseLayer(satellite, 'Satelit');
        // layerControl.addOverlay(parks, 'Parks');
    </script>
@endsection
