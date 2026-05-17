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
<!-- Header -->
<section class="bg-hero-gradient text-white py-5 container-hero">
  <div class="container">
    <h1 class="font-heading fw-bold display-5 mb-3">Smart Tools for Smarter Money Management</h1>
    <p class="text-white-50 fs-5" style="max-width:640px">Free interactive tools to take control of your finances</p>
  </div>
</section>

<!-- Budget Planner -->
<section class="py-5" id="budget-planner">
  <div class="container">
    <h2 class="font-heading fw-bold h3 mb-4 d-flex align-items-center gap-2">
      <div class="icon-box bg-emerald-light"><i class="bi bi-bar-chart-fill text-hf-primary"></i></div>
      Monthly Budget Planner
    </h2>
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card-hf p-4">
          <div class="mb-4">
            <label class="form-label small fw-medium">Monthly Income</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
              <input type="number" id="income" class="form-control form-control-hf" value="4000">
            </div>
          </div>
          <div id="budgetBars">
            <!-- JS populated -->
          </div>
          <hr>
          <div class="d-flex justify-content-between fw-medium">
            <span>Remaining</span>
            <span id="remaining" class="fw-bold text-hf-primary">$1,000</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- Savings Calculator -->
        <div class="card-hf p-4 mb-4" id="savings-calculator">
          <h3 class="font-heading fw-semibold h6 mb-3 d-flex align-items-center gap-2">
            <i class="bi bi-piggy-bank-fill text-hf-primary"></i> Savings Goal Calculator
          </h3>
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label small text-muted">Goal Amount</label>
              <input type="number" id="savingsGoal" class="form-control form-control-hf" value="10000">
            </div>
            <div class="col-6">
              <label class="form-label small text-muted">Monthly Savings</label>
              <input type="number" id="monthlySave" class="form-control form-control-hf" value="500">
            </div>
          </div>
          <div class="result-box bg-emerald-light">
            <p class="small text-muted mb-1">You'll reach your goal in</p>
            <p class="font-heading fw-bold fs-2 text-hf-primary mb-0" id="savingsResult">20 months</p>
            <p class="small text-muted mb-0" id="savingsYears">(1.7 years)</p>
          </div>
        </div>
        <!-- Debt Calculator -->
        <div class="card-hf p-4" id="debt-calculator">
          <h3 class="font-heading fw-semibold h6 mb-3 d-flex align-items-center gap-2">
            <i class="bi bi-bullseye text-hf-primary"></i> Debt Payoff Calculator
          </h3>
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label small text-muted">Total Debt</label>
              <input type="number" id="debtAmount" class="form-control form-control-hf" value="15000">
            </div>
            <div class="col-6">
              <label class="form-label small text-muted">Monthly Payment</label>
              <input type="number" id="debtPayment" class="form-control form-control-hf" value="400">
            </div>
          </div>
          <div class="result-box bg-gold-light">
            <p class="small text-muted mb-1">Debt-free in</p>
            <p class="font-heading fw-bold fs-2 text-hf-gold mb-0" id="debtResult">38 months</p>
            <p class="small text-muted mb-0" id="debtYears">(3.2 years)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Resource Downloads -->
<section class="py-5" style="background:#f5f3ef">
  <div class="container">
    <h2 class="font-heading fw-bold h3 mb-4">Resource Downloads</h2>
    <div class="row g-3">
      <div class="col-md-4">
        <a href="{{ route('resources.index') }}" class="card-hf p-4 d-flex gap-3 text-decoration-none h-100">
          <div class="icon-box bg-emerald-light flex-shrink-0"><i class="bi bi-download text-hf-primary"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Budget Worksheets</h3><p class="small text-muted mb-0">Printable monthly & weekly budget sheets</p></div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('resources.index') }}" class="card-hf p-4 d-flex gap-3 text-decoration-none h-100">
          <div class="icon-box bg-emerald-light flex-shrink-0"><i class="bi bi-download text-hf-primary"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Goal-Setting Templates</h3><p class="small text-muted mb-0">Financial goal planning templates</p></div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('resources.index') }}" class="card-hf p-4 d-flex gap-3 text-decoration-none h-100">
          <div class="icon-box bg-emerald-light flex-shrink-0"><i class="bi bi-download text-hf-primary"></i></div>
          <div><h3 class="font-heading fw-semibold h6 mb-1 text-dark">Bill Negotiation Checklist</h3><p class="small text-muted mb-0">Step-by-step bill reduction guide</p></div>
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const categories = [
    { name: 'Housing', amount: 1500, color: '#1a8a5c' },
    { name: 'Food', amount: 500, color: '#f5a623' },
    { name: 'Transport', amount: 300, color: '#8b5cf6' },
    { name: 'Utilities', amount: 200, color: '#0ea5e9' },
    { name: 'Entertainment', amount: 150, color: '#ef4444' },
    { name: 'Savings', amount: 350, color: '#14b8a6' }
  ];

  const incomeInput = document.getElementById('income');
  const budgetBars = document.getElementById('budgetBars');
  const remainingEl = document.getElementById('remaining');
  const money = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 });

  function renderBudgetRows() {
    budgetBars.innerHTML = categories.map(function (category, index) {
      return '<div class="budget-row mb-3" data-index="' + index + '">' +
        '<div class="d-flex align-items-center justify-content-between gap-3 mb-2">' +
          '<span class="small">' + category.name + '</span>' +
          '<div class="input-group input-group-sm" style="max-width: 130px">' +
            '<span class="input-group-text">$</span>' +
            '<input type="number" min="0" class="form-control budget-expense" value="' + category.amount + '" data-index="' + index + '">' +
          '</div>' +
        '</div>' +
        '<div class="progress-hf"><div class="bar" data-budget-bar="' + index + '" style="background:' + category.color + '"></div></div>' +
      '</div>';
    }).join('');
  }

  function updateBudget() {
    const income = Number(incomeInput.value) || 0;

    document.querySelectorAll('.budget-expense').forEach(function (input) {
      categories[Number(input.dataset.index)].amount = Math.max(0, Number(input.value) || 0);
    });

    const total = categories.reduce(function (sum, category) {
      return sum + category.amount;
    }, 0);

    categories.forEach(function (category, index) {
      const width = income > 0 ? Math.min(100, (category.amount / income) * 100) : 0;
      const bar = document.querySelector('[data-budget-bar="' + index + '"]');
      if (bar) bar.style.width = width + '%';
    });

    const remaining = income - total;
    remainingEl.textContent = money.format(remaining);
    remainingEl.className = remaining >= 0 ? 'fw-bold text-hf-primary' : 'fw-bold text-danger';
  }

  function calcSavings() {
    const goal = Number(document.getElementById('savingsGoal').value) || 0;
    const monthly = Number(document.getElementById('monthlySave').value) || 0;
    const result = document.getElementById('savingsResult');
    const years = document.getElementById('savingsYears');

    if (goal <= 0 || monthly <= 0) {
      result.textContent = 'Add numbers';
      years.textContent = 'Enter a goal and monthly savings amount.';
      return;
    }

    const months = Math.ceil(goal / monthly);
    result.textContent = months + ' months';
    years.textContent = '(' + (months / 12).toFixed(1) + ' years)';
  }

  function calcDebt() {
    const debt = Number(document.getElementById('debtAmount').value) || 0;
    const payment = Number(document.getElementById('debtPayment').value) || 0;
    const result = document.getElementById('debtResult');
    const years = document.getElementById('debtYears');

    if (debt <= 0 || payment <= 0) {
      result.textContent = 'Add numbers';
      years.textContent = 'Enter debt and monthly payment amounts.';
      return;
    }

    const months = Math.ceil(debt / payment);
    result.textContent = months + ' months';
    years.textContent = '(' + (months / 12).toFixed(1) + ' years)';
  }

  renderBudgetRows();
  updateBudget();
  calcSavings();
  calcDebt();

  incomeInput.addEventListener('input', updateBudget);
  budgetBars.addEventListener('input', function (event) {
    if (event.target.classList.contains('budget-expense')) updateBudget();
  });

  ['savingsGoal', 'monthlySave'].forEach(function (id) {
    document.getElementById(id).addEventListener('input', calcSavings);
  });

  ['debtAmount', 'debtPayment'].forEach(function (id) {
    document.getElementById(id).addEventListener('input', calcDebt);
  });
});
</script>
@endpush
