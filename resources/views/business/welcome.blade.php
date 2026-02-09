<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B2B Community Sharing Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .btn-cta {
            background: white;
            color: #667eea;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-handshake"></i> B2B Community
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/b2b-login">Login</a>
                <a class="nav-link" href="/b2b-register">Register</a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero text-center">
        <div class="container">
            <h1 class="display-4 mb-4">Welcome to B2B Community Sharing</h1>
            <p class="lead mb-4">Connect, Share & Grow with Businesses Worldwide</p>
            <a href="/b2b-register" class="btn btn-cta">Join Free Today</a>
        </div>
    </section>
    
    <!-- Features -->
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="fas fa-network-wired fa-3x text-primary mb-3"></i>
                <h4>Business Networking</h4>
                <p>Connect with verified businesses</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-exchange-alt fa-3x text-success mb-3"></i>
                <h4>Resource Sharing</h4>
                <p>Share and find business resources</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-chart-line fa-3x text-info mb-3"></i>
                <h4>Growth Tools</h4>
                <p>Tools to help your business grow</p>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 B2B Community Sharing Platform</p>
    </footer>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>