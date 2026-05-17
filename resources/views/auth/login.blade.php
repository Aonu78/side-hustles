<x-guest-layout>
    @section('title', 'Login')

    <div class="container py-5">
        <div class="row min-vh-100 align-items-center justify-content-center g-4">
            <div class="col-lg-6 d-none d-lg-block">
                <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-4">
                    <i class="bi bi-briefcase-fill text-hf-primary fs-3"></i>
                    <span class="brand-text fs-4">Hustle<span>Fundamentals</span></span>
                </a>

                <div class="pe-xl-5">
                    <span class="badge bg-emerald-light text-hf-primary mb-3">Member Access</span>
                    <h1 class="font-heading fw-bold display-5 mb-3">Get back to your money plan.</h1>
                    <p class="text-muted fs-5 mb-4">Sign in to manage tools, resources, and side-hustle content from one focused dashboard.</p>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="card-hf p-3 h-100">
                                <div class="icon-box bg-emerald-light mb-3"><i class="bi bi-calculator text-hf-primary"></i></div>
                                <h2 class="font-heading h6 fw-semibold mb-1">Finance Tools</h2>
                                <p class="small text-muted mb-0">Save results and keep your planning workflow moving.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card-hf p-3 h-100">
                                <div class="icon-box bg-gold-light mb-3"><i class="bi bi-lightning-charge text-hf-gold"></i></div>
                                <h2 class="font-heading h6 fw-semibold mb-1">Side Hustles</h2>
                                <p class="small text-muted mb-0">Jump back into ideas, posts, and resources quickly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-4">
                <div class="card-hf auth-card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}" class="d-inline-flex align-items-center justify-content-center text-decoration-none mb-3 d-lg-none">
                            <i class="bi bi-briefcase-fill text-hf-primary fs-2"></i>
                        </a>
                        <h1 class="font-heading fw-bold h3 mb-2">Welcome back</h1>
                        <p class="text-muted mb-0">Log in to continue to your dashboard.</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-semibold">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    class="form-control form-control-hf @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    autocomplete="username"
                                    autofocus
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <label for="password" class="form-label small fw-semibold">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="small text-hf-primary text-decoration-none">Forgot?</a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control form-control-hf @error('password') is-invalid @enderror"
                                    autocomplete="current-password"
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label class="form-check-label small text-muted" for="remember_me">Remember me</label>
                            </div>
                            <a href="{{ route('register') }}" class="small text-muted text-decoration-none">Create account</a>
                        </div>

                        <button type="submit" class="btn btn-hf-primary w-100 py-2">
                            Log in <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
