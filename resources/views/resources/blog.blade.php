@extends('layouts.app')

@section('title', 'Blog')

@section('content')
@php
  $articleItems = collect(method_exists($posts, 'items') ? $posts->items() : $posts);
  $categories = $articleItems
      ->map(fn ($post) => $post->category?->name ?? 'Personal Finance')
      ->unique()
      ->sort()
      ->values();
@endphp

<section class="bg-hero-gradient text-white py-5">
  <div class="container">
    <h1 class="font-heading fw-bold display-5 mb-3">Practical Money Tips & Side Hustle Advice</h1>
    <p class="text-white-50 fs-5">Actionable content to improve your financial life</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
      <div>
        <h2 class="font-heading fw-bold h4 mb-1">Featured Articles</h2>
        <p class="text-muted mb-0">Fresh reads from the blog library.</p>
      </div>
      <form method="GET" action="{{ route('blog.index') }}" class="d-flex gap-2">
        <input type="search" name="search" class="form-control form-control-hf" placeholder="Search posts..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-hf-primary">Search</button>
      </form>
    </div>

    <div class="row g-4 mb-5">
      @foreach ($articleItems->take(2) as $post)
        @php
          $readTime = $post->read_time ?? max(3, ceil(str_word_count(strip_tags($post->content ?? $post->excerpt ?? '')) / 200)).' min';
        @endphp
        <div class="col-md-6">
          <a href="{{ route('blog.show', $post->slug) }}" class="card-hf overflow-hidden h-100 d-block text-decoration-none">
            <div class="p-5 bg-gradient-primary text-center"><i class="bi bi-star-fill text-white-50" style="font-size:3rem"></i></div>
            <div class="p-4">
              <div class="d-flex flex-wrap gap-2 mb-2">
                <span class="badge bg-emerald-light text-hf-primary small">{{ $post->category?->name ?? 'Personal Finance' }}</span>
                <span class="small text-muted"><i class="bi bi-clock"></i> {{ $readTime }}</span>
              </div>
              <h3 class="font-heading fw-bold h5 mb-2 text-dark">{{ $post->title }}</h3>
              <p class="small text-muted mb-2">{{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 150) }}</p>
              <span class="small text-muted">{{ optional($post->published_at)->format('M d, Y') }}</span>
            </div>
          </a>
        </div>
      @endforeach
    </div>

    <div class="card-hf p-4 mb-4">
      <div class="row g-3 align-items-center">
        <div class="col-lg-4">
          <div class="position-relative">
            <i class="bi bi-search position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
            <input type="text" id="blogSearch" class="form-control form-control-hf ps-5" placeholder="Filter visible articles...">
          </div>
        </div>
        <div class="col-lg-8">
          <div class="d-flex flex-wrap gap-1" id="blogCatFilters">
            <button type="button" class="filter-pill active" data-cat="all">All</button>
            @foreach ($categories as $category)
              <button type="button" class="filter-pill" data-cat="{{ \Illuminate\Support\Str::slug($category) }}">{{ $category }}</button>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <p class="small text-muted mb-3" id="blogCount">{{ $articleItems->count() }} articles found</p>

    <div id="blogList">
      @forelse ($articleItems as $post)
        @php
          $category = $post->category?->name ?? 'Personal Finance';
          $readTime = $post->read_time ?? max(3, ceil(str_word_count(strip_tags($post->content ?? $post->excerpt ?? '')) / 200)).' min';
        @endphp
        <a
          href="{{ route('blog.show', $post->slug) }}"
          class="card-hf p-4 mb-3 d-flex align-items-center gap-3 text-decoration-none blog-item"
          data-title="{{ \Illuminate\Support\Str::lower($post->title) }}"
          data-excerpt="{{ \Illuminate\Support\Str::lower(strip_tags($post->excerpt ?? $post->content ?? '')) }}"
          data-category="{{ \Illuminate\Support\Str::slug($category) }}"
        >
          <div class="icon-box bg-emerald-light flex-shrink-0 d-none d-md-flex"><i class="bi bi-book text-hf-primary"></i></div>
          <div class="flex-grow-1">
            <div class="d-flex flex-wrap gap-2 mb-1 small">
              <span class="fw-medium text-hf-primary">{{ $category }}</span>
              <span class="text-muted">{{ $readTime }} read</span>
              <span class="text-muted">{{ optional($post->published_at)->format('M d, Y') }}</span>
            </div>
            <h3 class="font-heading fw-semibold h6 mb-1 text-dark">{{ $post->title }}</h3>
            <p class="small text-muted mb-0">{{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 160) }}</p>
          </div>
          <i class="bi bi-arrow-right text-hf-primary flex-shrink-0 d-none d-md-block"></i>
        </a>
      @empty
        <div class="card-hf p-4">
          <p class="text-muted mb-0">No articles found.</p>
        </div>
      @endforelse
    </div>

    <div class="card-hf p-4 text-center d-none" id="blogEmptyState">
      <h2 class="font-heading fw-semibold h5 mb-2">No articles match those filters</h2>
      <p class="small text-muted mb-0">Try a different search term or category.</p>
    </div>

    @if (method_exists($posts, 'links') && $posts->hasPages())
      <div class="mt-4">{{ $posts->withQueryString()->links() }}</div>
    @endif
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('blogSearch');
  const countEl = document.getElementById('blogCount');
  const emptyState = document.getElementById('blogEmptyState');
  const items = Array.from(document.querySelectorAll('.blog-item'));
  let activeCategory = 'all';

  function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();
    let visibleCount = 0;

    items.forEach(function (item) {
      const matchesSearch = !query || item.dataset.title.includes(query) || item.dataset.excerpt.includes(query);
      const matchesCategory = activeCategory === 'all' || item.dataset.category === activeCategory;
      const shouldShow = matchesSearch && matchesCategory;

      item.classList.toggle('d-none', !shouldShow);
      if (shouldShow) visibleCount += 1;
    });

    countEl.textContent = visibleCount + ' articles found';
    emptyState.classList.toggle('d-none', visibleCount !== 0 || items.length === 0);
  }

  searchInput.addEventListener('input', applyFilters);

  document.querySelectorAll('#blogCatFilters .filter-pill').forEach(function (button) {
    button.addEventListener('click', function () {
      activeCategory = button.dataset.cat;
      document.querySelectorAll('#blogCatFilters .filter-pill').forEach(function (item) {
        item.classList.toggle('active', item === button);
      });
      applyFilters();
    });
  });

  applyFilters();
});
</script>
@endsection
