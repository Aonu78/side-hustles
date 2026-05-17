@extends('layouts.app')

@section('content')
<style>

.container-hero {
  position: relative;
  color: hsl(0 0% 100%);

  background:
    linear-gradient(
      135deg,
      hsl(220 25% 12% / 0.85) 0%,
      hsl(220 20% 18% / 0.85) 50%,
      hsl(155 40% 20% / 0.85) 100%
    ),
    url('/img/hero-bg.jpg');

  background-size: cover;
  background-position: center;
}
</style>
<!-- HERO -->
<section class="position-relative text-white container-hero">
  <div class="container py-5 py-md-5">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="display-4 fw-bold mb-3">
          Master Your Money,
          <span class="text-warning">Multiply Your Income</span>
        </h1>
        <p class="lead mb-4">
          Simple strategies to manage your finances and build profitable side hustles — all in one place.
        </p>

        <div class="d-flex flex-wrap gap-3">
          <a href="/finance-tools" class="btn btn-light btn-lg">
            Explore Finance Tools
          </a>
          <a href="/side-hustles" class="btn btn-outline-light btn-lg">
            Find Side Hustles
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="bg-white border-bottom">
  <div class="container py-4">
    <div class="row text-center">

      <div class="col-md-4 mb-3 mb-md-0">
        <h3 class="fw-bold">1,000+</h3>
        <p class="text-muted small">Community Members</p>
      </div>

      <div class="col-md-4 mb-3 mb-md-0">
        <h3 class="fw-bold">100+</h3>
        <p class="text-muted small">Free Resources</p>
      </div>

      <div class="col-md-4">
        <h3 class="fw-bold">$10,000+</h3>
        <p class="text-muted small">Reported Earnings</p>
      </div>

    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="container py-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold">How It Works</h2>
    <p class="text-muted">Three simple steps to financial freedom</p>
  </div>

  <div class="row text-center">

    <div class="col-md-4 mb-4">
      <div class="p-4">
        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
          1
        </div>
        <h5 class="fw-bold">Learn</h5>
        <p class="text-muted small">Practical money management guides built for real life.</p>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="p-4">
        <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
          2
        </div>
        <h5 class="fw-bold">Implement</h5>
        <p class="text-muted small">Easy-to-use templates & tools you can start using today.</p>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="p-4">
        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
          3
        </div>
        <h5 class="fw-bold">Earn</h5>
        <p class="text-muted small">Proven side hustle strategies that actually work.</p>
      </div>
    </div>

  </div>
</section>

<!-- FINANCE TOOLS -->
<section class="bg-light py-5">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold">Finance Tools</h2>
        <p class="text-muted small">Interactive tools to take control of your finances</p>
      </div>
      <a href="/finance-tools" class="btn btn-outline-primary btn-sm">View All</a>
    </div>

    <div class="row">

      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h6 class="fw-bold">Budget Planner</h6>
            <p class="text-muted small">Interactive monthly budget template</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h6 class="fw-bold">Debt Tracker</h6>
            <p class="text-muted small">Visual payoff progress chart</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h6 class="fw-bold">Savings Calculator</h6>
            <p class="text-muted small">Reach your goals faster</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h6 class="fw-bold">Bill Organizer</h6>
            <p class="text-muted small">Never miss a payment</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- SIDE HUSTLES -->
<section class="container py-5 text-center">
  <h2 class="fw-bold mb-4">Side Hustle Ideas</h2>

  <div class="row">

    <div class="col-md-4 mb-4">
      <div class="card p-4 shadow-sm border-0">
        <h5 class="fw-bold">Quick Start</h5>
        <p class="text-muted small">Start earning today</p>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card p-4 shadow-sm border-0">
        <h5 class="fw-bold">Weekend Projects</h5>
        <p class="text-muted small">Flexible earning</p>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card p-4 shadow-sm border-0">
        <h5 class="fw-bold">Long-Term</h5>
        <p class="text-muted small">Scalable income</p>
      </div>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="bg-primary text-white text-center py-5">
  <div class="container">
    <h2 class="fw-bold mb-3">Start Your Journey Today</h2>
    <p class="mb-4">Explore tools, guides, and side hustles</p>
    <a href="/resources" class="btn btn-light btn-lg">Browse Resources</a>
  </div>
</section>

@endsection