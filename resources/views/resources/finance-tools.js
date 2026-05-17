const categories = [
  { name: "Housing", amount: 1500, color: "#1a8a5c" },
  { name: "Food", amount: 500, color: "#f5a623" },
  { name: "Transport", amount: 300, color: "#e0f5ec" },
  { name: "Utilities", amount: 200, color: "#e5e7eb" },
  { name: "Entertainment", amount: 150, color: "rgba(26,138,92,0.6)" },
  { name: "Savings", amount: 350, color: "rgba(245,166,35,0.6)" },
];

function renderBudget() {
  const income = parseInt(document.getElementById("income").value) || 0;
  const total = categories.reduce((s, c) => s + c.amount, 0);
  const remaining = income - total;
  let html = "";
  categories.forEach(c => {
    const pct = income > 0 ? (c.amount / income * 100) : 0;
    html += `<div class="d-flex align-items-center justify-content-between mb-2">
      <span class="small">${c.name}</span>
      <div class="d-flex align-items-center gap-2">
        <div class="progress-hf" style="width:128px"><div class="bar" style="width:${pct}%;background:${c.color}"></div></div>
        <span class="small fw-medium text-end" style="width:60px">$${c.amount}</span>
      </div>
    </div>`;
  });
  document.getElementById("budgetBars").innerHTML = html;
  const el = document.getElementById("remaining");
  el.textContent = "$" + remaining;
  el.className = remaining >= 0 ? "fw-bold text-hf-primary" : "fw-bold text-danger";
}

function calcSavings() {
  const goal = parseInt(document.getElementById("savingsGoal").value) || 1;
  const monthly = parseInt(document.getElementById("monthlySave").value) || 1;
  const months = Math.ceil(goal / monthly);
  document.getElementById("savingsResult").textContent = months + " months";
  document.getElementById("savingsYears").textContent = "(" + (months / 12).toFixed(1) + " years)";
}

function calcDebt() {
  const debt = parseInt(document.getElementById("debtAmount").value) || 1;
  const payment = parseInt(document.getElementById("debtPayment").value) || 1;
  const months = Math.ceil(debt / payment);
  document.getElementById("debtResult").textContent = months + " months";
  document.getElementById("debtYears").textContent = "(" + (months / 12).toFixed(1) + " years)";
}

document.getElementById("income").addEventListener("input", renderBudget);
document.getElementById("savingsGoal").addEventListener("input", calcSavings);
document.getElementById("monthlySave").addEventListener("input", calcSavings);
document.getElementById("debtAmount").addEventListener("input", calcDebt);
document.getElementById("debtPayment").addEventListener("input", calcDebt);

renderBudget();
calcSavings();
calcDebt();
