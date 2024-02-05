<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MPB2J6QQ');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>
        MI Self - @yield('title')
    </title>
    <link rel="shortcut icon" href="{{ asset('favicon.png?v=20230623') }}" />
    <link href="{{ asset('plugins/MDB-Pro_4.14.1/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/MDB-Pro_4.14.1/css/mdb.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/fontawesome-free-5.11.2-web/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/fontawesome-free-5.11.2-web/css/solid.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/fontawesome-free-5.11.2-web/css/regular.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/fontawesome-free-5.11.2-web/css/brands.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('content/themes/base/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('styles/Style.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet" />
    
    <script src="{{ asset('scripts/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('scripts/jquery-ui-1.13.2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('plugins/MDB-Pro_4.14.1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/MDB-Pro_4.14.1/js/mdb.min.js') }}"></script>
    <script src="{{ asset('plugins/Highcharts-7.2.1/code/highcharts.js') }}"></script>
    <script src="{{ asset('plugins/Highcharts-7.2.1/code/highcharts-more.js') }}"></script>
    <script src="//code.tidio.co/magv0uprt7k6dju3bbazrdhmbbcvo45a.js" async></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
        function sentValidation(input) {
            $(input).addClass('disabled');
            $(input).text('Mohon tunggu..');
        }

        $(function () {
            $(".datepicker").pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                today: 'Hari Ini',
                clear: '',
                close: 'Tutup',
                labelMonthNext: 'Bulan berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Pilih bulan',
                labelYearSelect: 'Pilih tahun',
                format: 'yyyy-mm-dd',
                closeOnSelect: false,
                closeOnClear: false,
                selectYears: 50,
                max: new Date()
            });
        });
    </script>
</head>

<body>
@include('template_aboutme')

@yield('contents')

    <!-- Script dan link JS umum disini -->
    <script src="{{ asset('scripts/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('scripts/jquery-ui-1.13.2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('plugins/MDB-Pro_4.14.1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/MDB-Pro_4.14.1/js/mdb.min.js') }}"></script>
    <script src="{{ asset('plugins/Highcharts-7.2.1/code/highcharts.js') }}"></script>
    <script src="{{ asset('plugins/Highcharts-7.2.1/code/highcharts-more.js') }}"></script>
    <script src="//code.tidio.co/magv0uprt7k6dju3bbazrdhmbbcvo45a.js" async></script>

    @stack('scripts')
</body>
</html>
