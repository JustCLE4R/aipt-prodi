@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Calon Mahasiswa {{ $jenjang }}</span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Daya Tampung</th>
                                <th scope="col">Pendaftar</th>
                                <th scope="col">Lulus Seleksi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-1"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-2"></canvas>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                      <a href="/visualisasi"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        $(document).ready(function() {
            var status = "{{ $jenjang }}"

            if (status === 'S1') {
                apiUrl = '/api/visualisasi/calonMhs/A2:D7';
            } else if (status === 'S2') {
                apiUrl = '/api/visualisasi/calonMhs/F2:I7';
            } else if (status === 'S3') {
                apiUrl = '/api/visualisasi/calonMhs/A10:D15';
            } else if (status === 'Profesi') {
                apiUrl = '/api/visualisasi/calonMhs/F10:I15';
            } else {
                console.error('Status tidak valid');
                return;
            }
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {

                    $('#dataTableBody').empty();
                    $.each(data, function(index, entry) {
                        var row = $('<tr>');
                        row.append('<th scope="row">' + (index + 1) + '</th>');
                        row.append('<td>' + entry.Tahun + '</td>');
                        row.append('<td>' + entry['Daya Tampung'] + '</td>');
                        row.append('<td>' + entry.Pendaftar + '</td>');
                        row.append('<td>' + entry['Lulus Seleksi'] + '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = data.map(entry => entry.Tahun);
                    const dataset1 = {
                        label: 'Jumlah Pendaftar',
                        data: data.map(entry => entry.Pendaftar),
                        backgroundColor: 'rgb(11 169 9 / 38%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };
                    const dataset2 = {
                        label: 'Daya Tampung',
                        data: data.map(entry => entry['Daya Tampung']),
                        backgroundColor: 'rgb(11 169 9 / 48%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };
                    const dataset3 = {
                        label: 'Lulus Seleksi',
                        data: data.map(entry => entry['Lulus Seleksi']),
                        backgroundColor: 'rgb(7 129 22 / 28%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };

                    renderChart('chart-1', 'bar', labels, [dataset1]);
                    renderChart('chart-2', 'bar', labels, [dataset2, dataset3]);
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
