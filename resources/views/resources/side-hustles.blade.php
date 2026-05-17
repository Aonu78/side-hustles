@extends('layouts.app')

@section('title', 'Side Hustles')

@section('content')
@php
  $effortLabels = [
      'low' => 'Easy',
      'medium' => 'Medium',
      'high' => 'Advanced',
  ];

  $effortBadgeClasses = [
      'low' => 'bg-emerald-light text-hf-primary',
      'medium' => 'bg-gold-light text-hf-gold',
      'high' => 'bg-light text-muted',
  ];

  $earningBands = [
      'starter' => 'Up to $500/mo',
      'steady' => '$501-$1,500/mo',
      'growth' => '$1,501-$3,000/mo',
      'scale' => '$3,000+/mo',
  ];

  $categories = $hustles
      ->pluck('category.name')
      ->filter()
      ->unique()
      ->sort()
      ->values();

  $detailRouteAvailable = \Illuminate\Support\Facades\Route::has('hustles.show');
@endphp

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

.finder-toolbar .filter-group-label {
  display: block;
  margin-bottom: 0.5rem;
}

.hustle-card-link {
  color: inherit;
}

.hustle-card-link:hover {
  color: inherit;
}
</style>

<section class="bg-hero-gradient text-white py-5 container-hero">
  <div class="container">
    <h1 class="font-heading fw-bold display-5 mb-3">Find Your Perfect Side Hustle</h1>
    <p class="text-white-50 fs-5 mb-0">Search by category, effort level, and earning potential.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="card-hf p-4 mb-4 finder-toolbar">
      <div class="row g-4">
        <div class="col-lg-4">
          <label for="hustleSearch" class="form-label small fw-medium">Search</label>
          <div class="position-relative">
            <i class="bi bi-search position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
            <input
              type="text"
              id="hustleSearch"
              class="form-control form-control-hf ps-5"
              placeholder="Search by hustle name or description..."
            >
          </div>
        </div>
        <div class="col-lg-8">
          <div class="row g-3">
            <div class="col-md-6">
              <span class="filter-group-label small fw-medium">Category</span>
              <div class="d-flex flex-wrap gap-1" id="catFilters">
                <button type="button" class="filter-pill active" data-cat="all">All</button>
                @foreach ($categories as $category)
                  <button type="button" class="filter-pill" data-cat="{{ \Illuminate\Support\Str::slug($category) }}">{{ $category }}</button>
                @endforeach
              </div>
            </div>
            <div class="col-md-6">
              <span class="filter-group-label small fw-medium">Effort Level</span>
              <div class="d-flex flex-wrap gap-1" id="effortFilters">
                <button type="button" class="filter-pill active" data-effort="all">All</button>
                <button type="button" class="filter-pill" data-effort="low">Easy</button>
                <button type="button" class="filter-pill" data-effort="medium">Medium</button>
                <button type="button" class="filter-pill" data-effort="high">Advanced</button>
              </div>
            </div>
            <div class="col-12">
              <span class="filter-group-label small fw-medium">Earning Potential</span>
              <div class="d-flex flex-wrap gap-1" id="earningFilters">
                <button type="button" class="filter-pill active" data-earning="all">All</button>
                @foreach ($earningBands as $bandKey => $bandLabel)
                  <button type="button" class="filter-pill" data-earning="{{ $bandKey }}">{{ $bandLabel }}</button>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <p class="small text-muted mb-3" id="hustleCount">{{ $hustles->count() }} side hustles found</p>

    <div class="row g-4" id="hustleGrid">
      @forelse ($hustles as $hustle)
        @php
          $effortKey = $hustle->effort_level;
          $effortLabel = $effortLabels[$effortKey] ?? ucfirst($effortKey);
          $badgeClass = $effortBadgeClasses[$effortKey] ?? 'bg-light text-muted';
          $monthlyRevenue = (float) $hustle->revenue_potential;

          if ($monthlyRevenue <= 500) {
              $earningBand = 'starter';
          } elseif ($monthlyRevenue <= 1500) {
              $earningBand = 'steady';
          } elseif ($monthlyRevenue <= 3000) {
              $earningBand = 'growth';
          } else {
              $earningBand = 'scale';
          }
        @endphp

        <div
          class="col-md-6 col-xl-4 hustle-item"
          data-name="{{ \Illuminate\Support\Str::lower($hustle->name) }}"
          data-description="{{ \Illuminate\Support\Str::lower(strip_tags($hustle->description)) }}"
          data-category="{{ \Illuminate\Support\Str::slug($hustle->category?->name ?? 'uncategorized') }}"
          data-effort="{{ $effortKey }}"
          data-earning="{{ $earningBand }}"
        >
          <div class="card-hf p-4 h-100">
            <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
              <div class="icon-box bg-emerald-light flex-shrink-0">
                <i class="bi bi-briefcase-fill text-hf-primary"></i>
              </div>
              <span class="badge badge-hf {{ $badgeClass }}">{{ $effortLabel }}</span>
            </div>

            <p class="small text-hf-primary fw-medium mb-2">{{ $hustle->category?->name ?? 'Uncategorized' }}</p>
            <h2 class="font-heading fw-bold h5 mb-2">{{ $hustle->name }}</h2>
            <p class="small text-muted mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($hustle->description), 120) }}</p>

            <div class="small mb-4">
              <div class="d-flex justify-content-between text-muted mb-2">
                <span>Effort Level</span>
                <span class="fw-medium text-dark">{{ $effortLabel }}</span>
              </div>
              <div class="d-flex justify-content-between text-muted">
                <span>Monthly Potential</span>
                <span class="fw-bold text-hf-primary">${{ number_format($monthlyRevenue, 0) }}/mo</span>
              </div>
            </div>

            <div class="mt-auto">
              @if ($detailRouteAvailable)
                <a href="{{ route('hustles.show', $hustle->slug) }}" class="small fw-medium text-hf-primary text-decoration-none hustle-card-link">
                  View Details <i class="bi bi-arrow-right"></i>
                </a>
              @else
                <span class="small fw-medium text-muted">Details coming soon</span>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="col-12" id="hustleGridEmpty">
          <div class="card-hf p-4">
            <p class="mb-0 text-muted">No side hustles have been published yet.</p>
          </div>
        </div>
      @endforelse
    </div>

    <div class="card-hf p-4 text-center d-none mt-4" id="hustleEmptyState">
      <h2 class="font-heading fw-semibold h5 mb-2">No matches right now</h2>
      <p class="small text-muted mb-0">Try a different search term or clear one of the filters.</p>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f5f3ef">
  <div class="container">
    <h2 class="font-heading fw-bold h3 mb-4">Getting Started Guide</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card-hf p-4 h-100">
          <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-primary text-white fw-bold mb-3" style="width:40px;height:40px">1</div>
          <h3 class="font-heading fw-semibold h6">Choose Your Hustle</h3>
          <p class="small text-muted mb-0">Start with one that matches your schedule, energy, and income target.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-hf p-4 h-100">
          <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-primary text-white fw-bold mb-3" style="width:40px;height:40px">2</div>
          <h3 class="font-heading fw-semibold h6">Gather Your Tools</h3>
          <p class="small text-muted mb-0">Review the hustle details, prep your basic setup, and keep startup costs lean.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-hf p-4 h-100">
          <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-primary text-white fw-bold mb-3" style="width:40px;height:40px">3</div>
          <h3 class="font-heading fw-semibold h6">Launch & Earn</h3>
          <p class="small text-muted mb-0">Pick one channel, post your offer, and build consistency before adding more.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('hustleSearch');
  const countEl = document.getElementById('hustleCount');
  const emptyState = document.getElementById('hustleEmptyState');
  const items = Array.from(document.querySelectorAll('.hustle-item'));

  let activeCategory = 'all';
  let activeEffort = 'all';
  let activeEarning = 'all';

  function setActiveButton(containerId, value, dataKey) {
    document.querySelectorAll('#' + containerId + ' .filter-pill').forEach(function (button) {
      button.classList.toggle('active', button.dataset[dataKey] === value);
    });
  }

  function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();
    let visibleCount = 0;

    items.forEach(function (item) {
      const matchesSearch = !query ||
        item.dataset.name.includes(query) ||
        item.dataset.description.includes(query);
      const matchesCategory = activeCategory === 'all' || item.dataset.category === activeCategory;
      const matchesEffort = activeEffort === 'all' || item.dataset.effort === activeEffort;
      const matchesEarning = activeEarning === 'all' || item.dataset.earning === activeEarning;
      const shouldShow = matchesSearch && matchesCategory && matchesEffort && matchesEarning;

      item.classList.toggle('d-none', !shouldShow);

      if (shouldShow) {
        visibleCount += 1;
      }
    });

    countEl.textContent = visibleCount + ' side hustles found';
    emptyState.classList.toggle('d-none', visibleCount !== 0 || items.length === 0);
  }

  searchInput.addEventListener('input', applyFilters);

  document.querySelectorAll('#catFilters .filter-pill').forEach(function (button) {
    button.addEventListener('click', function () {
      activeCategory = button.dataset.cat;
      setActiveButton('catFilters', activeCategory, 'cat');
      applyFilters();
    });
  });

  document.querySelectorAll('#effortFilters .filter-pill').forEach(function (button) {
    button.addEventListener('click', function () {
      activeEffort = button.dataset.effort;
      setActiveButton('effortFilters', activeEffort, 'effort');
      applyFilters();
    });
  });

  document.querySelectorAll('#earningFilters .filter-pill').forEach(function (button) {
    button.addEventListener('click', function () {
      activeEarning = button.dataset.earning;
      setActiveButton('earningFilters', activeEarning, 'earning');
      applyFilters();
    });
  });

  applyFilters();
});
</script>
@endsection
