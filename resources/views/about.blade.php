<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about Local Hub - Your community connection platform">
    <title>About - Local Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --dark-bg: #0f0f23;
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.3);
            --shadow-xl: 0 30px 80px rgba(0, 0, 0, 0.4);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Animated Background */
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .gradient-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 20s infinite ease-in-out;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            top: -10%;
            left: -10%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            top: 50%;
            right: -10%;
            animation-delay: 5s;
        }

        .orb-3 {
            width: 450px;
            height: 450px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            bottom: -10%;
            left: 30%;
            animation-delay: 10s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(50px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-30px, 30px) scale(0.9);
            }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(15, 15, 35, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--card-border);
            padding: 1.5rem 0;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            padding: 1rem 0;
            box-shadow: var(--shadow-lg);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.75rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--text-primary);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a.active {
            color: var(--text-primary);
        }

        .nav-links a.active::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            padding: 180px 2rem 120px;
            text-align: center;
            position: relative;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -2px;
            animation: fadeInUp 0.8s ease;
        }

        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.35rem;
            color: var(--text-secondary);
            max-width: 700px;
            margin: 0 auto 3rem;
            line-height: 1.8;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Main Content */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 120px;
        }

        /* Mission Section */
        .mission-section {
            margin-bottom: 120px;
        }

        .mission-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            padding: 4rem;
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-lg);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .mission-card:hover::before {
            transform: scaleX(1);
        }

        .mission-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .mission-card h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        .mission-card p {
            font-size: 1.15rem;
            color: var(--text-secondary);
            line-height: 1.9;
        }

        /* Features Grid */
        .features-section {
            margin-bottom: 120px;
        }

        .section-title {
            text-align: center;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            letter-spacing: -1.5px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 3rem;
            backdrop-filter: blur(20px);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .feature-card:hover::before {
            opacity: 0.05;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: transform 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }

        /* Stats Section */
        .stats-section {
            margin-bottom: 120px;
            padding: 5rem 0;
            position: relative;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            text-align: center;
        }

        .stat-item {
            animation: fadeInUp 0.8s ease backwards;
        }

        .stat-item:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-item:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-item:nth-child(4) {
            animation-delay: 0.4s;
        }

        .stat-number {
            font-size: 4rem;
            font-weight: 800;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Team Section */
        .team-section {
            margin-bottom: 120px;
        }

        .team-intro {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 4rem;
            color: var(--text-secondary);
            font-size: 1.15rem;
            line-height: 1.8;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            max-width: 1600px;
            margin: 0 auto;
        }

        .team-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            text-align: center;
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--secondary-gradient);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .team-card:hover::before {
            opacity: 0.08;
        }

        .team-card:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .team-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: var(--primary-gradient);
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.2rem;
            font-weight: 700;
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.4);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
            border: 4px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .team-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-name {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
            letter-spacing: -0.5px;
        }

        .team-role {
            color: var(--text-secondary);
            font-size: 1.05rem;
            margin-bottom: 1.25rem;
            position: relative;
            z-index: 1;
            font-weight: 500;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .team-bio {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.7;
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
            min-height: 60px;
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
            position: relative;
            z-index: 1;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--card-border);
        }

        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .social-link.linkedin:hover {
            background: linear-gradient(135deg, #0077b5 0%, #00a0dc 100%);
            border-color: #0077b5;
            color: white;
        }

        .social-link.github:hover {
            background: linear-gradient(135deg, #333 0%, #24292e 100%);
            border-color: #333;
            color: white;
        }

        /* LinkedIn and GitHub SVG Icons */
        .social-icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 6rem 2rem;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            opacity: 0.05;
        }

        .cta-section h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            letter-spacing: -1.5px;
            position: relative;
            z-index: 1;
        }

        .cta-section p {
            font-size: 1.25rem;
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }

        .cta-button {
            display: inline-block;
            padding: 1.2rem 3rem;
            background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.5);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 3rem 2rem;
            border-top: 1px solid var(--card-border);
            color: var(--text-muted);
        }

        footer p {
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2.25rem;
            }

            .nav-links {
                gap: 1.5rem;
            }

            .features-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }

            .mission-card {
                padding: 2.5rem;
            }

            .stat-number {
                font-size: 3rem;
            }

            .cta-section h2 {
                font-size: 2.25rem;
            }

            .team-intro {
                font-size: 1rem;
                margin-bottom: 3rem;
            }

            .team-card {
                padding: 2.5rem 2rem;
            }

            .team-avatar {
                width: 110px;
                height: 110px;
                font-size: 2.8rem;
            }

            .team-name {
                font-size: 1.4rem;
            }

            .team-role {
                font-size: 1rem;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1025px) and (max-width: 1400px) {
            .team-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 1401px) {
            .team-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <!-- Animated Background -->
    <div class="background-animation">
        <div class="gradient-orb orb-1"></div>
        <div class="gradient-orb orb-2"></div>
        <div class="gradient-orb orb-3"></div>
    </div>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">Local Hub</div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/about" class="active">About</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>About <span class="gradient-text">Local Hub</span></h1>
        <p>Connecting communities, empowering local businesses, and bringing neighbors together in the digital age.</p>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Mission Section -->
        <section class="mission-section">
            <div class="mission-card">
                <h2>Our Mission</h2>
                <p>Local Hub was created with a simple yet powerful vision: to strengthen local communities by providing a platform where neighbors can connect, local businesses can thrive, and everyone can discover the hidden gems in their neighborhood. We believe that strong communities are built on meaningful connections, and technology should serve to bring people together, not apart.</p>
                <br>
                <p>In an increasingly digital world, we're committed to keeping the local spirit alive. Whether you're looking for a trusted service provider, want to support local businesses, or simply connect with your neighbors, Local Hub is your gateway to a more connected community.</p>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section" id="features">
            <h2 class="section-title">What We Offer</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🏘️</div>
                    <h3>Community Connection</h3>
                    <p>Build meaningful relationships with your neighbors and stay informed about local events, news, and activities happening in your area.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛍️</div>
                    <h3>Local Business Directory</h3>
                    <p>Discover and support local businesses, from restaurants and cafes to services and retail shops, all in one convenient platform.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>Trusted Network</h3>
                    <p>Connect with verified local service providers, read authentic reviews, and make informed decisions about who to trust in your community.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Easy to Use</h3>
                    <p>Our intuitive platform makes it simple to find what you need, when you need it. Access everything from your phone, tablet, or computer.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Safe & Secure</h3>
                    <p>Your privacy and security are our top priorities. We use industry-leading security measures to protect your personal information.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌱</div>
                    <h3>Community Growth</h3>
                    <p>Help your local economy thrive by supporting neighborhood businesses and fostering a culture of community engagement.</p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Local Businesses</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Communities</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">25K+</div>
                    <div class="stat-label">Connections Made</div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team-section" id="team">
            <h2 class="section-title">Meet Our Team</h2>
            <p class="team-intro">
                Our passionate team is dedicated to building connections and empowering local communities.
                Get to know the people behind Local Hub.
            </p>
            <div class="team-grid">
                <!-- Team Member 1 -->
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="{{ asset('images/team/kaushik-pal.jpg') }}" alt="Kaushik Pal">
                    </div>
                    <h3 class="team-name">Kaushik Pal</h3>
                    <p class="team-role">Founder & CEO</p>
                    <p class="team-bio">Passionate about building technology that brings communities together and empowers local businesses.</p>
                    <div class="team-social">
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener noreferrer" class="social-link linkedin" aria-label="LinkedIn Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="social-link github" aria-label="GitHub Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="{{ asset('images/team/anirban-das.jpg') }}" alt="Anirban Das">
                    </div>
                    <h3 class="team-name">Anirban Das</h3>
                    <p class="team-role">Head of Product</p>
                    <p class="team-bio">Dedicated to creating user experiences that make community engagement effortless and enjoyable.</p>
                    <div class="team-social">
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener noreferrer" class="social-link linkedin" aria-label="LinkedIn Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="social-link github" aria-label="GitHub Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="{{ asset('images/team/rup-das.jpg') }}" alt="Rup Das">
                    </div>
                    <h3 class="team-name">Rup Das</h3>
                    <p class="team-role">Ghugni Bikreta</p>
                    <p class="team-bio">Building bridges between neighbors and ensuring every voice in our community is heard.</p>
                    <div class="team-social">
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener noreferrer" class="social-link linkedin" aria-label="LinkedIn Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="social-link github" aria-label="GitHub Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="{{ asset('images/team/ayan-ghosh.jpg') }}" alt="Ayan Ghosh">
                    </div>
                    <h3 class="team-name">Ayan Ghosh</h3>
                    <p class="team-role"></p>
                    <p class="team-bio">Crafting robust and scalable solutions to power seamless community connections.</p>
                    <div class="team-social">
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener noreferrer" class="social-link linkedin" aria-label="LinkedIn Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="social-link github" aria-label="GitHub Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Team Member 5 -->
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="{{ asset('images/team/subhadip-ghosh.png') }}" alt="Subhadip Ghosh">
                    </div>
                    <h3 class="team-name">Subhadip Ghosh</h3>
                    <p class="team-role">CEO</p>
                    <p class="team-bio">Spreading the word about Local Hub and helping communities discover the power of connection.</p>
                    <div class="team-social">
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" rel="noopener noreferrer" class="social-link linkedin" aria-label="LinkedIn Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="social-link github" aria-label="GitHub Profile">
                            <svg class="social-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" id="contact">
            <h2>Ready to Join Your <span class="gradient-text">Local Community</span>?</h2>
            <p>Start connecting with your neighbors and discovering amazing local businesses today.</p>
            <a href="/" class="cta-button">Get Started Now</a>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Local Hub. All rights reserved.</p>
        <p>Built with ❤️ for local communities</p>
        <div class="social-links">
            <a href="#" aria-label="Facebook">📘</a>
            <a href="#" aria-label="Twitter">🐦</a>
            <a href="#" aria-label="Instagram">📷</a>
            <a href="#" aria-label="LinkedIn">💼</a>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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
    </script>
</body>

</html>