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
            justify-content: space-between;
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

        .nav-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .search-bar {
            max-width: 400px;
            width: 400px;
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

        /* Notification Dropdown */
        .notification-dropdown {
            position: relative;
        }

        .notification-panel {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 380px;
            margin-top: 12px;
            display: none;
            max-height: 500px;
            overflow: hidden;
            z-index: 1000;
        }

        .notification-panel.active {
            display: block;
        }

        .notification-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-title {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
        }

        .mark-all-read {
            font-size: 13px;
            color: #2563eb;
            cursor: pointer;
            background: none;
            border: none;
            font-weight: 500;
        }

        .mark-all-read:hover {
            text-decoration: underline;
        }

        .notification-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            gap: 12px;
        }

        .notification-item:hover {
            background: #f8fafc;
        }

        .notification-item.unread {
            background: #eff6ff;
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 18px;
        }

        .notification-icon.info {
            background: #dbeafe;
            color: #2563eb;
        }

        .notification-icon.success {
            background: #d1fae5;
            color: #10b981;
        }

        .notification-icon.warning {
            background: #fef3c7;
            color: #f59e0b;
        }

        .notification-content {
            flex: 1;
        }

        .notification-text {
            font-size: 14px;
            color: #1e293b;
            margin-bottom: 4px;
            line-height: 1.5;
        }

        .notification-time {
            font-size: 12px;
            color: #94a3b8;
        }

        .notification-footer {
            padding: 12px 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
        }

        .view-all-notifications {
            color: #2563eb;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
        }

        .view-all-notifications:hover {
            text-decoration: underline;
        }

        .empty-notifications {
            padding: 48px 20px;
            text-align: center;
            color: #94a3b8;
        }

        .empty-notifications i {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.3;
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
        <div class="nav-right">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search appointments, services...">
            </div>
            <div class="nav-icons">
                <div class="notification-dropdown">
                    <button class="icon-btn" onclick="toggleNotifications()">
                        <i class="fas fa-bell"></i>
                        <span class="badge" id="notif-count">3</span>
                    </button>
                    <div class="notification-panel" id="notification-panel">
                        <div class="notification-header">
                            <div class="notification-title">Notifications</div>
                            <button class="mark-all-read" onclick="markAllRead()">Mark all as read</button>
                        </div>
                        <div class="notification-list" id="notification-list">
                            <!-- Notifications will be loaded here -->
                        </div>
                        <div class="notification-footer">
                            <a href="#" class="view-all-notifications" onclick="viewAllNotifications()">View All Notifications</a>
                        </div>
                    </div>
                </div>
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
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-item active" onclick="navigate('professional')"><i class="fas fa-th-large"></i> Dashboard Overview</div>
        <div class="sidebar-item" onclick="navigate('my-services')"><i class="fas fa-briefcase"></i> My Services</div>
        <div class="sidebar-item" onclick="navigate('appointments')"><i class="fas fa-calendar-check"></i> Appointments</div>
        <div class="sidebar-item" onclick="navigate('earnings')"><i class="fas fa-dollar-sign"></i> My Earnings</div>
        <div class="sidebar-item" onclick="navigate('reviews')"><i class="fas fa-star"></i> Reviews & Ratings</div>
        <div class="sidebar-item" onclick="navigate('messages')"><i class="fas fa-comments"></i> Messages</div>
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

<div class="modal" id="profile-completion-modal" style="display: none;">
    <div class="modal-content" style="max-width: 600px; background: white; padding: 2rem; border-radius: 12px;">
        <h2>Complete Your Professional Profile</h2>
        <p style="color: #64748b; margin-bottom: 2rem;">Please complete your profile to start receiving bookings</p>
        
        <form id="complete-profile-form">
            <div class="form-group">
                <label class="form-label">Professional Title *</label>
                <input type="text" class="form-input" id="professional-title" 
                       placeholder="e.g., Certified Plumber" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Specialization *</label>
                <input type="text" class="form-input" id="specialization" 
                       placeholder="e.g., Plumbing" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Years of Experience *</label>
                <input type="number" class="form-input" id="experience" 
                       placeholder="5" min="0" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Qualifications</label>
                <textarea class="form-textarea" id="qualifications" 
                          placeholder="Certifications, degrees, training..."></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Professional Bio *</label>
                <textarea class="form-textarea" id="bio" 
                          placeholder="Tell clients about your expertise..." required></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Hourly Rate (₹)</label>
                <input type="number" class="form-input" id="hourly-rate" 
                       placeholder="500" min="0">
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">
                Save & Continue
            </button>
        </form>
    </div>
</div>
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
            checkAuth();
            loadUserProfileImage();
            checkProfileCompletion();
            loadProfileData();
            loadDashboardData();
            loadAppointments();
            loadServices();
        });

        // Check authentication
        function checkAuth() {
            if (!token) {
                console.warn('No auth token found');
                // Optionally redirect to login
                // window.location.href = '/login';
            }
        }

        // Load Profile Data
        async function loadProfileData() {
            try {
                const response = await fetch(`${API_BASE}/professional/profile`, {
                    headers: authHeaders
                });

                if (!response.ok) throw new Error('Failed to load profile');

                const profile = await response.json();
                updateProfileUI(profile);
            } catch (error) {
                console.error('Profile error:', error);
            }
        }

        // Update Profile UI
        function updateProfileUI(profile) {
            if (profile.name) {
                const initials = profile.name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
                document.getElementById('profile-avatar').textContent = initials;
            }
        }

        // Check if profile is complete on page load
async function checkProfileCompletion() {
    try {
        const response = await fetch(`${API_BASE}/professional/profile`, {
            headers: authHeaders
        });
        
        const profile = await response.json();
        
        // If bio is empty, profile is incomplete
        if (!profile.bio || profile.bio.trim() === '') {
            showProfileCompletionModal();
        }
    } catch (error) {
        console.error('Error checking profile:', error);
    }
}

function showProfileCompletionModal() {
    const modal = document.getElementById('profile-completion-modal');
    modal.style.display = 'flex';
    modal.style.position = 'fixed';
    modal.style.top = '0';
    modal.style.left = '0';
    modal.style.right = '0';
    modal.style.bottom = '0';
    modal.style.background = 'rgba(0,0,0,0.5)';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    modal.style.zIndex = '9999';
}

// Handle profile completion form submission
document.getElementById('complete-profile-form')?.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const data = {
        specialization: document.getElementById('specialization').value,
        experience_years: parseInt(document.getElementById('experience').value),
        qualifications: document.getElementById('qualifications').value,
        bio: document.getElementById('bio').value,
        hourly_rate: parseFloat(document.getElementById('hourly-rate').value) || 0
    };
    
    try {
        const response = await fetch(`${API_BASE}/professional/profile`, {
            method: 'PUT',
            headers: authHeaders,
            body: JSON.stringify(data)
        });
        
        if (response.ok) {
            document.getElementById('profile-completion-modal').style.display = 'none';
            alert('Profile completed successfully!');
            loadDashboardData();
        } else {
            alert('Failed to update profile');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error updating profile');
    }
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
                // Show demo data or empty state
            }
        }

        // Load Services
        async function loadServices() {
            try {
                const response = await fetch(`${API_BASE}/professional/services`, {
                    headers: authHeaders
                });

                if (!response.ok) throw new Error('Failed to load services');

                const services = await response.json();
                updateServicesCount(services);
            } catch (error) {
                console.error('Services error:', error);
            }
        }

        // Update Services Count
        function updateServicesCount(services) {
            if (services && services.length > 0) {
                document.getElementById('active-services').textContent = services.length;
                // Find most popular service (you can customize this logic)
                if (services[0] && services[0].name) {
                    document.getElementById('popular-service').textContent = services[0].name;
                }
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
        
        // In professional.blade.php, add this function:
async function loadUserProfileImage() {
    try {
        const response = await fetch(`${API_BASE}/user/profile`, {
            headers: authHeaders
        });
        
        if (!response.ok) throw new Error('Failed to load profile');
        
        const data = await response.json();
        const user = data.user;
        
        if (user.profile_image) {
            // Show actual image
            const avatar = document.getElementById('profile-avatar');
            const imageUrl = `/uploads/profiles/${user.profile_image}`;
            avatar.style.backgroundImage = `url('${imageUrl}')`;
            avatar.style.backgroundSize = 'cover';
            avatar.style.backgroundPosition = 'center';
            avatar.textContent = '';
        }
    } catch (error) {
        console.error('Error loading profile image:', error);
    }
}

        // Update Dashboard with data
        function updateDashboard(data) {
            // Update earnings
            if (data.stats) {
                const totalEarnings = data.stats.total_earnings || 0;
                document.getElementById('total-earnings').textContent = `₹${totalEarnings.toLocaleString()}`;

                // For now, show 0% change until we implement month-over-month comparison
                const changeEl = document.getElementById('earnings-change');
                changeEl.className = 'stat-change positive';
                changeEl.innerHTML = `<i class="fas fa-arrow-up"></i> <span>0% vs last month</span>`;
            }

            // Update appointments count
            if (data.stats) {
                document.getElementById('upcoming-count').textContent = data.stats.upcoming_appointments || 0;
            }

            // Update rating (placeholder for now)
            document.getElementById('avg-rating').textContent = '0.0';
            renderStars(0);

            // Update active services
            if (data.stats) {
                document.getElementById('active-services').textContent = data.stats.active_services || 0;
                if (data.stats.popular_service) {
                    document.getElementById('popular-service').textContent = data.stats.popular_service;
                }
            }
        }

        // Render Appointments Table
        function renderAppointments(appointments) {
            const container = document.getElementById('appointments-container');

            if (!appointments || appointments.length === 0) {
                showEmptyState('appointments-container', 'No upcoming appointments');
                return;
            }

            // Filter for upcoming appointments only
            const upcomingAppointments = appointments.filter(apt => {
                const aptTime = new Date(apt.appointment_time);
                return aptTime > new Date() && apt.status !== 'cancelled';
            }).slice(0, 5); // Show only first 5

            if (upcomingAppointments.length === 0) {
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
                        ${upcomingAppointments.map(apt => `
                            <tr>
                                <td>
                                    <div class="client-info">
                                        <div class="client-avatar">${getInitials(apt.user?.name || 'Client')}</div>
                                        <div class="client-name">${apt.user?.name || 'Client'}</div>
                                    </div>
                                </td>
                                <td>${apt.service?.name || 'Service'}</td>
                                <td>${formatDateTime(apt.appointment_time)}</td>
                                <td><span class="status-badge ${apt.status.toLowerCase()}">${apt.status}</span></td>
                                <td>
                                    <div class="action-btns">
                                        ${apt.status === 'pending' ? `
                                            <button class="btn btn-primary" onclick="confirmAppointment(${apt.id})">Confirm</button>
                                            <button class="btn btn-outline" onclick="rescheduleAppointment(${apt.id})">Reschedule</button>
                                        ` : `
                                            <button class="btn btn-outline" onclick="viewAppointmentDetails(${apt.id})">View Details</button>
                                        `}
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

        // Add New Service
        async function addService() {
            const serviceName = prompt('Enter service name:');
            if (!serviceName) return;

            const serviceDescription = prompt('Enter service description:');
            const servicePrice = prompt('Enter service price:');

            try {
                const response = await fetch(`${API_BASE}/professional/services`, {
                    method: 'POST',
                    headers: authHeaders,
                    body: JSON.stringify({
                        name: serviceName,
                        description: serviceDescription,
                        price: servicePrice
                    })
                });

                if (response.ok) {
                    alert('Service added successfully!');
                    loadServices();
                } else {
                    alert('Failed to add service');
                }
            } catch (error) {
                console.error('Error adding service:', error);
                alert('Error adding service');
            }
        }

        function viewCalendar() {
            alert('Calendar view - Coming soon!');
        }

        function checkEarnings() {
            alert('Earnings view - Coming soon!');
        }

        // Update Profile
        async function updateProfile() {
            const name = prompt('Enter your name:');
            if (!name) return;

            try {
                const response = await fetch(`${API_BASE}/professional/profile`, {
                    method: 'PUT',
                    headers: authHeaders,
                    body: JSON.stringify({
                        name
                    })
                });

                if (response.ok) {
                    alert('Profile updated successfully!');
                    loadProfileData();
                } else {
                    alert('Failed to update profile');
                }
            } catch (error) {
                console.error('Error updating profile:', error);
                alert('Error updating profile');
            }
        }

        // View Profile
        async function viewProfile() {
            try {
                const response = await fetch(`${API_BASE}/professional/profile`, {
                    headers: authHeaders
                });

                if (response.ok) {
                    const profile = await response.json();
                    alert(`Profile:\nName: ${profile.name || 'N/A'}\nEmail: ${profile.email || 'N/A'}`);
                } else {
                    alert('Failed to load profile');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error loading profile');
            }
        }

        function openSettings() {
            window.location.href = '/professional-settings';
        }

        // Notification Panel Functions
        function toggleNotifications() {
            const panel = document.getElementById('notification-panel');
            const dropdown = document.getElementById('dropdown-menu');

            // Close profile dropdown if open
            dropdown.classList.remove('active');

            // Toggle notification panel
            panel.classList.toggle('active');

            // Load notifications if opening
            if (panel.classList.contains('active')) {
                loadNotifications();
            }
        }

        function loadNotifications() {
            // Sample notifications - replace with API call later
            const notifications = [{
                    id: 1,
                    type: 'success',
                    icon: 'fa-check-circle',
                    text: 'New appointment confirmed with John Doe for Home Cleaning',
                    time: '5 minutes ago',
                    read: false
                },
                {
                    id: 2,
                    type: 'info',
                    icon: 'fa-info-circle',
                    text: 'You have a new review from Sarah Smith (5 stars)',
                    time: '1 hour ago',
                    read: false
                },
                {
                    id: 3,
                    type: 'warning',
                    icon: 'fa-exclamation-triangle',
                    text: 'Appointment reminder: Meeting with Mike Johnson in 30 minutes',
                    time: '2 hours ago',
                    read: false
                },
                {
                    id: 4,
                    type: 'info',
                    icon: 'fa-calendar',
                    text: 'Your service "Deep Cleaning" has been approved',
                    time: '1 day ago',
                    read: true
                },
                {
                    id: 5,
                    type: 'success',
                    icon: 'fa-dollar-sign',
                    text: 'Payment received: ₹2,500 from Emma Wilson',
                    time: '2 days ago',
                    read: true
                }
            ];

            renderNotifications(notifications);
            updateNotificationCount(notifications.filter(n => !n.read).length);
        }

        function renderNotifications(notifications) {
            const container = document.getElementById('notification-list');

            if (notifications.length === 0) {
                container.innerHTML = `
                    <div class="empty-notifications">
                        <i class="fas fa-bell-slash"></i>
                        <div>No notifications</div>
                    </div>
                `;
                return;
            }

            container.innerHTML = notifications.map(notif => `
                <div class="notification-item ${notif.read ? '' : 'unread'}" onclick="markAsRead(${notif.id})">
                    <div class="notification-icon ${notif.type}">
                        <i class="fas ${notif.icon}"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text">${notif.text}</div>
                        <div class="notification-time">${notif.time}</div>
                    </div>
                </div>
            `).join('');
        }

        function updateNotificationCount(count) {
            const badge = document.getElementById('notif-count');
            if (count > 0) {
                badge.textContent = count;
                badge.style.display = 'block';
            } else {
                badge.style.display = 'none';
            }
        }

        function markAsRead(id) {
            console.log('Mark notification as read:', id);
            // API call to mark as read would go here
            // For now, just reload notifications
            loadNotifications();
        }

        function markAllRead() {
            console.log('Mark all notifications as read');
            // API call to mark all as read would go here
            updateNotificationCount(0);
            loadNotifications();
        }

        function viewAllNotifications() {
            alert('View all notifications page - Coming soon!');
            return false;
        }

        function showMessages() {
            alert('Messages - Coming soon!');
        }

        // Logout
        async function logout() {
            if (!confirm('Are you sure you want to logout?')) return;

            try {
                const response = await fetch(`${API_BASE}/logout`, {
                    method: 'POST',
                    headers: authHeaders
                });

                if (response.ok) {
                    localStorage.removeItem('auth_token');
                    window.location.href = '/';
                } else {
                    // Even if API fails, clear token and redirect
                    localStorage.removeItem('auth_token');
                    window.location.href = '/';
                }
            } catch (error) {
                console.error('Logout error:', error);
                localStorage.removeItem('auth_token');
                window.location.href = '/';
            }
        }

        // Navigate to different pages
        function navigate(route) {
            console.log('Navigate to:', route);
            window.location.href = `/${route}`;
        }

        // Toggle sidebar for mobile
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Toggle notifications panel
        function toggleNotifications() {
            const panel = document.getElementById('notification-panel');
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.remove('active');
            panel.classList.toggle('active');
        }

        // Toggle profile dropdown
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            const notifPanel = document.getElementById('notification-panel');
            notifPanel.classList.remove('active');
            dropdown.classList.toggle('active');
        }

        // Mark all notifications as read
        function markAllRead() {
            document.getElementById('notif-count').style.display = 'none';
            alert('All notifications marked as read');
        }

        // View all notifications
        function viewAllNotifications() {
            alert('View all notifications - Coming soon!');
            return false;
        }

        // Show messages
        function showMessages() {
            alert('Messages - Coming soon!');
        }

        // View profile
        function viewProfile() {
            window.location.href = '/profile';
        }

        // Open settings
        function openSettings() {
            window.location.href = '/professional-settings';
        }

        // Toggle professional status (online/offline)
        function toggleStatus() {
            const toggle = document.getElementById('status-toggle');
            const statusText = document.getElementById('status-text');
            toggle.classList.toggle('active');

            if (toggle.classList.contains('active')) {
                statusText.textContent = 'Online';
            } else {
                statusText.textContent = 'Offline';
            }
        }

        // Quick action functions
        function addService() {
            window.location.href = '/my-services';
        }

        function viewCalendar() {
            window.location.href = '/calendar';
        }

        function checkEarnings() {
            window.location.href = '/earnings';
        }

        function updateProfile() {
            window.location.href = '/professional-settings';
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.profile-dropdown')) {
                document.getElementById('dropdown-menu').classList.remove('active');
            }
            if (!e.target.closest('.notification-dropdown')) {
                document.getElementById('notification-panel').classList.remove('active');
            }
        });
    </script>
</body>

</html>