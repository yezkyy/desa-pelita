<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Desa Pelita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: #ffffff;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .nav-link {
            transition: color 0.3s ease;
            font-weight: 400;
            text-align: center;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .navbar-nav {
            margin-left: auto;
        }
        .nav-item {
            display: flex;
            align-items: center;
        }
        .nav-link-admin {
            color: #ff0000; /* Warna teks berbeda untuk Admin */
        }
        .btn-login, .btn-logout {
            background-color: #007bff;
            color: #ffffff;
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover, .btn-logout:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Desa Pelita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wisata">Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kuliner">Kuliner</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link nav-link-admin" href="{{ route('admin.index') }}">Admin</a>
                        </li>
                    @endif
                </ul>
                @if (Auth::check())
                    <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                        @csrf
                        <button type="submit" class="btn btn-logout ms-3">Logout</button>
                    </form>
                @else
                    <a class="nav-link btn btn-login ms-auto" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <main style="padding-top: 70px;">
        @yield('content')
    </main>

    <footer class="footer text-center py-4 mt-5">
        <div class="container">
            <p class="text-muted mb-0">© 2024 Desa Pelita. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>