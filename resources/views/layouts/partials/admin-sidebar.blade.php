<aside class="sidebar d-flex flex-column vh-100 position-fixed bg-light border-end shadow-sm" style="width: 250px; transition: all 0.3s ease; z-index: 1030;">
    <!-- Logo -->
    <div class="p-4 border-bottom bg-white">
        <a href="/admin/dashboard" class="d-flex align-items-center text-decoration-none">
            <i class="bi bi-lightning-charge-fill text-primary fs-3 me-2"></i>
            <span class="fw-bold fs-5">Admin Panel</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-grow-1 p-2 pt-4">
        @php $menuItems = [
            ['icon' => 'house-door', 'label' => 'Dashboard', 'href' => '#', 'hx-get' => '/admin/dashboard', 'active' => (request()->routeIs('admin.dashboard') ?? false)],
            ['icon' => 'journal-text', 'label' => 'Blog Posts', 'href' => '#', 'hx-get' => '/admin/posts/list', 'active' => false],
            ['icon' => 'tags', 'label' => 'Categories', 'href' => '#', 'data-section' => 'categories', 'active' => false],
            ['icon' => 'calculator', 'label' => 'Finance Tools', 'href' => '#', 'data-section' => 'tools', 'active' => false],
            ['icon' => 'lightning-charge', 'label' => 'Hustles', 'href' => route('admin.hustles.index'), 'active' => request()->routeIs('admin.hustles.*')],
            ['icon' => 'download', 'label' => 'Resources', 'href' => route('admin.resources.index'), 'active' => request()->routeIs('admin.resources.*')],
            ['icon' => 'people', 'label' => 'Users', 'href' => '#', 'data-section' => 'users', 'active' => false]
        ]; @endphp

        @foreach($menuItems as $item)
        <a class="nav-link p-2 {{ ($item['active'] ?? false) ? 'bg-primary text-white rounded-3 shadow-sm ' : 'text-dark hover-bg-light' }}" 
           href="{{ $item['href'] ?? '#' }}" 
           {{ isset($item['hx-get']) ? ('hx-get=\"'.$item['hx-get'].'\" hx-target=\"#main-content\" hx-swap=\"innerHTML\"') : '' }}
           {{ isset($item['data-section']) ? ('data-section=\"'.$item['data-section'].'\"') : '' }}>
            <i class="bi bi-{{ $item['icon'] }} me-2"></i>{{ $item['label'] }}
        </a>
        <hr class="my-2">
        @endforeach

        <a class="nav-link text-dark hover-bg-light" href="#" data-section="settings">
            <i class="bi bi-sliders me-2"></i>Settings
        </a>
    </nav>
</aside>

<!-- Mobile toggle overlay (when collapsed) -->
<div id="sidebar-overlay" class="sidebar-overlay d-none position-fixed w-100 h-100 bg-dark bg-opacity-50 z-1040" style="top:0; left:0;" onclick="toggleSidebar()"></div>

<style>
.sidebar.collapsed { transform: translateX(-100%); }
.sidebar-overlay { display: none; }
.sidebar-overlay.show { display: block; }
@media (max-width: 992px) { .sidebar { transform: translateX(-100%); } }
</style>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    sidebar.classList.toggle('collapsed');
    overlay.classList.toggle('show');
}
</script>

