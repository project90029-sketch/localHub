<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalHub - Your Local Marketplace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(to bottom right, #f8fafc, #dbeafe, #e0e7ff);
            min-height: 100vh;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: all 0.5s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotate(12deg);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
        }

        .logo-icon svg {
            width: 24px;
            height: 24px;
            color: white;
            transform: rotate(-12deg);
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            color: #1e293b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #4f46e5;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.625rem 1.5rem;
            border-radius: 9999px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-login {
            color: #1e293b;
            background: transparent;
        }

        .btn-login:hover {
            color: #4f46e5;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 25px rgba(79, 70, 229, 0.4);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            padding-top: 8rem;
            padding-bottom: 5rem;
            padding-left: 2rem;
            padding-right: 2rem;
            position: relative;
            overflow: hidden;
        }

        .blob-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: 0;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            mix-blend-mode: multiply;
            filter: blur(64px);
            opacity: 0.3;
            animation: blob 7s infinite;
        }

        .blob-1 {
            top: 5rem;
            right: 2.5rem;
            width: 18rem;
            height: 18rem;
            background: #a78bfa;
            animation-delay: 0s;
        }

        .blob-2 {
            top: 10rem;
            left: 2.5rem;
            width: 18rem;
            height: 18rem;
            background: #818cf8;
            animation-delay: 2s;
        }

        .blob-3 {
            bottom: -2rem;
            left: 50%;
            width: 18rem;
            height: 18rem;
            background: #60a5fa;
            animation-delay: 4s;
        }

        @keyframes blob {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .badge svg {
            width: 16px;
            height: 16px;
            color: #4f46e5;
        }

        .badge-text {
            font-size: 0.875rem;
            font-weight: 700;
            color: #1e293b;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .title-dark {
            background: linear-gradient(135deg, #0f172a, #312e81, #581c87);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .title-gradient {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 1.25rem;
            color: #475569;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-large {
            padding: 1rem 2rem;
            font-size: 1.125rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline {
            background: white;
            color: #4f46e5;
            border: 2px solid #4f46e5;
        }

        .btn-outline:hover {
            background: #f1f5f9;
        }

        .hero-image {
            position: relative;
            height: 600px;
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-img {
            position: relative;
            z-index: 10;
            border-radius: 1.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .hero-img:hover {
            transform: scale(1.05);
        }

        .hero-img-decoration {
            position: absolute;
            bottom: -1.5rem;
            right: -1.5rem;
            width: 16rem;
            height: 16rem;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 1.5rem;
            z-index: -1;
            opacity: 0.2;
        }

        /* Features Section */
        .features {
            padding: 5rem 2rem;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(4px);
        }

        .features-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .section-description {
            font-size: 1.25rem;
            color: #475569;
            max-width: 40rem;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .feature-card {
            position: relative;
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            overflow: hidden;
            transition: all 0.3s;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #f59e0b, #ea580c);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature-card:nth-child(2)::before {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
        }

        .feature-card:nth-child(3)::before {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(6deg);
        }

        .feature-card:nth-child(1) .feature-icon {
            background: linear-gradient(135deg, #f59e0b, #ea580c);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .feature-card:nth-child(2) .feature-icon {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .feature-card:nth-child(3) .feature-icon {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.75rem;
        }

        .feature-description {
            color: #475569;
            line-height: 1.7;
        }

        .feature-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #4f46e5;
            font-weight: 600;
            margin-top: 1rem;
            transition: transform 0.3s;
        }

        .feature-card:hover .feature-link {
            transform: translateX(0.5rem);
        }

        /* Stats Section */
        .stats {
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s;
        }

        .stat-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: white;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            color: #c7d2fe;
            font-size: 1.125rem;
            font-weight: 600;
        }

        /* How It Works */
        .how-it-works {
            padding: 5rem 2rem;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(4px);
        }

        .steps-grid {
            max-width: 1400px;
            margin: 4rem auto 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
        }

        .step {
            position: relative;
        }

        .step-number {
            font-size: 6rem;
            font-weight: 900;
            color: #e0e7ff;
            position: absolute;
            top: -1.5rem;
            left: -1rem;
            z-index: 0;
        }

        .step-content {
            position: relative;
            z-index: 1;
            padding-top: 2rem;
        }

        .step-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.75rem;
        }

        .step-description {
            color: #475569;
            font-size: 1.125rem;
            line-height: 1.7;
        }

        /* CTA Section */
        .cta {
            padding: 5rem 2rem;
        }

        .cta-container {
            max-width: 64rem;
            margin: 0 auto;
            text-align: center;
        }

        .cta-box {
            background: linear-gradient(135deg, #0f172a, #312e81);
            border-radius: 1.5rem;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .cta-box::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.2), rgba(124, 58, 237, 0.2));
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta-title {
            font-size: 3rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1.5rem;
        }

        .cta-description {
            font-size: 1.25rem;
            color: #c7d2fe;
            margin-bottom: 2rem;
            max-width: 36rem;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-white {
            background: white;
            color: #4f46e5;
        }

        .btn-white:hover {
            background: #f8fafc;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 3rem 2rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .footer-brand p {
            color: #94a3b8;
        }

        .footer-section h4 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #1e293b;
            padding-top: 2rem;
            text-align: center;
            color: #64748b;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .mobile-menu-toggle span {
            display: block;
            width: 25px;
            height: 3px;
            background: #1e293b;
            margin: 5px 0;
            transition: 0.3s;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-image {
                height: 400px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="logo-container">
                <div class="logo-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="logo-text">LocalHub</span>
            </a>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="#about">About</a></li>
            </ul>
            <div class="nav-buttons">
                <a href="#login" class="btn btn-login">Login</a>
                <a href="#signup" class="btn btn-primary">Get Started</a>
            </div>
            <button class="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="blob-container">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <div class="badge">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <span class="badge-text">Your Local Marketplace</span>
                </div>
                <h1 class="hero-title">
                    <span class="title-dark">Connect with</span><br>
                    <span class="title-gradient">Your Community</span>
                </h1>
                <p class="hero-description">
                    Discover local news, shop from nearby businesses, and grow your enterprise—all in one vibrant marketplace tailored to your neighborhood.
                </p>
                <div class="hero-buttons">
                    <a href="#signup" class="btn btn-primary btn-large">
                        <span>Start Exploring</span>
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#business" class="btn btn-outline btn-large">
                        List Your Business
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=600&fit=crop" 
                     alt="Local marketplace" 
                     class="hero-img">
                <div class="hero-img-decoration"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="features-container">
            <div class="section-header">
                <h2 class="section-title">Everything Your Community Needs</h2>
                <p class="section-description">
                    A comprehensive platform designed to bring your neighborhood together
                </p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📰</div>
                    <h3 class="feature-title">Local News Feed</h3>
                    <p class="feature-description">
                        Stay updated with what's happening in your neighborhood
                    </p>
                    <a href="#" class="feature-link">
                        Learn more
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛍️</div>
                    <h3 class="feature-title">Buy Local Products</h3>
                    <p class="feature-description">
                        Discover and purchase products from nearby sellers
                    </p>
                    <a href="#" class="feature-link">
                        Learn more
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏪</div>
                    <h3 class="feature-title">List Your Business</h3>
                    <p class="feature-description">
                        Showcase your products and services to the community
                    </p>
                    <a href="#" class="feature-link">
                        Learn more
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats" id="stats">
        <div class="stats-container">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number" data-target="10000">0</span>
                    <span class="stat-label">Active Users</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="500">0</span>
                    <span class="stat-label">Local Businesses</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="5000">0</span>
                    <span class="stat-label">Products Listed</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="25">0</span>
                    <span class="stat-label">Cities Covered</span>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works" id="how-it-works">
        <div class="features-container">
            <div class="section-header">
                <h2 class="section-title">Get Started in 3 Simple Steps</h2>
            </div>
            <div class="steps-grid">
                <div class="step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h3 class="step-title">Create Your Account</h3>
                        <p class="step-description">
                            Sign up in seconds and set your location
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h3 class="step-title">Explore & Connect</h3>
                        <p class="step-description">
                            Browse local news, products, and services
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h3 class="step-title">Shop or Sell</h3>
                        <p class="step-description">
                            Buy what you need or list your own offerings
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <div class="cta-box">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Join Your Local Community?</h2>
                    <p class="cta-description">
                        Start discovering, shopping, and connecting with your neighbors today.
                    </p>
                    <div class="cta-buttons">
                        <a href="#signup" class="btn btn-white btn-large">
                            Create Free Account
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>LocalHub</h3>
                    <p>Connecting communities, one neighborhood at a time.</p>
                </div>
                <div class="footer-section">
                    <h4>Product</h4>
                    <ul class="footer-links">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">For Business</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul class="footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul class="footer-links">
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 LocalHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Stats counter animation
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const stats = entry.target.querySelectorAll('.stat-item');
                    stats.forEach((stat, index) => {
                        setTimeout(() => {
                            stat.classList.add('visible');
                            const numberElement = stat.querySelector('.stat-number');
                            const target = parseInt(numberElement.getAttribute('data-target'));
                            animateCounter(numberElement, target);
                        }, index * 100);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 60;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString() + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 30);
        }
    </script>
</body>
</html>
