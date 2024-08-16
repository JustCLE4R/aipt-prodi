@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Asing</span>
                    </div>
                </div>

                <div id="container" class="row"></div>
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
            let apiUrl = '/api/visualisasi/lainnya/A2:K5';
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, entry) {
                        let tableDiv = $('<div>');
                        tableDiv.addClass(
                            'col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp');
                        tableDiv.attr('data-wow-delay', '0.3s');
                        tableDiv.attr('id', 'table-' + index);

                        let title = $('<h5>');
                        title.text(' Jumlah Mahasiswa Asing Tahun ' + entry.Tahun);
                        tableDiv.append(title);

                        let table = $('<table>');
                        table.addClass('table table-striped table-hover border');

                        let thead = $('<thead>');
                        let headerRow = $('<tr>');
                        headerRow.append('<th scope="col">Fakultas</th>');
                        headerRow.append('<th scope="col">Jumlah Mahasiswa Asing</th>');
                        thead.append(headerRow);

                        let tbody = $('<tbody>');

                        $.each(entry, function(key, value) {
                            if (key !== 'Tahun' && key !== 'Total') {
                                let row = $('<tr>');
                                row.append('<td>' + key + '</td>');
                                row.append('<td>' + value + '</td>');
                                tbody.append(row);
                            }
                        });

                        table.append(thead);
                        table.append(tbody);

                        tableDiv.append(table);

                        $('#container').append(tableDiv);

                        let chartDiv = $('<div>');
                        chartDiv.addClass(
                            'col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 wow fadeInUp');
                        chartDiv.attr('data-wow-delay', '0.3s');
                        chartDiv.attr('id', 'chart-' + index);

                        let canvas = $('<canvas>');
                        canvas.addClass('border');
                        canvas.attr('id', 'canvas-' + index);
                        canvas.attr('height', '260vh');
                        chartDiv.append(canvas);

                        $('#container').append(chartDiv);

                        let ctx = document.getElementById('canvas-' + index).getContext('2d');
                        let myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: Object.keys(entry).filter(key => key !==
                                    'Tahun' && key !== 'Total'),
                                datasets: [{
                                    label: 'Jumlah Mahasiswa Asing Tahun ' +
                                        entry['Tahun'],
                                    data: Object.values(entry).filter(value =>
                                        value !== entry['Tahun'] &&
                                        value !== entry['Total']),
                                    backgroundColor: 'rgba(11, 169, 9, 0.2)',
                                    borderColor: 'rgba(11, 169, 9, 0.2)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                indexAxis: 'y',
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>
@endsection
