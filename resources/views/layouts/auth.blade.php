<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentification</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ $parametres?->photo ? asset('uploads/' . $parametres->photo) : asset('uploads/default.png') }}"
        type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

    <style>
        body.auth-body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* centre vertical */
            justify-content: center;
            /* centre horizontal */
            background: linear-gradient(135deg, #1d3557, #457b9d, #a8dadc);
            font-family: 'Montserrat', sans-serif;
            margin: 0;
        }
    </style>
</head>

<body class="auth-body">

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>

</html>