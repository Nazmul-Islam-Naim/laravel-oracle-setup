<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Team Builder')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Manage Your Team</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('teams.index')}}">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('team-members.index')}}">Team Members</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center mt-4 py-3">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Oracle Laravel. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
