<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('admin.dashboard') }}">
        <img src="https://soft-ui-dashboard-laravel.creative-tim.com/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">BLOCKIQx Admin</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    @php
      $menuItems = [
          ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'fa-home'],
          ['label' => 'Blog Posts', 'route' => 'admin.posts.index', 'icon' => 'fa-newspaper'],
          ['label' => 'Categories', 'route' => 'admin.categories.index', 'icon' => 'fa-tags'],
          ['label' => 'Finance Tools', 'route' => 'admin.tools.index', 'icon' => 'fa-calculator'],
          ['label' => 'Hustles', 'route' => 'admin.hustles.index', 'icon' => 'fa-bolt'],
          ['label' => 'Resources', 'route' => 'admin.resources.index', 'icon' => 'fa-download'],
      ];
    @endphp
    <ul class="navbar-nav">
      @foreach ($menuItems as $item)
      @php($routeGroup = \Illuminate\Support\Str::beforeLast($item['route'], '.'))
      @php($isActive = request()->routeIs($item['route']) || request()->routeIs($routeGroup . '.*'))
      <li class="nav-item">
        <a class="nav-link {{ $isActive ? 'active' : '' }}" href="{{ route($item['route']) }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas {{ $item['icon'] }} {{ $isActive ? 'text-white' : 'text-dark' }}" style="font-size: 12px;"></i>
          </div>
          <span class="nav-link-text ms-1">{{ $item['label'] }}</span>
        </a>
      </li>
      @endforeach
    </ul>
  </div>
</aside>
