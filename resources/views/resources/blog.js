const articles = [
  { title: "How I Paid Off $20,000 in Student Loans in 18 Months", category: "Success Stories", readTime: "10 min", excerpt: "A step-by-step breakdown of the strategies and sacrifices that led to financial freedom.", date: "Mar 15, 2025" },
  { title: "The 50/30/20 Budget Rule Explained Simply", category: "Personal Finance", readTime: "5 min", excerpt: "Master the most popular budgeting framework and customize it for your situation.", date: "Mar 12, 2025" },
  { title: "5 Side Hustles You Can Start This Weekend", category: "Side Hustles", readTime: "10 min", excerpt: "No experience needed — these hustles can have you earning by Monday.", date: "Mar 10, 2025" },
  { title: "Debt Snowball vs Avalanche: Which Is Right for You?", category: "Debt Management", readTime: "15+ min", excerpt: "A detailed comparison with real numbers to help you choose the best debt payoff strategy.", date: "Mar 8, 2025" },
  { title: "How to Build a $1,000 Emergency Fund in 30 Days", category: "Saving Strategies", readTime: "5 min", excerpt: "Practical tips to build your safety net fast, even on a tight budget.", date: "Mar 5, 2025" },
  { title: "The Psychology of Spending: Why We Buy What We Don't Need", category: "Money Mindset", readTime: "10 min", excerpt: "Understanding your spending triggers is the first step to controlling them.", date: "Mar 3, 2025" },
  { title: "From $0 to $3,000/Month: My Freelance Writing Journey", category: "Success Stories", readTime: "15+ min", excerpt: "How I built a sustainable freelance income while working full-time.", date: "Feb 28, 2025" },
  { title: "Tax Basics Every Side Hustler Must Know", category: "Personal Finance", readTime: "10 min", excerpt: "Don't let taxes catch you off guard — essential knowledge for extra income.", date: "Feb 25, 2025" },
];

let activeCat = "All", activeTime = "All";

function renderBlog() {
  const q = document.getElementById("blogSearch").value.toLowerCase();
  const filtered = articles.filter(a => {
    if (activeCat !== "All" && a.category !== activeCat) return false;
    if (activeTime !== "All" && a.readTime !== activeTime) return false;
    if (q && !a.title.toLowerCase().includes(q)) return false;
    return true;
  });
  let html = "";
  filtered.forEach(a => {
    html += `<div class="card-hf p-4 mb-3 d-flex align-items-center gap-3" style="cursor:pointer">
      <div class="icon-box bg-emerald-light flex-shrink-0 d-none d-md-flex"><i class="bi bi-book text-hf-primary"></i></div>
      <div class="flex-grow-1">
        <div class="d-flex gap-2 mb-1 small">
          <span class="fw-medium text-hf-primary">${a.category}</span>
          <span class="text-muted">• ${a.readTime} read</span>
          <span class="text-muted">• ${a.date}</span>
        </div>
        <h3 class="font-heading fw-semibold h6 mb-1">${a.title}</h3>
        <p class="small text-muted mb-0">${a.excerpt}</p>
      </div>
      <i class="bi bi-arrow-right text-hf-primary flex-shrink-0 d-none d-md-block"></i>
    </div>`;
  });
  document.getElementById("blogList").innerHTML = html || '<p class="text-muted">No articles found.</p>';
}

document.getElementById("blogSearch").addEventListener("input", renderBlog);
document.querySelectorAll("#blogCatFilters .filter-pill").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll("#blogCatFilters .filter-pill").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    activeCat = btn.dataset.cat;
    renderBlog();
  });
});
document.querySelectorAll("#blogTimeFilters .filter-pill").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll("#blogTimeFilters .filter-pill").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    activeTime = btn.dataset.time;
    renderBlog();
  });
});

renderBlog();
