<!-- Common Scripts Component -->
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

    // UI Interactions
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
    }

    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        const notifPanel = document.getElementById('notification-panel');
        notifPanel.classList.remove('active');
        dropdown.classList.toggle('active');
    }

    function toggleNotifications() {
        const panel = document.getElementById('notification-panel');
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.classList.remove('active');
        panel.classList.toggle('active');
        if (panel.classList.contains('active')) {
            loadNotifications();
        }
    }

    // Load notifications - Updated to return empty array by default
    async function loadNotifications() {
        try {
            // Fetch notifications (returns empty array for now)
            const notifications = await fetchNotifications();
            renderNotifications(notifications);
            updateNotificationCount(notifications.filter(n => !n.read).length);
        } catch (error) {
            console.error('Error loading notifications:', error);
            renderNotifications([]);
            updateNotificationCount(0);
        }
    }

    // Fetch notifications from API
    async function fetchNotifications() {
        try {
            // TODO: Replace with actual API call when backend is ready
            // const response = await fetch(`${API_BASE}/professional/notifications`, {
            //     headers: authHeaders
            // });
            // if (!response.ok) throw new Error('Failed to load notifications');
            // return await response.json();

            // For now, return empty array (no notifications)
            return [];
        } catch (error) {
            console.error('Error fetching notifications:', error);
            return [];
        }
    }

    function renderNotifications(notifications) {
        const container = document.getElementById('notification-list');

        if (!notifications || notifications.length === 0) {
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
                <div class="notification-icon ${notif.type}"><i class="fas ${notif.icon}"></i></div>
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
        // TODO: API call to mark as read
        console.log('Mark notification as read:', id);
        loadNotifications();
    }

    function markAllRead() {
        // TODO: API call to mark all as read
        console.log('Mark all notifications as read');
        updateNotificationCount(0);
        loadNotifications();
    }

    function viewAllNotifications() {
        alert('View all notifications - Coming soon!');
        return false;
    }

    function navigate(route) {
        console.log('Navigate to:', route);
        window.location.href = `/${route}`;
    }

    function viewProfile() {
        window.location.href = '/profile';
    }

    function openSettings() {
        window.location.href = '/professional-settings';
    }


    async function logout() {
        if (!confirm('Are you sure you want to logout?')) return;
        try {
            await fetch(`${API_BASE}/logout`, {
                method: 'POST',
                headers: authHeaders
            });
        } catch (error) {
            console.error('Logout error:', error);
        } finally {
            localStorage.removeItem('auth_token');
            window.location.href = '/';
        }
    }
    // Load user profile image - Enhanced with better error handling
    async function loadUserAvatar() {
        try {
            const response = await fetch(`${API_BASE}/user/profile`, {
                headers: authHeaders
            });

            if (!response.ok) {
                throw new Error('Failed to load user profile');
            }

            const data = await response.json();
            const user = data.user || data;
            const avatar = document.getElementById('profile-avatar');

            if (!avatar) return; // Avatar element not found

            if (user.profile_image) {
                // Show actual image from database
                const imageUrl = `/uploads/profiles/${user.profile_image}`;
                avatar.style.backgroundImage = `url('${imageUrl}')`;
                avatar.style.backgroundSize = 'cover';
                avatar.style.backgroundPosition = 'center';
                avatar.textContent = ''; // Clear any text content
            } else {
                // If no profile image, show a default user icon
                avatar.innerHTML = '<i class="fas fa-user"></i>';
                avatar.style.backgroundImage = 'none';
                avatar.style.display = 'flex';
                avatar.style.alignItems = 'center';
                avatar.style.justifyContent = 'center';
                avatar.style.fontSize = '20px';
                avatar.style.color = '#2563eb';
            }
        } catch (error) {
            console.error('Error loading user avatar:', error);
            // Show default icon on error
            const avatar = document.getElementById('profile-avatar');
            if (avatar) {
                avatar.innerHTML = '<i class="fas fa-user"></i>';
                avatar.style.backgroundImage = 'none';
            }
        }
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

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadUserAvatar();
        // Load notification count without opening panel
        fetchNotifications().then(notifications => {
            updateNotificationCount(notifications.filter(n => !n.read).length);
        });
    });
</script>