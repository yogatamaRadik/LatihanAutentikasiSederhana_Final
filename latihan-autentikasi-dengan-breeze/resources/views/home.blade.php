<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beranda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-box {
            background: #ffffff;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 14px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
            opacity: 0.95;
        }

        .links a {
            margin: 0 12px;
            font-weight: 600;
            color: #0d6efd;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtext {
            font-size: 15px;
            color: #6c757d;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

    <div class="card-box">

        <!-- LOGO LARAVEL -->
        <img
            src="https://laravel.com/img/logomark.min.svg"
            alt="Laravel Logo"
            class="logo"
        >

        <h1>Selamat Datang</h1>
        <p class="subtext">Aplikasi sederhana untuk latihan autentikasi, profil, dan dashboard.</p>

        <div class="links">

            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @endauth

        </div>
    </div>

</body>
</html>
