<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Side Hustles Platform') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Side Hustles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/finance-tools">Finance Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hustles">Hustles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/resources">Resources</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </li>
                        <form id="logout-form" action="/logout" method="POST" class="d-none">@csrf</form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Welcome to Side Hustles Platform</h1>
                <p class="lead mb-5">Personal Finance Tools, Side Hustles, Free Resources, and Blog</p>
            </div>
        </div>

        <section class="row mb-5">
            <div class="col-12">
                <h2 class="h4 mb-4">Featured Side Hustles</h2>
                <!-- Dynamic content from HomeController -->
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-12">
                <h2 class="h4 mb-4">Finance Tools</h2>
                <!-- Dynamic content -->
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-12">
                <h2 class="h4 mb-4">Recent Blog Posts</h2>
                <!-- Dynamic content -->
            </div>
        </section>

        <section class="row">
            <div class="col-12">
                <h2 class="h4 mb-4">Popular Resources</h2>
                <!-- Dynamic content -->
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 Side Hustles Platform. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

