<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Content/Images/Logo_ASTRAtech.png') }}">
    <link rel="stylesheet" href="{{ asset('Content/Plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Content/Plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Content/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('Content/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Content/Styles/Style.css') }}">
    <script src="{{ asset('Content/Scripts/tether/tether.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/jquery-ui-1.12.1.min.js') }}"></script>
    <script src="{{ asset('Content/Plugins/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('Content/Scripts/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('Content/Scripts/bootstrap-select.min.js') }}"></script>
</head>
<body style="background-image:url('{{ asset('/Content/Images/IMG_Background.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="polman-nav-static-top" style="opacity: 0.9;">
        <div class="float-left">
            <a href="/">
                <img src="{{ asset('/Content/Images/IMG_1687.png') }}" style="height: 50px;" />
            </a>
        </div>
    </div>
    @yield('content')
    <div class="mb-5"></div>

    <div class="mt-5" style="background-color: white; width: 100%; position: fixed; left: 0; bottom: 0;">
        <div class="container-fluid">
            <footer class="d-flex flex-wrap pt-3 pb-3 border-top">
                Copyright &copy; {{ date('Y') }} - Kelompok 5 MI 2D
            </footer>
        </div>
    </div>
    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/site.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
