<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artemis Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Artemis Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Artemis Portal</h1>
            <p class="lead">The cutting-edge Automated Real-Time Tardiness Monitoring System</p>
        </div>
    </header>
    
    <section class="container my-5">
        <div class="row">
            <div class="col-md-12 text-justify">
                <h2 class="text-center">Revolutionizing Attendance Tracking</h2>
                <p class="text-center">Say goodbye to manual logs and outdated monitoring methods! <strong>Artemis Portal</strong> revolutionizes how tardiness is recorded, utilizing <strong>Laravel, Python, MySQL, and PHP</strong> to <strong>automatically track late entries, evaluate punctuality trends, and notify faculty and administrators in real time</strong>.</p>
                <p class="text-center">Whether you're a student, teacher, or school administrator, <strong>Artemis keeps you connected</strong>—ensuring transparency, accountability, and smarter attendance management.</p>
                <p class="text-center">Join us in embracing the future of attendance tracking—fast, reliable, and fully automated.</p>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>