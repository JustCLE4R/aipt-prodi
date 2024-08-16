@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Baru {{ $jenjang }}</span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jumlah Lulus Seleksi</th>
                                <th scope="col">Jumlah Mahasisawa Baru</th>
                                <th scope="col">Jumlah Mahasiswa Baru (Transfer)</th>
                                <th scope="col">Lulus Seleksi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-1"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-2"></canvas>
                </div>
                <div class="col-lg-12 my-4 col-md-12 col-sm-12 col-xs-12  wow fadeInUp my-2 " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-3"></canvas>
                </div>
                <div class="col-lg-12 my-4 col-md-12 col-sm-12 col-xs-12  wow fadeInUp my-2 " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-4"></canvas>
                </div>
                <div class="col-lg-12 my-4 col-md-12 col-sm-12 col-xs-12  wow fadeInUp my-2 " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-5"></canvas>
                </div>
                <div class="col-lg-12 my-4 col-md-12 col-sm-12 col-xs-12  wow fadeInUp my-2 " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-6"></canvas>
                </div>
                <div class="col-lg-12 my-4 col-md-12 col-sm-12 col-xs-12  wow fadeInUp my-2 " data-wow-delay="0.3s">
                    <canvas class="border" id="chart-7"></canvas>
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
                apiUrl = '/api/visualisasi/MhsBaru/A2:M7';
            } else if (status === 'S2') {
                apiUrl = '/api/visualisasi/MhsBaru/O2:AA7';
            } else if (status === 'S3') {
                apiUrl = '/api/visualisasi/MhsBaru/A10:M15';
            } else if (status === 'Profesi') {
                apiUrl = '/api/visualisasi/MhsBaru/O10:AA15';
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
                        row.append('<td>' + entry['Jumlah Lulus Seleksi'] + '</td>');
                        row.append('<td>' + entry['Jumlah Mahasiswa Baru'] + '</td>');
                        row.append('<td>' + entry['Jumlah Mahasiswa Baru (Transfer)'] +
                            '</td>');
                        row.append('<td>' + entry['Jumlah Lulus Seleksi'] + '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = data.map(entry => entry.Tahun);
                    const dataset1 = {
                        label: 'Jumlah Mahasiswa Baru',
                        data: data.map(entry => entry['Jumlah Mahasiswa Baru']),
                        backgroundColor: 'rgba(11, 169, 9, 0.2)',
                        borderColor: 'rgb(11, 169, 9)',
                        borderWidth: 1,
                        tension: 0.4
                    };
                    const dataset2 = {
                        label: 'Jumlah Mahasiswa Baru (Transfer)',
                        data: data.map(entry => entry['Jumlah Mahasiswa Baru (Transfer)']),
                        backgroundColor: 'rgba(11, 69, 169, 0.2)',
                        borderColor: 'rgb(11, 69, 169)',
                        borderWidth: 1,
                        tension: 0.4
                    };

                    const labels3 = Object.keys(data[0]).filter(key => key !== 'Tahun' && key !==
                        'Jumlah Lulus Seleksi' && key !== 'Jumlah Mahasiswa Baru' && key !==
                        'Jumlah Mahasiswa Baru (Transfer)');

                    for (let i = 0; i < data.length; i++) {
                        const yearDataset = {
                            label: 'Jumlah Mahasiswa Baru / Fakultas Tahun ' + (2018 + i),
                            data: [
                                data[i]['Fakultas Dakwah dan Komunikasi'],
                                data[i]['Fakultas Ekonomi dan Bisnis Islam'],
                                data[i]['Fakultas Syariah dan Hukum'],
                                data[i]['Fakultas Ilmu Tarbiyah dan Keguruan'],
                                data[i]['Fakultas Ushuluddin dan Studi Islam'],
                                data[i]['Fakultas Sains dan Teknologi'],
                                data[i]['Fakultas Ilmu Sosial'],
                                data[i]['Fakultas Kesehatan Masyarakat'],
                                data[i]['Pascasarjana']
                            ],
                            backgroundColor: [
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)'
                            ],

                            borderColor: [
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)',
                                'rgba(11, 169, 9, 0.2)'
                            ],
                            borderWidth: 1
                        };
                        renderChart2('chart-' + (i + 3), labels3, yearDataset);
                    }

                    renderChart('chart-1', 'line', labels, [dataset1]);
                    renderChart('chart-2', 'line', labels, [dataset2]);

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
                    }
                };
                var myChart = new Chart(document.getElementById(canvasId), config);
            }

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
