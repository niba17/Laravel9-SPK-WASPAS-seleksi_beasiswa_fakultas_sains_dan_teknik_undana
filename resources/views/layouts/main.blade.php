<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title')</title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front') }}/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3"> --}}

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/landing') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/landing') }}/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/landing') }}/assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/landing') }}/assets/css/owl-carousel.css">

    <!-- Leaflet JS -->
    <link rel="stylesheet" href="{{ asset('/plugin') }}/leaflet180/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <script src="{{ asset('/plugin') }}/leaflet180/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- Jquery JS -->
    <script type="text/javascript" src="{{ asset('/library') }}/jquery361.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('/plugin') }}/fontawesomeFree620/css/all.min.css">
</head>

<body>

    <div class="container-fluid p-0">
        @yield('content')
    </div>

    <!-- Javascript Bundle with Popper -->
    <script src="{{ asset('front') }}/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- jQuery -->
    <script src="{{ asset('/landing') }}/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('/landing') }}/assets/js/popper.js"></script>
    <script src="{{ asset('/landing') }}/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('/landing') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('/landing') }}/assets/js/scrollreveal.min.js"></script>
    <script src="{{ asset('/landing') }}/assets/js/waypoints.min.js"></script>
    <script src="{{ asset('/landing') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('/landing') }}/assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="{{ asset('/landing') }}/assets/js/custom.js"></script>
</body>

</html>
