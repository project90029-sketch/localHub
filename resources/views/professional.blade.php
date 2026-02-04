<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Professional Dashboard - LocalConnect Pro</title>
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

        /* Top Navigation */
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
            padding: 0 24px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 700;
            color: #2563eb;
        }

        .logo-section i {
            font-size: 28px;
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            margin: 0 32px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
        }

        .search-bar i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .nav-icons {
            display: flex;
            gap: 24px;
            align-items: center;
        }

        .icon-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 20px;
            color: #64748b;
            cursor: pointer;
            transition: color 0.2s;
        }

        .icon-btn:hover {
            color: #2563eb;
        }

        .badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: #ef4444;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: 600;
        }

        .profile-dropdown {
            position: relative;
        }

        .profile-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .profile-btn:hover {
            background: #f1f5f9;
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            margin-top: 8px;
            display: none;
        }

        .dropdown-menu.active {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #475569;
            cursor: pointer;
            transition: background 0.2s;
            border: none;
            width: 100%;
            text-align: left;
            background: none;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background: #f1f5f9;
        }

        .dropdown-item i {
            width: 20px;
        }

        /* Sidebar */
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
            transition: transform 0.3s;
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

        /* Main Content */
        .main-content {
            margin-left: 260px;
            margin-top: 70px;
            padding: 32px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .stat-icon.green {
            background: #f0fdf4;
            color: #10b981;
        }

        .stat-icon.purple {
            background: #faf5ff;
            color: #a855f7;
        }

        .stat-icon.orange {
            background: #fff7ed;
            color: #f97316;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-change {
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .stat-change.positive {
            color: #10b981;
        }

        .stat-change.negative {
            color: #ef4444;
        }

        /* Section */
        .section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
        }

        .view-all {
            color: #2563eb;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        /* Appointments Table */
        .appointments-table {
            width: 100%;
        }

        .appointments-table th {
            text-align: left;
            padding: 12px;
            border-bottom: 2px solid #e2e8f0;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .appointments-table td {
            padding: 16px 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        .client-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .client-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .client-name {
            font-weight: 500;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-badge.cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-outline {
            background: white;
            border: 1px solid #e2e8f0;
            color: #64748b;
        }

        .btn-outline:hover {
            background: #f1f5f9;
        }

        /* Reviews */
        .reviews-grid {
            display: grid;
            gap: 16px;
        }

        .review-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .review-client {
            display: flex;
            gap: 12px;
        }

        .stars {
            color: #fbbf24;
        }

        .review-text {
            color: #475569;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .review-date {
            color: #94a3b8;
            font-size: 12px;
        }

        .reply-btn {
            color: #2563eb;
            font-size: 13px;
            cursor: pointer;
            background: none;
            border: none;
            font-weight: 500;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .quick-action {
            padding: 20px;
            border: 2px dashed #e2e8f0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .quick-action:hover {
            border-color: #2563eb;
            background: #eff6ff;
        }

        .quick-action i {
            font-size: 32px;
            color: #2563eb;
            margin-bottom: 8px;
        }

        .quick-action-label {
            font-weight: 500;
            color: #475569;
        }

        /* Status Toggle */
        .status-toggle {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .toggle-switch {
            position: relative;
            width: 50px;
            height: 26px;
            background: #cbd5e1;
            border-radius: 13px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle-switch.active {
            background: #10b981;
        }

        .toggle-slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            transition: transform 0.3s;
        }

        .toggle-switch.active .toggle-slider {
            transform: translateX(24px);
        }

        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f1f5f9 25%, #e2e8f0 50%, #f1f5f9 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 4px;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Responsive */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #64748b;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 16px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .search-bar {
                display: none;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .logo-section span {
                display: none;
            }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 16px;
            opacity: 0.3;
        }

        .empty-state-text {
            font-size: 16px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Top Navigation -->
    <nav class="top-nav">
        <button class="mobile-menu-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <div class="logo-section">
            <i class="fas fa-network-wired"></i>
            <span>LocalConnect Pro</span>
        </div>
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search appointments, services...">
        </div>
        <div class="nav-icons">
            <button class="icon-btn" onclick="showNotifications()">
                <i class="fas fa-bell"></i>
                <span class="badge" id="notif-count">3</span>
            </button>
            <button class="icon-btn" onclick="showMessages()">
                <i class="fas fa-envelope"></i>
                <span class="badge" id="msg-count">5</span>
            </button>
            <div class="profile-dropdown">
                <button class="profile-btn" onclick="toggleDropdown()">
                    <div class="profile-avatar" id="profile-avatar">JD</div>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-menu" id="dropdown-menu">
                    <button class="dropdown-item" onclick="viewProfile()"><i class="fas fa-user"></i> View Profile</button>
                    <button class="dropdown-item" onclick="openSettings()"><i class="fas fa-cog"></i> Settings</button>
                    <button class="dropdown-item" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-item active" onclick="navigate('dashboard')"><i class="fas fa-th-large"></i> Dashboard Overview</div>
        <div class="sidebar-item" onclick="navigate('services')"><i class="fas fa-briefcase"></i> My Services</div>
        <div class="sidebar-item" onclick="navigate('appointments')"><i class="fas fa-calendar-check"></i> Appointments</div>
        <div class="sidebar-item" onclick="navigate('calendar')"><i class="fas fa-calendar"></i> Calendar View</div>
        <div class="sidebar-item" onclick="navigate('earnings')"><i class="fas fa-dollar-sign"></i> My Earnings</div>
        <div class="sidebar-item" onclick="navigate('reviews')"><i class="fas fa-star"></i> Reviews & Ratings</div>
        <div class="sidebar-item" onclick="navigate('messages')"><i class="fas fa-comments"></i> Messages</div>
        <div class="sidebar-item" onclick="navigate('network')"><i class="fas fa-users"></i> Professional Network</div>
        <div class="sidebar-item" onclick="navigate('settings')"><i class="fas fa-cog"></i> Settings</div>
        <div class="sidebar-item" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Status Toggle -->
        <div class="status-toggle">
            <div class="toggle-switch" id="status-toggle" onclick="toggleStatus()">
                <div class="toggle-slider"></div>
            </div>
            <div>
                <strong id="status-text">Offline</strong>
                <div style="font-size: 13px; color: #64748b;">Toggle your availability</div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Total Earnings</div>
                        <div class="stat-value" id="total-earnings">₹0</div>
                        <div class="stat-change positive" id="earnings-change">
                            <i class="fas fa-arrow-up"></i> <span>0% vs last month</span>
                        </div>
                    </div>
                    <div class="stat-icon green"><i class="fas fa-rupee-sign"></i></div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Upcoming Appointments</div>
                        <div class="stat-value" id="upcoming-count">0</div>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <div class="stat-icon blue"><i class="fas fa-calendar-check"></i></div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Average Rating</div>
                        <div class="stat-value" id="avg-rating">0.0</div>
                        <div class="stars" id="rating-stars">★★★★★</div>
                    </div>
                    <div class="stat-icon purple"><i class="fas fa-star"></i></div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Active Services</div>
                        <div class="stat-value" id="active-services">0</div>
                        <div style="font-size: 13px; color: #64748b;" id="popular-service">-</div>
                    </div>
                    <div class="stat-icon orange"><i class="fas fa-briefcase"></i></div>
                </div>
            </div>
        </div>

        <!-- Upcoming Appointments -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Upcoming Appointments</h2>
                <a href="#" class="view-all">View All</a>
            </div>
            <div id="appointments-container">
                <div class="skeleton" style="height: 200px;"></div>
            </div>
        </div>

        <!-- Recent Reviews -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Recent Reviews</h2>
                <a href="#" class="view-all">View All</a>
            </div>
            <div id="reviews-container">
                <div class="skeleton" style="height: 150px;"></div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Quick Actions</h2>
            </div>
            <div class="quick-actions">
                <div class="quick-action" onclick="addService()">
                    <i class="fas fa-plus-circle"></i>
                    <div class="quick-action-label">Add New Service</div>
                </div>
                <div class="quick-action" onclick="viewCalendar()">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="quick-action-label">View Calendar</div>
                </div>
                <div class="quick-action" onclick="checkEarnings()">
                    <i class="fas fa-chart-line"></i>
                    <div class="quick-action-label">View Earnings</div>
                </div>
                <div class="quick-action" onclick="updateProfile()">
                    <i class="fas fa-user-edit"></i>
                    <div class="quick-action-label">Update Profile</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // API Configuration
        const API_BASE = '/api';
        const token = localStorage.getItem('auth_token');

        // Fetch headers with auth
        const authHeaders = {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        };

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            loadDashboardData();
            loadAppointments();
        });

        // Load Dashboard Data
        async function loadDashboardData() {
            try {
                const response = await fetch(`${API_BASE}/professional/dashboard`, {
                    headers: authHeaders
                });

                if (!response.ok) throw new Error('Failed to load dashboard');

                const data = await response.json();
                updateDashboard(data);
            } catch (error) {
                console.error('Dashboard error:', error);
                showEmptyState('appointments-container', 'No data available');
            }
        }

        // Load Appointments
        async function loadAppointments() {
            try {
                const response = await fetch(`${API_BASE}/professional/appointments`, {
                    headers: authHeaders
                });

                if (!response.ok) throw new Error('Failed to load appointments');

                const appointments = await response.json();
                renderAppointments(appointments);
            } catch (error) {
                console.error('Appointments error:', error);
                showEmptyState('appointments-container', 'No appointments found');
            }
        }

        // Update Dashboard with data
        function updateDashboard(data) {
            if (data.earnings) {
                document.getElementById('total-earnings').textContent = `₹${data.earnings.total || 0}`;
                const change = data.earnings.change || 0;
                const changeEl = document.getElementById('earnings-change');
                changeEl.className = `stat-change ${change >= 0 ? 'positive' : 'negative'}`;
                changeEl.innerHTML = `<i class="fas fa-arrow-${change >= 0 ? 'up' : 'down'}"></i> <span>${Math.abs(change)}% vs last month</span>`;
            }

            if (data.appointments) {
                document.getElementById('upcoming-count').textContent = data.appointments.upcoming || 0;
            }

            if (data.rating) {
                document.getElementById('avg-rating').textContent = data.rating.average || '0.0';
                renderStars(data.rating.average || 0);
            }

            if (data.services) {
                document.getElementById('active-services').textContent = data.services.active || 0;
                document.getElementById('popular-service').textContent = data.services.popular || '-';
            }
        }

        // Render Appointments Table
        function renderAppointments(appointments) {
            const container = document.getElementById('appointments-container');

            if (!appointments || appointments.length === 0) {
                showEmptyState('appointments-container', 'No upcoming appointments');
                return;
            }

            const table = `
                <table class="appointments-table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${appointments.map(apt => `
                            <tr>
                                <td>
                                    <div class="client-info">
                                        <div class="client-avatar">${getInitials(apt.client_name)}</div>
                                        <div class="client-name">${apt.client_name}</div>
                                    </div>
                                </td>
                                <td>${apt.service_type}</td>
                                <td>${formatDateTime(apt.date_time)}</td>
                                <td><span class="status-badge ${apt.status.toLowerCase()}">${apt.status}</span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="btn btn-primary" onclick="confirmAppointment(${apt.id})">Confirm</button>
                                        <button class="btn btn-outline" onclick="rescheduleAppointment(${apt.id})">Reschedule</button>
                                    </div>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            `;

            container.innerHTML = table;
        }

        // Render Stars
        function renderStars(rating) {
            const fullStars = Math.floor(rating);
            const hasHalf = rating % 1 >= 0.5;
            let stars = '★'.repeat(fullStars);
            if (hasHalf) stars += '½';
            stars += '☆'.repeat(5 - Math.ceil(rating));
            document.getElementById('rating-stars').textContent = stars;
        }

        // Helper Functions
        function getInitials(name) {
            return name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
        }

        function formatDateTime(datetime) {
            const date = new Date(datetime);
            return date.toLocaleDateString('en-IN', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                }) +
                ' at ' + date.toLocaleTimeString('en-IN', {
                    hour: '2-digit',
                    minute: '2-digit'
                });
        }

        function showEmptyState(containerId, message) {
            document.getElementById(containerId).innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <div class="empty-state-text">${message}</div>
                </div>
            `;
        }

        // UI Interactions
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        function toggleDropdown() {
            document.getElementById('dropdown-menu').classList.toggle('active');
        }

        function toggleStatus() {
            const toggle = document.getElementById('status-toggle');
            const text = document.getElementById('status-text');
            toggle.classList.toggle('active');
            text.textContent = toggle.classList.contains('active') ? 'Online' : 'Offline';
        }

        function navigate(page) {
            console.log('Navigate to:', page);
            document.querySelectorAll('.sidebar-item').forEach(item => item.classList.remove('active'));
            event.target.classList.add('active');
        }

        // Action Functions
        async function confirmAppointment(id) {
            try {
                const response = await fetch(`${API_BASE}/professional/appointments/${id}`, {
                    method: 'PUT',
                    headers: authHeaders,
                    body: JSON.stringify({
                        status: 'confirmed'
                    })
                });
                if (response.ok) {
                    alert('Appointment confirmed!');
                    loadAppointments();
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        function rescheduleAppointment(id) {
            alert('Reschedule feature coming soon!');
        }

        function addService() {
            alert('Add service feature');
        }

        function viewCalendar() {
            alert('Calendar view');
        }

        function checkEarnings() {
            alert('Earnings view');
        }

        function updateProfile() {
            alert('Profile update');
        }

        function viewProfile() {
            alert('View profile');
        }

        function openSettings() {
            alert('Settings');
        }

        function showNotifications() {
            alert('Notifications');
        }

        function showMessages() {
            alert('Messages');
        }

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.profile-dropdown')) {
                document.getElementById('dropdown-menu').classList.remove('active');
            }
        });
    </script>
</body>

</html>