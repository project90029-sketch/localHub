<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Support - LocalConnect Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .top-nav {
            background: white;
            height: 70px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 700;
            color: #2563eb;
        }

        .logo i {
            font-size: 28px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: #f1f5f9;
            border-radius: 8px;
            cursor: pointer;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 70px;
            bottom: 0;
            width: 260px;
            background: white;
            border-right: 1px solid #e2e8f0;
            padding: 24px 0;
            overflow-y: auto;
        }

        .sidebar-item {
            padding: 12px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        .sidebar-item:hover {
            background: #f1f5f9;
            color: #2563eb;
        }

        .sidebar-item.active {
            background: #eff6ff;
            color: #2563eb;
            border-right: 3px solid #2563eb;
        }

        .sidebar-item i {
            width: 20px;
            font-size: 18px;
        }

        .main-content {
            margin-left: 260px;
            margin-top: 70px;
            padding: 32px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
        }

        .help-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 24px;
        }

        details {
            margin-bottom: 12px;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            cursor: pointer;
        }

        summary {
            font-weight: 600;
            color: #1e293b;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                padding: 16px;
            }

            .help-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav class="top-nav">
        <div class="logo">
            <i class="fas fa-network-wired"></i>
            <span>LocalConnect Pro</span>
        </div>
        <div class="nav-right">
            <div class="user-menu" onclick="logout()">
                <div class="user-avatar" id="user-avatar">R</div>
                <span id="user-name">Loading...</span>
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>
    </nav>

    <aside class="sidebar">
        <a href="/resident/dashboard" class="sidebar-item">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="/resident/services" class="sidebar-item">
            <i class="fas fa-search"></i> Find Services
        </a>
        <a href="/resident/bookings" class="sidebar-item">
            <i class="fas fa-calendar-check"></i> My Bookings
        </a>
        <a href="/resident/messages" class="sidebar-item">
            <i class="fas fa-comments"></i> Messages
        </a>
        <a href="/resident/profile" class="sidebar-item">
            <i class="fas fa-user"></i> My Profile
        </a>
        <a href="/resident/help" class="sidebar-item active">
            <i class="fas fa-question-circle"></i> Help & Support
        </a>
    </aside>

    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Help & Support</h1>
            <p style="color: #64748b;">Find answers to common questions or contact our support team</p>
        </div>

        <div class="help-grid">
            <div class="help-content-panel">
                <div class="section">
                    <h2 style="margin-bottom: 20px; font-size: 18px;">Frequently Asked Questions</h2>
                    <div class="faq-list">
                        <details>
                            <summary>How do I book a professional?</summary>
                            <p style="margin-top: 10px; color: #64748b; font-size: 14px;">Go to "Find Services", select
                                a category, find a professional, and click "Book Now" on their profile or service.</p>
                        </details>
                        <details>
                            <summary>How can I cancel a booking?</summary>
                            <p style="margin-top: 10px; color: #64748b; font-size: 14px;">You can cancel any pending or
                                confirmed booking from the "My Bookings" section. Please note the professional's
                                cancellation policy.</p>
                        </details>
                        <details>
                            <summary>How do I pay for services?</summary>
                            <p style="margin-top: 10px; color: #64748b; font-size: 14px;">Payment methods depend on the
                                professional. Some accept online payments via LocalHub, while others take cash or direct
                                transfers after completion.</p>
                        </details>
                        <details>
                            <summary>What if I'm not happy with the service?</summary>
                            <p style="margin-top: 10px; color: #64748b; font-size: 14px;">We recommend first speaking
                                with the professional. If the issue persists, you can report it via the contact form on
                                this page or through the booking details.</p>
                        </details>
                    </div>
                </div>
            </div>

            <div class="contact-panel">
                <div class="section">
                    <h2 style="margin-bottom: 20px; font-size: 18px;">Contact Support</h2>
                    <x-contact-form />
                </div>
            </div>
        </div>
    </main>

    <script>
        const API_BASE = '/api';
        const token = localStorage.getItem('auth_token');
        const authHeaders = {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        };

        if (!token) window.location.href = '/login';

        async function loadUserData() {
            try {
                const response = await fetch(`${API_BASE}/user/profile`, { headers: authHeaders });
                if (!response.ok) throw new Error('Failed to load profile');
                const data = await response.json();
                const user = data.user || data;
                document.getElementById('user-name').textContent = user.name || 'Resident';
                const avatar = document.getElementById('user-avatar');
                if (user.name) {
                    avatar.textContent = user.name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
                }
            } catch (error) { console.error('Error loading user data:', error); }
        }

        function logout() {
            if (!confirm('Are you sure you want to logout?')) return;
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        document.addEventListener('DOMContentLoaded', loadUserData);
    </script>
</body>

</html>