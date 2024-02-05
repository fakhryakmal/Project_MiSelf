@extends('layouts.layoutDKA')

@section('title', 'Data Prodi')

@section('contents')
    <section class="section" style="border-bottom: 1px solid #ccc;">
        <h6><span style="color: blue;">MI-SELF</span> / Dashboard</h6>
    </section>
    <br/>

    <!-- Elemen untuk menampilkan diagram batang pertama -->
    <section class="section" style="border-bottom: 1px solid #ccc;">
    <br />
        <h6>Jenis Konseling</h6>
        <div id="barChart1" style="width: 100%; height: 300px;"></div>
    </section>

    <!-- Elemen untuk menampilkan diagram batang kedua -->
    <section class="section" style="border-bottom: 1px solid #ccc;">
    <br />
        <h6>Pelaksanaan Konseling</h6>
        <div id="barChart2" style="width: 100%; height: 300px;"></div>
    </section>

    <!-- Elemen untuk menampilkan diagram batang ketiga -->
    <section class="section">
    <br />
        <h6>Pengajuan Konseling</h6>
        <div id="barChart3" style="width: 100%; height: 300px;"></div>
    </section>

    <!-- Skrip untuk membuat diagram batang -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" defer></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawCharts);
        });

        function drawCharts() {
            drawChart1();
            drawChart2();
            drawChart3();
        }

        function drawChart1() {
            var data1 = google.visualization.arrayToDataTable([
                ['Jenis Konseling', 'Jumlah', { role: 'style' }],
                ['Konseling Akademik', {{ min($jumlahKonselingAkademik, 20) }}, 'color: blue'],
                ['Konseling Non-Akademik', {{ min($jumlahKonselingNonAkademik, 20) }}, 'color: green'],
            ]);

            var options1 = {
                hAxis: {title: '', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0, maxValue: 20, gridlines: {count: 5}},
                series: {
                    0: { color: 'blue' },
                    1: { color: 'green' }
                }
            };

            var chart1 = new google.visualization.ColumnChart(document.getElementById('barChart1'));
            chart1.draw(data1, options1);
        }

        function drawChart2() {
            var data2 = google.visualization.arrayToDataTable([
                ['Kategori', 'Jumlah', { role: 'style' }],
                ['Diajukan', {{ min($diajukan, 20) }}, 'color: red'],
                ['Dikonfirmasi', {{ min($dikonfirmasi, 20) }}, 'color: orange'],
                ['Terjadwal', {{ min($terjadwal, 20) }}, 'color: yellow'],
                ['Pelaksanaan', {{ min($pelaksanaan, 20) }}, 'color: green'],
                ['Tunggu Hasil', {{ min($tungguhasil, 20) }}, 'color: blue'],
                ['Selesai', {{ min($selesai, 20) }}, 'color: purple'],
            ]);

            var options2 = {
                hAxis: {title: '', titleTextStyle: {color: '#333'}},
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

            var chart2 = new google.visualization.ColumnChart(document.getElementById('barChart2'));
            chart2.draw(data2, options2);
        }

        function drawChart3() {
            var data3 = google.visualization.arrayToDataTable([
                ['Kategori', 'Jumlah', { role: 'style' }],
                ['P4', 10, 'color: pink'],
                ['TPM', 15, 'color: cyan'],
                ['MI', 5, 'color: yellow'],
                ['MO', 8, 'color: orange'],
                ['MK', 12, 'color: blue'],
                ['TKBG', 18, 'color: green'],
                ['TRPAB', 7, 'color: purple'],
                ['TRL', 14, 'color: red'],
            ]);

            var options3 = {
                hAxis: { title: '', titleTextStyle: { color: '#333' } },
                vAxis: { minValue: 0, maxValue: 20, gridlines: { count: 5 } },
                series: {
                    0: { color: 'pink' },
                    1: { color: 'cyan' },
                    2: { color: 'yellow' },
                    3: { color: 'orange' },
                    4: { color: 'blue' },
                    5: { color: 'green' },
                    6: { color: 'purple' },
                    7: { color: 'red' },
                }
            };

            var chart3 = new google.visualization.ColumnChart(document.getElementById('barChart3'));
            chart3.draw(data3, options3);
        }

    </script>
@endsection
