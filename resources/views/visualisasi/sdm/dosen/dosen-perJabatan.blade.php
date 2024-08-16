@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Dosen Berdasarkan Jabatan Akademik </span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jabatan Akademik</th>
                                <th scope="col">Doktor</th>
                                <th scope="col">Magister</th>
                                <th scope="col">Profesi</th>
                                <th scope="col">Jumlah</th>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-1" height="300vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-2" height="300vh"></canvas>
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
            var apiUrl = '/api/visualisasi/dosen/D2:H8';
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#dataTableBody').empty();
                    var labels = [];
                    var doktor = [];
                    var magister = [];


                    $.each(data, function(index, entry) {
                        var row = $('<tr>');
                        row.append('<th scope="row">' + (index + 1) + '</th>');
                        row.append('<td>' + entry['Jabatan Akademik'] + '</td>');
                        row.append('<td>' + entry['Doktor'] + '</td>');
                        row.append('<td>' + entry['Magister'] + '</td>');
                        row.append('<td>' + entry['Profesi'] + '</td>');
                        row.append('<td>' + entry['Jumlah'] + '</td>');

                        if (index != data.length - 1) {
                            labels.push(entry['Jabatan Akademik']);
                            doktor.push(entry['Doktor']);
                            magister.push(entry['Magister']);

                        }

                        $('#dataTableBody').append(row);
                    });

                    const chartData = {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah',
                            data: doktor,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(153, 102, 255)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)'
                            ],
                        }]
                    };
                    const chartData2 = {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah',
                            data: magister,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(153, 102, 255)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)'
                            ],
                        }]
                    };
                    renderChart('chart-1', chartData);
                    renderChart('chart-2', chartData2);

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function renderChart(canvasId, dataset) {
                const config = {
                    type: 'pie',
                    data: dataset,
                    options: {
                        plugins: {
                            datalabels: {
                                formatter: (value, ctx) => {
                                    const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b,
                                        0);
                                    const percentage = (value * 100 / total).toFixed(2) + '%';
                                    return percentage;
                                },
                                color: 'white',
                            }
                        }
                    }
                };
                var ctx = document.getElementById(canvasId);
                var myChart = new Chart(ctx, config);
            }
        });
    </script>
@endsection
