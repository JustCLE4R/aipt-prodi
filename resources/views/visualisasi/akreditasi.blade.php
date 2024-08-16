@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Akreditasi Program Studi </span>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-11 col-xs-11 p-2 wow fadeInUp" id="overflow" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Predikat</th>
                                <th scope="col">S1</th>
                                <th scope="col">S2</th>
                                <th scope="col">S3</th>
                                <th scope="col">Profesi</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-1" height="200vh"></canvas>
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
            var apiUrl = '/api/visualisasi/lainnya/D8:I14';
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {

                    $('#dataTableBody').empty();
                    $.each(data, function(index, entry) {
                        var row = $('<tr>');
                        row.append('<th scope="row">' + (index + 1) + '</th>');
                        row.append('<td>' + entry['Predikat'] + '</td>');
                        row.append('<td>' + entry['S1'] + '</td>');
                        row.append('<td>' + entry['S2'] + '</td>');
                        row.append('<td>' + entry['S3'] + '</td>');
                        row.append('<td>' + entry['Profesi'] + '</td>');
                        row.append('<td>' + entry['Jumlah'] + '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = data.slice(0, -1).map(entry => entry.Predikat);
                    const dataset1 = {
                        label: 'Akreditasi Program Studi',
                        data: data.slice(0, -1).map(entry => entry['Jumlah']),
                        backgroundColor: 'rgb(11 169 9 / 38%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };


                    renderChart('chart-1', 'bar', labels, [dataset1]);
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
