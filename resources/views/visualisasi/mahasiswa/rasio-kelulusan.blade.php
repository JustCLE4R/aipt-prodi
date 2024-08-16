@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Rasio Kelulusan {{ $jenjang }}</span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead id="dataTableHeader">

                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-1" height="220vh"></canvas>
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
        var status = "{{ $jenjang }}";
        var apiUrlRatioLulus = '';
    
        if (status === 'S1') {
            apiUrlRatioLulus = '/api/visualisasi/rasioLulus/A2:I9';
        } else if (status === 'S2') {
            apiUrlRatioLulus = '/api/visualisasi/rasioLulus/K2:P6';
        } else if (status === 'S3') {
            apiUrlRatioLulus = '/api/visualisasi/rasioLulus/A12:I19';
        } else {
            console.error('Status tidak valid');
            return;
        }
    
        $.ajax({
            url: apiUrlRatioLulus,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                renderTable(data);
                if (status === 'S1') {
                    renderChart('chart-1', 'bar', extractData(data, 3, 4));
                } else if (status === 'S2') {
                    renderChart('chart-1', 'bar', extractData(data, 2, 3));
                } else if (status === 'S3') {
                    renderChart('chart-1', 'bar', extractData(data, 4, 6));
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    
        function renderTable(data) {
            var keys = Object.keys(data[0]);
            var tableHeader = '<tr>';
            $.each(keys, function(index, key) {
                tableHeader += '<th scope="col">' + key + '</th>';
            });
            tableHeader += '</tr>';
            $('#dataTableHeader').append(tableHeader);
    
            $.each(data, function(index, entry) {
                var tableRow = '<tr>';
                $.each(keys, function(index, key) {
                    tableRow += '<td>' + entry[key] + '</td>';
                });
                tableRow += '</tr>';
                $('#dataTableBody').append(tableRow);
            });
        }

        function renderChart(canvasId, type, datasets) {
            const config = {
                type: type,
                data: {
                    labels: ['Kelulusan Tepat Waktu', 'Keberhasilan Studi'],
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
    
        function extractData(data, locKeberhasilan1, locKeberhasilan2) {
            let keys = Object.keys(data[0]);

            let tepatWaktu1 = data[0][keys[1]];
            let tepatWaktu2 = data[0][keys[keys.length - 1]];
            let rasioTepatWaktu = ((tepatWaktu2/tepatWaktu1) * 100).toFixed(2);
            
            let keberhasilanStudi1 = data[locKeberhasilan1][keys[locKeberhasilan2]];
            let keberhasilanStudi2 = data[locKeberhasilan1][keys[keys.length - 1]];
            let rasioKeberhasilanStudi = ((keberhasilanStudi2/keberhasilanStudi1) * 100).toFixed(2);

            return [
                        {
                            label: 'Rasio Kelulusan ' + status,
                            data: [parseFloat(rasioTepatWaktu), parseFloat(rasioKeberhasilanStudi)],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ] 
        }
    });
    </script>
@endsection