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

    function loadNotifications() {
        const notifications = [{
                id: 1,
                type: 'success',
                icon: 'fa-check-circle',
                text: 'New appointment confirmed with John Doe',
                time: '5 minutes ago',
                read: false
            },
            {
                id: 2,
                type: 'info',
                icon: 'fa-info-circle',
                text: 'You have a new review (5 stars)',
                time: '1 hour ago',
                read: false
            },
            {
                id: 3,
                type: 'warning',
                icon: 'fa-exclamation-triangle',
                text: 'Appointment reminder in 30 minutes',
                time: '2 hours ago',
                read: false
            }
        ];
        renderNotifications(notifications);
        updateNotificationCount(notifications.filter(n => !n.read).length);
    }

    function renderNotifications(notifications) {
        const container = document.getElementById('notification-list');
        if (notifications.length === 0) {
            container.innerHTML = '<div class="empty-notifications"><i class="fas fa-bell-slash"></i><div>No notifications</div></div>';
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
        console.log('Mark notification as read:', id);
        loadNotifications();
    }

    function markAllRead() {
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

    function showMessages() {
        alert('Messages - Coming soon!');
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