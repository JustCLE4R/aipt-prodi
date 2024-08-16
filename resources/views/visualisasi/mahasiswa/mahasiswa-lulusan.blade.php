@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Lulusan {{ $jenjang }}</span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Jumlah Jumlah Lulusan</th>
                                <th scope="col">Rata-rata IPK Lulusan</th>
                                <th scope="col">Rata-Rata Masa Studi Lulusan (Tahun)</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-1"></canvas>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-2"></canvas>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-3"></canvas>
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
            var status = "{{ $jenjang }}"

            if (status === 'S1') {
                apiUrl = '/api/visualisasi/MhsLulus/A2:D5';
            } else if (status === 'S2') {
                apiUrl = '/api/visualisasi/MhsLulus/F2:I5';
            } else if (status === 'S3') {
                apiUrl = '/api/visualisasi/MhsLulus/A8:D11';
            } else if (status === 'Profesi') {
                apiUrl = '/api/visualisasi/MhsLulus/F8:I11';
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
                        row.append('<td>' + entry['Tahun'] + '</td>');
                        row.append('<td>' + entry['Jumlah Lulusan'] + '</td>');
                        row.append('<td>' + entry['Rata-Rata IPK Lulusan'] +
                            '</td>');
                        row.append('<td>' + entry['Rata-Rata Masa Studi Lulusan (Tahun)'] +
                            '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = data.map(entry => entry.Tahun);
                    const dataset1 = {
                        label: 'Jumlah Lulusan',
                        data: data.map(entry => entry['Jumlah Lulusan']),
                        backgroundColor: 'rgba(11, 169, 9, 0.2)',
                        borderColor: 'rgb(11, 169, 9)',
                        borderWidth: 1,
                        tension: 0.4
                    };
                    const dataset2 = {
                        label: 'Rata-Rata IPK Lulusan',
                        data: data.map(entry => entry['Rata-Rata IPK Lulusan']),
                        backgroundColor: 'rgba(11, 69, 169, 0.2)',
                        borderColor: 'rgb(11, 69, 169)',
                        borderWidth: 1,
                        tension: 0.4
                    };
                    const dataset3 = {
                        label: 'Rata-Rata Masa Studi Lulusan (Tahun)',
                        data: data.map(entry => entry['Rata-Rata Masa Studi Lulusan (Tahun)']),
                        backgroundColor: 'rgba(11, 69, 169, 0.2)',
                        borderColor: 'rgb(11, 69, 169)',
                        borderWidth: 1,
                        tension: 0.4
                    };

                    renderChart('chart-1', 'line', labels, [dataset1]);
                    renderChart('chart-2', 'line', labels, [dataset2]);
                    renderChart('chart-3', 'line', labels, [dataset3]);

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
