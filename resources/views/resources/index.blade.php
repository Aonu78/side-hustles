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
<!-- Hero -->
<section class="bg-hero-gradient text-white py-5 container-hero">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="font-heading fw-bold display-4 mb-4 animate-fade-up">Master Your Money, <span class="text-hf-primary" style="color:#2ec27e!important">Multiply Your Income</span></h1>
        <p class="fs-5 text-white-50 mb-4 animate-fade-up delay-1" style="max-width:640px">Simple strategies to manage your finances and build profitable side hustles — all in one place.</p>
        <div class="d-flex flex-wrap gap-3 animate-fade-up delay-2">
          <a href="/finance-tools" class="btn btn-hf-primary btn-lg">Explore Finance Tools <i class="bi bi-arrow-right"></i></a>
          <a href="/side-hustles" class="btn btn-hf-outline btn-lg">Find Side Hustles</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Stats -->
<section class="bg-white border-bottom py-4">
  <div class="container">
    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="d-flex align-items-center justify-content-center gap-3">
          <div class="icon-box bg-emerald-light"><i class="bi bi-people-fill text-hf-primary fs-5"></i></div>
          <div class="text-start"><p class="font-heading fw-bold fs-4 mb-0">1,000+</p><p class="text-muted small mb-0">Community Members</p></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex align-items-center justify-content-center gap-3">
          <div class="icon-box bg-emerald-light"><i class="bi bi-file-earmark-text-fill text-hf-primary fs-5"></i></div>
          <div class="text-start"><p class="font-heading fw-bold fs-4 mb-0">100+</p><p class="text-muted small mb-0">Free Resources</p></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex align-items-center justify-content-center gap-3">
          <div class="icon-box bg-emerald-light"><i class="bi bi-graph-up-arrow text-hf-primary fs-5"></i></div>
          <div class="text-start"><p class="font-heading fw-bold fs-4 mb-0">$10,000+</p><p class="text-muted small mb-0">Reported Earnings</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- How It Works -->
<section class="py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <h2 class="font-heading fw-bold display-6">How It Works</h2>
      <p class="text-muted">Three simple steps to financial freedom</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4 text-center">
        <div class="position-relative d-inline-block mb-3">
          <div class="icon-box-xl bg-emerald-light mx-auto"><i class="bi bi-book text-hf-primary fs-2"></i></div>
          <span class="position-absolute top-0 end-0 translate-middle badge rounded-circle bg-gradient-primary p-2" style="width:28px;height:28px;font-size:0.75rem">1</span>
        </div>
        <h3 class="font-heading fw-bold h5">Learn</h3>
        <p class="text-muted small">Practical money management guides built for real life.</p>
      </div>
      <div class="col-md-4 text-center">
        <div class="position-relative d-inline-block mb-3">
          <div class="icon-box-xl bg-gold-light mx-auto"><i class="bi bi-lightbulb text-hf-gold fs-2"></i></div>
          <span class="position-absolute top-0 end-0 translate-middle badge rounded-circle bg-gradient-primary p-2" style="width:28px;height:28px;font-size:0.75rem">2</span>
        </div>
        <h3 class="font-heading fw-bold h5">Implement</h3>
        <p class="text-muted small">Easy-to-use templates & tools you can start using today.</p>
      </div>
      <div class="col-md-4 text-center">
        <div class="position-relative d-inline-block mb-3">
          <div class="icon-box-xl bg-emerald-light mx-auto"><i class="bi bi-graph-up text-hf-primary fs-2"></i></div>
          <span class="position-absolute top-0 end-0 translate-middle badge rounded-circle bg-gradient-primary p-2" style="width:28px;height:28px;font-size:0.75rem">3</span>
        </div>
        <h3 class="font-heading fw-bold h5">Earn</h3>
        <p class="text-muted small">Proven side hustle strategies that actually work.</p>
      </div>
    </div>
  </div>
</section>

<!-- Finance Tools Preview -->
<section class="py-5" style="background:#f5f3ef">
  <div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
      <div>
        <h2 class="font-heading fw-bold display-6 mb-1">Finance Tools</h2>
        <p class="text-muted mb-0">Interactive tools to take control of your finances</p>
      </div>
      <a href="/finance-tools" class="btn btn-outline-secondary">View All Tools <i class="bi bi-chevron-right"></i></a>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <a href="/finance-tools" class="card-hf d-block p-4 text-decoration-none">
          <div class="icon-box bg-emerald-light mb-3"><i class="bi bi-bar-chart-fill text-hf-primary"></i></div>
          <h3 class="font-heading fw-semibold h6 text-dark">Budget Planner</h3>
          <p class="small text-muted mb-0">Interactive monthly budget template</p>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="/finance-tools" class="card-hf d-block p-4 text-decoration-none">
          <div class="icon-box bg-emerald-light mb-3"><i class="bi bi-bullseye text-hf-primary"></i></div>
          <h3 class="font-heading fw-semibold h6 text-dark">Debt Tracker</h3>
          <p class="small text-muted mb-0">Visual payoff progress chart</p>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="/finance-tools" class="card-hf d-block p-4 text-decoration-none">
          <div class="icon-box bg-emerald-light mb-3"><i class="bi bi-piggy-bank-fill text-hf-primary"></i></div>
          <h3 class="font-heading fw-semibold h6 text-dark">Savings Calculator</h3>
          <p class="small text-muted mb-0">Reach your goals faster</p>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="/finance-tools" class="card-hf d-block p-4 text-decoration-none">
          <div class="icon-box bg-emerald-light mb-3"><i class="bi bi-file-earmark-text text-hf-primary"></i></div>
          <h3 class="font-heading fw-semibold h6 text-dark">Bill Organizer</h3>
          <p class="small text-muted mb-0">Never miss a payment</p>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Side Hustles Showcase -->
<section class="py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <h2 class="font-heading fw-bold display-6">Side Hustle Ideas</h2>
      <p class="text-muted">Find the perfect side hustle for your lifestyle</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card-hf p-4 h-100 position-relative">
          <span class="badge badge-hf bg-emerald-light text-hf-primary position-absolute top-0 end-0 m-3">Beginner</span>
          <div class="icon-box-lg bg-gradient-primary text-white mb-3"><i class="bi bi-lightning-fill fs-4"></i></div>
          <h3 class="font-heading fw-bold h5">Quick Start Hustles</h3>
          <p class="small text-muted">Under 1 hour setup — start earning today</p>
          <ul class="list-unstyled small mb-3">
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Online surveys</li>
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Delivery driving</li>
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Micro-tasks</li>
          </ul>
          <a href="/side-hustles" class="small fw-medium text-hf-primary text-decoration-none">Explore <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-hf p-4 h-100 position-relative">
          <span class="badge badge-hf bg-emerald-light text-hf-primary position-absolute top-0 end-0 m-3">Popular</span>
          <div class="icon-box-lg bg-gradient-primary text-white mb-3"><i class="bi bi-clock-fill fs-4"></i></div>
          <h3 class="font-heading fw-bold h5">Weekend Projects</h3>
          <p class="small text-muted">Make money on your own schedule</p>
          <ul class="list-unstyled small mb-3">
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Freelance writing</li>
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Virtual assistance</li>
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Tutoring</li>
          </ul>
          <a href="/side-hustles" class="small fw-medium text-hf-primary text-decoration-none">Explore <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-hf p-4 h-100 position-relative">
          <span class="badge badge-hf bg-emerald-light text-hf-primary position-absolute top-0 end-0 m-3">Advanced</span>
          <div class="icon-box-lg bg-gradient-primary text-white mb-3"><i class="bi bi-graph-up-arrow fs-4"></i></div>
          <h3 class="font-heading fw-bold h5">Long-Term Builders</h3>
          <p class="small text-muted">Scalable income streams</p>
          <ul class="list-unstyled small mb-3">
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Print-on-demand</li>
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Affiliate marketing</li>
            <li class="mb-1"><span class="d-inline-block rounded-circle bg-hf-primary me-2" style="width:6px;height:6px"></span>Digital products</li>
          </ul>
          <a href="/side-hustles" class="small fw-medium text-hf-primary text-decoration-none">Explore <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Free Resources -->
<section class="bg-hero-gradient text-white py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <h2 class="font-heading fw-bold display-6">Free Resources</h2>
      <p class="text-white-50">Everything you need to manage money and build income</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 rounded-3" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1)">
          <div class="icon-box mb-3" style="background:rgba(26,138,92,0.3)"><i class="bi bi-download text-white"></i></div>
          <h3 class="font-heading fw-bold h5">Downloadables</h3>
          <ul class="list-unstyled small text-white-50">
            <li class="mb-1"><i class="bi bi-chevron-right text-hf-primary me-1" style="color:#2ec27e!important"></i>Budget templates</li>
            <li class="mb-1"><i class="bi bi-chevron-right text-hf-primary me-1" style="color:#2ec27e!important"></i>Price lists</li>
            <li class="mb-1"><i class="bi bi-chevron-right text-hf-primary me-1" style="color:#2ec27e!important"></i>Contract templates</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 rounded-3" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1)">
          <div class="icon-box mb-3" style="background:rgba(26,138,92,0.3)"><i class="bi bi-book text-white"></i></div>
          <h3 class="font-heading fw-bold h5">Guides</h3>
          <ul class="list-unstyled small text-white-50">
            <li class="mb-1"><i class="bi bi-chevron-right me-1" style="color:#2ec27e!important"></i>Debt-free journey</li>
            <li class="mb-1"><i class="bi bi-chevron-right me-1" style="color:#2ec27e!important"></i>Tax basics</li>
            <li class="mb-1"><i class="bi bi-chevron-right me-1" style="color:#2ec27e!important"></i>Negotiation scripts</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 rounded-3" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1)">
          <div class="icon-box mb-3" style="background:rgba(26,138,92,0.3)"><i class="bi bi-calculator text-white"></i></div>
          <h3 class="font-heading fw-bold h5">Calculators</h3>
          <ul class="list-unstyled small text-white-50">
            <li class="mb-1"><i class="bi bi-chevron-right me-1" style="color:#2ec27e!important"></i>Side hustle ROI</li>
            <li class="mb-1"><i class="bi bi-chevron-right me-1" style="color:#2ec27e!important"></i>Debt payoff</li>
            <li class="mb-1"><i class="bi bi-chevron-right me-1" style="color:#2ec27e!important"></i>Investment growth</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="/resources" class="btn btn-hf-primary btn-lg">Browse All Resources <i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- Blog Preview -->
<section class="py-5">
  <div class="container py-4">
    @php
      $postItems = collect(method_exists($posts, 'items') ? $posts->items() : $posts);
      if ($postItems->isEmpty()) {
          $postItems = collect([
              (object) ['title' => 'The 50/30/20 Budget Rule Explained Simply', 'slug' => 'the-50-30-20-budget-rule-explained-simply', 'excerpt' => 'A simple framework for splitting income between needs, wants, and future goals.', 'category' => (object) ['name' => 'Personal Finance']],
              (object) ['title' => '5 Side Hustles You Can Start This Weekend', 'slug' => '5-side-hustles-you-can-start-this-weekend', 'excerpt' => 'Low-friction ideas you can test quickly with practical setup notes.', 'category' => (object) ['name' => 'Side Hustles']],
              (object) ['title' => 'Debt Snowball vs Avalanche: Which Is Right for You?', 'slug' => 'debt-snowball-vs-avalanche-which-is-right-for-you', 'excerpt' => 'Compare two popular payoff methods and choose the one you will keep using.', 'category' => (object) ['name' => 'Debt Management']],
          ]);
      }
    @endphp
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
      <div>
        <h2 class="font-heading fw-bold display-6 mb-1">Latest Blog Articles</h2>
        <p class="text-muted mb-0">Guides and ideas you can put to work today</p>
      </div>
      <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">View Blog <i class="bi bi-chevron-right"></i></a>
    </div>
    <div class="row g-4">
      @foreach ($postItems->take(3) as $post)
        <div class="col-md-4">
          <a href="{{ route('blog.show', $post->slug) }}" class="card-hf d-block p-4 h-100 text-decoration-none">
            <span class="small fw-medium text-hf-primary">{{ $post->category?->name ?? 'Personal Finance' }}</span>
            <h3 class="font-heading fw-bold h5 text-dark mt-2">{{ $post->title }}</h3>
            <p class="small text-muted mb-3">{{ \Illuminate\Support\Str::limit($post->excerpt ?? '', 120) }}</p>
            <span class="small fw-medium text-hf-primary">Read Article <i class="bi bi-arrow-right"></i></span>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <h2 class="font-heading fw-bold display-6">What Our Community Says</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card-hf p-4 h-100">
          <div class="mb-3"><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i></div>
          <p class="small mb-4">"I paid off $5,000 in debt using the budgeting tools and side hustle guides. Life-changing!"</p>
          <p class="font-heading fw-semibold mb-0">Sarah M.</p>
          <p class="small text-muted">Freelance Writer</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-hf p-4 h-100">
          <div class="mb-3"><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i></div>
          <p class="small mb-4">"The hustle finder tool matched me perfectly. I'm now earning an extra $800/month on weekends."</p>
          <p class="font-heading fw-semibold mb-0">James R.</p>
          <p class="small text-muted">Delivery Driver</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-hf p-4 h-100">
          <div class="mb-3"><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i><i class="bi bi-star-fill star-filled"></i></div>
          <p class="small mb-4">"The free templates saved me hours. I launched my VA business in under a week!"</p>
          <p class="font-heading fw-semibold mb-0">Maria L.</p>
          <p class="small text-muted">Virtual Assistant</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section id="newsletter" class="py-5" style="background:#f5f3ef">
  <div class="container py-4">
    <div class="text-center mx-auto" style="max-width:560px">
      <div class="icon-box-xl bg-gradient-primary text-white mx-auto mb-4"><i class="bi bi-envelope-fill fs-3"></i></div>
      <h2 class="font-heading fw-bold">Stay Ahead of the Game</h2>
      <p class="text-muted mb-4">Get weekly tips on personal finance and side hustles delivered to your inbox.</p>
      <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
        <input type="email" class="form-control form-control-hf" placeholder="Enter your email" style="max-width:320px">
        <button class="btn btn-hf-primary">Subscribe</button>
      </div>
    </div>
  </div>
</section>

@endsection
