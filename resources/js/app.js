// Mobile menu toggle
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));
    }

    // Admin sidebar toggle (mobile)
    const sidebarBtn = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('admin-sidebar');
    if (sidebarBtn && sidebar) {
        sidebarBtn.addEventListener('click', () => sidebar.classList.toggle('-translate-x-full'));
    }

    // Auto-hide flash messages
    const flash = document.getElementById('flash-message');
    if (flash) {
        setTimeout(() => flash.remove(), 5000);
    }
});
