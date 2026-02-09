<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Services - LocalConnect Pro</title>
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

        .page-subtitle {
            color: #64748b;
            font-size: 15px;
        }

        .search-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 32px;
        }

        .search-box {
            display: flex;
            gap: 12px;
        }

        .search-input {
            flex: 1;
            padding: 14px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn {
            padding: 14px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-outline {
            background: white;
            border: 1px solid #e2e8f0;
            color: #64748b;
        }

        .btn-outline:hover {
            background: #f1f5f9;
        }

        .professionals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .professional-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            cursor: pointer;
        }

        .professional-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .pro-header {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
        }

        .pro-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 24px;
            flex-shrink: 0;
        }

        .pro-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .pro-specialization {
            color: #7c3aed;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .pro-location {
            color: #64748b;
            font-size: 13px;
        }

        .pro-location i {
            margin-right: 4px;
        }

        .pro-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin: 16px 0;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
        }

        .detail-item {
            font-size: 13px;
        }

        .detail-label {
            color: #64748b;
            margin-bottom: 4px;
        }

        .detail-value {
            font-weight: 600;
            color: #1e293b;
        }

        .pro-bio {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .pro-actions {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 13px;
        }

        .empty-state {
            text-align: center;
            padding: 64px 24px;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-state h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #64748b;
        }

        .empty-state p {
            font-size: 15px;
        }

        .loading {
            text-align: center;
            padding: 48px;
            color: #64748b;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #e2e8f0;
            border-top-color: #2563eb;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 16px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                padding: 16px;
            }

            .professionals-grid {
                grid-template-columns: 1fr;
            }

            .search-box {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
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

    <!-- Sidebar -->
    <aside class="sidebar">
        <a href="/resident/dashboard" class="sidebar-item">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
        <a href="/resident/services" class="sidebar-item active">
            <i class="fas fa-search"></i>
            Find Services
        </a>
        <a href="/resident/bookings" class="sidebar-item">
            <i class="fas fa-calendar-check"></i>
            My Bookings
        </a>
        <a href="/resident/messages" class="sidebar-item">
            <i class="fas fa-comments"></i>
            Messages
        </a>
        <a href="/resident/profile" class="sidebar-item">
            <i class="fas fa-user"></i>
            My Profile
        </a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Find Professional Services</h1>
            <p class="page-subtitle">Search for electricians, plumbers, doctors, and more in your area</p>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-box">
                <input type="text" 
                       id="searchInput" 
                       class="search-input" 
                       placeholder="Search for electrician, plumber, doctor, carpenter..."
                       onkeypress="handleKeyPress(event)">
                <button onclick="searchProfessionals()" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
                <button onclick="resetSearch()" class="btn btn-outline">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>

        <!-- Results -->
        <div id="results-container">
            <!-- Results will load here -->
        </div>
    </main>

    <script>
        const API_BASE = '/api';
        const token = localStorage.getItem('auth_token');

        if (!token) {
            window.location.href = '/login';
        }

        const authHeaders = {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        };

        // Load user data
        async function loadUserData() {
            try {
                const response = await fetch(`${API_BASE}/user/profile`, {
                    headers: authHeaders
                });

                if (!response.ok) throw new Error('Failed to load profile');

                const data = await response.json();
                const user = data.user || data;

                document.getElementById('user-name').textContent = user.name || 'Resident';
                
                const avatar = document.getElementById('user-avatar');
                if (user.name) {
                    const initials = user.name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
                    avatar.textContent = initials;
                }
            } catch (error) {
                console.error('Error loading user data:', error);
            }
        }

        // Search professionals
        async function searchProfessionals() {
            const query = document.getElementById('searchInput').value.trim();
            console.log('🔍 Searching for:', query);

            if (!query) {
                alert('Please enter a search term');
                return;
            }

            const container = document.getElementById('results-container');
            
            // Show loading state
            container.innerHTML = `
                <div class="loading">
                    <div class="spinner"></div>
                    <p>Searching for professionals...</p>
                </div>
            `;

            try {
                const response = await fetch(`${API_BASE}/search/professionals?query=${encodeURIComponent(query)}`, {
                    method: 'GET',
                    headers: authHeaders
                });

                console.log('📡 Response status:', response.status);

                if (!response.ok) {
                    if (response.status === 401) {
                        alert('Session expired. Please login again.');
                        localStorage.removeItem('auth_token');
                        window.location.href = '/login';
                        return;
                    }
                    throw new Error(`HTTP ${response.status}`);
                }

                const data = await response.json();
                console.log('✅ Search results:', data);

                displayResults(data.data || [], query);

            } catch (error) {
                console.error('❌ Search error:', error);
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-exclamation-circle"></i>
                        <h3>Search Failed</h3>
                        <p>${error.message}</p>
                        <button onclick="resetSearch()" class="btn btn-primary" style="margin-top: 20px;">
                            Try Again
                        </button>
                    </div>
                `;
            }
        }

        // Display results
        function displayResults(professionals, query) {
            const container = document.getElementById('results-container');

            if (professionals.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-search"></i>
                        <h3>No professionals found</h3>
                        <p>No results for "${query}". Try a different search term.</p>
                        <button onclick="resetSearch()" class="btn btn-primary" style="margin-top: 20px;">
                            Clear Search
                        </button>
                    </div>
                `;
                return;
            }

            const grid = document.createElement('div');
            grid.className = 'professionals-grid';

            professionals.forEach(professional => {
                const profile = professional.professional_profile || {};
                const initials = professional.name ? 
                    professional.name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2) : 
                    'P';

                const card = document.createElement('div');
                card.className = 'professional-card';
                card.innerHTML = `
                    <div class="pro-header">
                        <div class="pro-avatar">${initials}</div>
                        <div class="pro-info">
                            <h3>${professional.name || 'Professional'}</h3>
                            <div class="pro-specialization">
                                <i class="fas fa-briefcase"></i> ${profile.specialization || 'Service Provider'}
                            </div>
                            <div class="pro-location">
                                <i class="fas fa-map-marker-alt"></i> ${professional.city || 'Location not specified'}
                            </div>
                        </div>
                    </div>

                    <div class="pro-details">
                        <div class="detail-item">
                            <div class="detail-label">Experience</div>
                            <div class="detail-value">${profile.experience_years || 0} years</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Rate</div>
                            <div class="detail-value">₹${profile.hourly_rate || profile.consultation_fee || 'N/A'}${profile.hourly_rate ? '/hr' : ''}</div>
                        </div>
                    </div>

                    ${profile.bio ? `<div class="pro-bio">${profile.bio}</div>` : ''}

                    <div class="pro-actions">
                        <button onclick="bookProfessional(${professional.id})" class="btn btn-primary btn-sm" style="flex: 1;">
                            <i class="fas fa-calendar-plus"></i> Book Now
                        </button>
                        <button onclick="viewProfile(${professional.id})" class="btn btn-outline btn-sm">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </div>
                `;
                
                grid.appendChild(card);
            });

            container.innerHTML = '';
            container.appendChild(grid);
        }

        // Reset search
        function resetSearch() {
            document.getElementById('searchInput').value = '';
            const container = document.getElementById('results-container');
            container.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h3>Search for Professionals</h3>
                    <p>Enter a service type in the search box above to find professionals near you</p>
                </div>
            `;
        }

        // Handle Enter key
        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                searchProfessionals();
            }
        }

        // Book professional
        function bookProfessional(professionalId) {
            alert(`Booking functionality coming soon! Professional ID: ${professionalId}`);
            // TODO: Redirect to booking page or open booking modal
        }

        // View profile
        function viewProfile(professionalId) {
            alert(`Profile view coming soon! Professional ID: ${professionalId}`);
            // TODO: Open professional profile modal or page
        }

        // Logout
        function logout() {
            if (!confirm('Are you sure you want to logout?')) return;
            
            fetch(`${API_BASE}/logout`, {
                method: 'POST',
                headers: authHeaders
            })
            .then(() => {
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            })
            .catch(() => {
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadUserData();
            resetSearch();
        });
    </script>
</body>
</html>