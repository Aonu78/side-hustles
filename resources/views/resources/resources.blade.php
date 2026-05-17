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

<section class="bg-hero-gradient text-white py-5 container-hero">
  <div class="container">
    <h1 class="font-heading fw-bold display-5 mb-3">Free Tools & Guides</h1>
    <p class="text-white-50 fs-5">Everything you need to manage money and build income</p>
  </div>
</section>

<!-- Download Library -->
<section class="py-5">
  <div class="container">
    @php
      $resourceItems = collect(method_exists($resources, 'items') ? $resources->items() : $resources);
    @endphp
    <h2 class="font-heading fw-bold h3 mb-1 d-flex align-items-center gap-2">
      <div class="icon-box bg-emerald-light"><i class="bi bi-download text-hf-primary"></i></div> Download Library
    </h2>
    <p class="text-muted mb-4 ms-5">Templates, worksheets, and checklists — all free</p>
    <div class="row g-3">
      @forelse ($resourceItems as $resource)
        @php
          $extension = strtoupper(pathinfo($resource->file_path, PATHINFO_EXTENSION) ?: 'FILE');
        @endphp
        <div class="col-md-6 col-lg-3">
          <div class="card-hf p-3 h-100">
            <div class="d-flex gap-2 mb-2">
              <span class="badge bg-emerald-light text-hf-primary small">{{ $extension }}</span>
              <span class="small text-muted">{{ $resource->category?->name ?? 'General' }}</span>
            </div>
            <h3 class="font-heading fw-semibold small mb-2">{{ $resource->title }}</h3>
            <p class="small text-muted mb-2">{{ number_format($resource->downloads_count) }} downloads</p>
            <div class="d-flex gap-3">
              <a href="{{ route('resources.download', $resource->slug) }}" class="small text-hf-primary text-decoration-none">Download <i class="bi bi-download"></i></a>
              <a href="{{ route('resources.show', $resource->slug) }}" class="small text-muted text-decoration-none">Details</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="card-hf p-4">
            <p class="text-muted mb-0">No resources have been added yet.</p>
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Guides -->
<section class="py-5" style="background:#f5f3ef">
  <div class="container">
    <h2 class="font-heading fw-bold h3 mb-1 d-flex align-items-center gap-2">
      <div class="icon-box bg-emerald-light"><i class="bi bi-book text-hf-primary"></i></div> Comprehensive Guides
    </h2>
    <p class="text-muted mb-4 ms-5">In-depth guides written for real results</p>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card-hf p-4 d-flex gap-3">
          <div class="icon-box-lg bg-gradient-primary text-white flex-shrink-0"><i class="bi bi-book fs-4"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1">30-Day Financial Reset</h3><p class="small text-muted mb-1">Transform your finances in just one month with this actionable guide</p><span class="small text-hf-primary fw-medium">24 pages • Free PDF</span></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-hf p-4 d-flex gap-3">
          <div class="icon-box-lg bg-gradient-primary text-white flex-shrink-0"><i class="bi bi-book fs-4"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1">Side Hustle Launch Checklist</h3><p class="small text-muted mb-1">Everything you need to launch your first side hustle</p><span class="small text-hf-primary fw-medium">12 pages • Free PDF</span></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-hf p-4 d-flex gap-3">
          <div class="icon-box-lg bg-gradient-primary text-white flex-shrink-0"><i class="bi bi-book fs-4"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1">Debt Free Journey Roadmap</h3><p class="small text-muted mb-1">Step-by-step plan to eliminate debt using proven strategies</p><span class="small text-hf-primary fw-medium">18 pages • Free PDF</span></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-hf p-4 d-flex gap-3">
          <div class="icon-box-lg bg-gradient-primary text-white flex-shrink-0"><i class="bi bi-book fs-4"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1">Tax Deduction Master List</h3><p class="small text-muted mb-1">Don't miss any deductions — comprehensive list for side hustlers</p><span class="small text-hf-primary fw-medium">8 pages • Free PDF</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Calculators -->
<section class="py-5">
  <div class="container">
    <h2 class="font-heading fw-bold h3 mb-1 d-flex align-items-center gap-2">
      <div class="icon-box bg-emerald-light"><i class="bi bi-calculator text-hf-primary"></i></div> Calculator Hub
    </h2>
    <p class="text-muted mb-4 ms-5">Run the numbers before you commit</p>
    <div class="row g-3">
      <div class="col-md-6"><a href="{{ route('finance-tools.index') }}#savings-calculator" class="card-hf p-4 d-flex justify-content-between align-items-center text-decoration-none"><div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Side Hustle ROI Calculator</h3><p class="small text-muted mb-0">Calculate return on investment for any side hustle</p></div><i class="bi bi-arrow-right text-hf-primary"></i></a></div>
      <div class="col-md-6"><a href="{{ route('finance-tools.index') }}#debt-calculator" class="card-hf p-4 d-flex justify-content-between align-items-center text-decoration-none"><div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Debt Payoff Timeline</h3><p class="small text-muted mb-0">See exactly when you'll be debt-free</p></div><i class="bi bi-arrow-right text-hf-primary"></i></a></div>
      <div class="col-md-6"><a href="{{ route('finance-tools.index') }}#savings-calculator" class="card-hf p-4 d-flex justify-content-between align-items-center text-decoration-none"><div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Investment Growth Projector</h3><p class="small text-muted mb-0">Visualize compound interest over time</p></div><i class="bi bi-arrow-right text-hf-primary"></i></a></div>
      <div class="col-md-6"><a href="{{ route('finance-tools.index') }}#budget-planner" class="card-hf p-4 d-flex justify-content-between align-items-center text-decoration-none"><div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Bill Negotiation Savings Estimator</h3><p class="small text-muted mb-0">See how much you could save by negotiating bills</p></div><i class="bi bi-arrow-right text-hf-primary"></i></a></div>
    </div>
  </div>
</section>

@endsection
