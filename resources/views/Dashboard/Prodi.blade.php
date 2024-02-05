@extends('layouts.layoutProdi')

@section('title', 'Data Prodi')

@section('contents')
    <section class="section" style="border-bottom: 1px solid #ccc;">
        <h6><span style="color: blue;">MI-SELF</span> / Dashboard</h6>
    </section>
    <br/>

    <!-- Elemen untuk menampilkan diagram batang -->
    <div id="barChart" style="width: 100%; height: 300px;"></div>

   <!-- Skrip untuk membuat diagram batang -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" defer></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        });

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Kategori', 'Jumlah', { role: 'style' }],
                ['Diajukan', {{ min($diajukanprd, 20) }}, 'color: red'],
                ['Dikonfirmasi', {{ min($dikonfirmasiprd, 20) }}, 'color: orange'],
                ['Terjadwal', {{ min($terjadwalprd, 20) }}, 'color: yellow'],
                ['Pelaksanaan', {{ min($pelaksanaanprd, 20) }}, 'color: green'],
                ['Tunggu Hasil', {{ min($tungguhasilprd, 20) }}, 'color: blue'],
                ['Selesai', {{ min($selesaiprd, 20) }}, 'color: purple'],
            ]);

            var options = {
                hAxis: {title: 'Ringkasan Konseling', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0, maxValue: 20, gridlines: {count: 5}},
                series: {
                    0: { color: 'red' },
                    1: { color: 'orange' },
                    2: { color: 'yellow' },
                    3: { color: 'green' },
                    4: { color: 'blue' },
                    5: { color: 'purple' },
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
            chart.draw(data, options);
        }
    </script>
@endsection
