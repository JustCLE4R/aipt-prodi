@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Tugas Akhir</span>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Jumlah Mahasiswa Tugas Akhir</th>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-1" height="300vh"></canvas>
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
            var apiUrl = '/api/visualisasi/lainnya/M2:N12';
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#dataTableBody').empty();
                    $.each(data, function(index, entry) {
                        var row = $('<tr>');
                        row.append('<th scope="row">' + (index + 1) + '</th>');
                        row.append('<td>' + entry['Fakultas'] + '</td>');
                        row.append('<td>' + entry['Jumlah Mahasiswa Tugas Akhir'] + '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = data.slice(0, -1).map(entry => entry.Fakultas);
                    const dataset = {
                        label: 'Jumlah Mahasiswa Tugas Akhir Tahun 2022',
                        data: data.slice(0, -1).map(entry => entry['Jumlah Mahasiswa Tugas Akhir']),
                        backgroundColor: 'rgba(11, 169, 9, 0.2)',
                        borderColor: 'rgba(11, 169, 9, 0.2)',
                        borderWidth: 1
                    };
                    renderChart2('chart-1', labels, dataset);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function renderChart2(canvasId, labels, dataset) {
                const config = {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [dataset]
                    },
                    options: {
                        indexAxis: 'y',
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
