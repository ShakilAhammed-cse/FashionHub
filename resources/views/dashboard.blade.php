<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FashionHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
        }
        .navbar-custom a {
            color: white !important;
            font-weight: 500;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
        .user-info {
            padding: 2rem;
        }
        .info-item {
            margin-bottom: 1.5rem;
        }
        .info-label {
            font-weight: 600;
            color: #667eea;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-value {
            font-size: 1.1rem;
            color: #333;
            margin-top: 0.3rem;
        }
        .btn-logout {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="/">FashionHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-logout">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Welcome, {{ Auth::user()->name }}! 👋</h4>
                    </div>
                    <div class="card-body user-info">
                        <p class="text-muted">You're successfully logged in to FashionHub!</p>

                        <div class="info-item">
                            <div class="info-label">Full Name</div>
                            <div class="info-value">{{ Auth::user()->name }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Phone</div>
                            <div class="info-value">{{ Auth::user()->phone }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Member Since</div>
                            <div class="info-value">{{ Auth::user()->created_at->format('F j, Y') }}</div>
                        </div>

                        <hr>

                        <div class="text-center mt-4">
                            <a href="/" class="btn btn-logout">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
