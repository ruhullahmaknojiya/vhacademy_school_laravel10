<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VHM Academy</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">VHM Academy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <ul class="ml-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="signin.html">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.html">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mt-5">
        <div class="row">
            <div class="text-center col-md-12">
                <img src="{{ asset('images/logo.png') }}" alt="Welcome Image" class="img-fluid">
                <h2 class="mt-4">Success is no accident</h2>
                <p>It is hard work, perseverance, learning, studying, sacrifice and most of all, love of what you are doing or learning to do.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5 footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-muted">© 2024 VHM Academy. All rights reserved.</p>
                </div>
                <div class="text-right col-md-6">
                    <p class="text-muted">Contact Information: +1012345678910 | info@solutionsbricks.com</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
