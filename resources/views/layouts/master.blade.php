<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/brands.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/regular.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/fontawesome.min.css')}}">
    <script src="{{ asset('theme/vendor/tinymce/tinymce.min.js')}}"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastify/src/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendor/datatable/datatables.min.css')}}">
</head>
<body class="bg-gray">
    @include('layouts.navbar') 
    @yield('content')
    <script src="{{ asset('theme/vendor/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('theme/vendor/fontawesome/js/brands.min.js')}}"></script>
    <script src="{{ asset('theme/vendor/fontawesome/js/regular.min.js')}}"></script>
    <script src="{{ asset('theme/vendor/fontawesome/js/fontawesome.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('theme/vendor/datatable/jquery.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatable/datatables.min.js') }}"></script>
    <script>
        let table = new DataTable('#table');
    </script>
</body>

</html>