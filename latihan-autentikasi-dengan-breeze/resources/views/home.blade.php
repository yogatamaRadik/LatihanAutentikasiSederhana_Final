<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
        }
        .home-card {
            max-width: 620px;
            border-radius: 14px;
        }
        .logo {
            width: 90px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="card shadow home-card p-5 text-center">

        <!-- LOGO DI TENGAH -->
        <div class="d-flex justify-content-center mb-3">
            <img src="https://laravel.com/img/logomark.min.svg" 
                 alt="Laravel Logo" 
                 class="logo">
        </div>

        <h1 class="fw-bold mb-2">Welcome</h1>

        <p class="text-muted mb-4">
            A simple application for practicing authentication, profile management, and dashboard usage.
        </p>

        <div class="d-flex justify-content-center gap-3">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary px-4">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary px-4">Register</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-success px-4">Go to Dashboard</a>
            @endauth
        </div>

    </div>

</body>
</html>
