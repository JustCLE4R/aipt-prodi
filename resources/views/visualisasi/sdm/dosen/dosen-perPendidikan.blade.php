@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Dosen Berdasarkan Pendidikan Terakhir </span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Doktor</th>
                                <th scope="col">Magister</th>
                                <th scope="col">Profesi</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-1"></canvas>
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <a href="/visualisasi"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        $(document).ready(function() {
            var status = window.location.pathname.split('/').pop();
            var apiUrl = '/api/visualisasi/dosen/J2:N12';
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {

                    $('#dataTableBody').empty();
                    data.forEach(function(entry, index) {
                        var row = $('<tr>');
                        row.append('<th scope="row">' + (index + 1) + '</th>');
                        row.append('<td>' + entry['Fakultas'] + '</td>');
                        row.append('<td>' + entry['Doktor'] + '</td>');
                        row.append('<td>' + entry['Magister'] + '</td>');
                        row.append('<td>' + entry['Profesi'] + '</td>');
                        row.append('<td>' + entry['Jumlah'] + '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = ["FDK", "FEBI", "FSH", "FTK", "FUSI", "FST", "FIS", "FKM",
                        "Pascasarjana"
                    ];
                    const dataset2 = {
                        label: 'Doktor',
                        data: data.slice(0, -1).map(entry => entry['Doktor']),
                        backgroundColor: 'rgb(11 169 9 / 48%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };
                    const dataset3 = {
                        label: 'Magister',
                        data: data.slice(0, -1).map(entry => entry['Magister']),
                        backgroundColor: 'rgb(7 129 22 / 28%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };

                    renderChart('chart-1', 'bar', labels, [dataset2, dataset3]);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function renderChart(canvasId, type, labels, datasets) {
                const config = {
                    type: type,
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };
                var myChart = new Chart(document.getElementById(canvasId), config);
            }
        });
    </script>
@endsection
