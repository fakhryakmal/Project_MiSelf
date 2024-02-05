<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI-SELF</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('Content/Images/Logo_ASTRAtech.png') }}" rel="icon">
    <link href="{{ asset('Content/Plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Content/Plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Content/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('Content/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Content/Styles/Style.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="{{ asset('Content/Scripts/tether/tether.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/jquery-ui-1.12.1.min.js') }}"></script>
    <script src="{{ asset('Content/Plugins/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('Content/Scripts/bootstrap-select.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@@popperjs/core@2.5.3/dist/und/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

    <style>
        .mce-branding-powered-by {
            display: none;
        }

        table {
            border-top: none;
            border-bottom: none;
            background-color: #FFF;
            white-space: nowrap;
        }

        .table-striped tbody tr:nth-of-type(2n+1) {
            background-color: #FFF;
        }

        .table-striped tbody tr:nth-of-type(2n), thead {
            background-color: #ECECEC;
        }

        .table-striped tbody tr.pagination-ys {
            background-color: #FFF;
        }
    </style>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

</head>
<body>
    @include('template_prodi')

    @yield('contents')

</body>
</html>
