<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-hf sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="/">
      <i class="bi bi-briefcase-fill text-hf-primary fs-4"></i>
      <span class="brand-text">Hustle<span>Fundamentals</span></span>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('finance-tools.*') ? 'active' : '' }}" href="{{ route('finance-tools.index') }}">Finance Tools</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('hustles.*') ? 'active' : '' }}" href="{{ route('hustles.index') }}">Side Hustles</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('resources.*') ? 'active' : '' }}" href="{{ route('resources.index') }}">Free Resources</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
      </ul>
      <a href="{{ url('/#newsletter') }}" class="btn btn-hf-primary btn-sm">Join Community</a>
    </div>
  </div>
</nav>
