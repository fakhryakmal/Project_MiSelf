@extends('layouts.layoutMahasiswa')

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
    // Data untuk diagram batang (diganti dengan data dari jenis konseling)
    var data = google.visualization.arrayToDataTable([
        ['Jenis Konseling', 'Jumlah', { role: 'style' }],
        ['Konseling Akademik', {{ min($jumlahKonselingAkademikmhs, 20) }}, 'color: blue'],
        ['Konseling Non-Akademik', {{ min($jumlahKonselingNonAkademikmhs, 20) }}, 'color: green'],
    ]);

    var options = {
        hAxis: {title: 'Ringkasan Konseling', titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0, maxValue: 20}, // Nilai maksimum dan minimum
        series: {
            0: { color: 'blue' }, // Warna untuk Konseling Akademik
            1: { color: 'green' } // Warna untuk Konseling Non-Akademik
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
    chart.draw(data, options);
}



</script>
@endsection
