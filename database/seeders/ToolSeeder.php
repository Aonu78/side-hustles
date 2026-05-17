<?php

namespace Database\Seeders;

use App\Models\Tool;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            [
                'name' => 'Mortgage Calculator',
                'category_id' => Category::where('slug', 'finance-calculators')->first()->id,
                'description' => 'Calculate monthly mortgage payments based on loan amount, interest rate, and term.',
                'calculator_logic' => [
                    'type' => 'mortgage',
                    'formula' => 'P * (r(1+r)^n) / ((1+r)^n - 1)',
                    'fields' => ['principal', 'rate', 'term_years']
                ]
            ],
            [
                'name' => 'Compound Interest Calculator',
                'category_id' => Category::where('slug', 'investments')->first()->id,
                'description' => 'Calculate future value of investments with compound interest.',
                'calculator_logic' => [
                    'type' => 'compound',
                    'formula' => 'P(1 + r/n)^(nt)',
                    'fields' => ['principal', 'rate', 'compound_periods', 'time_years']
                ]
            ],
            [
                'name' => 'Budget Planner',
                'category_id' => Category::where('slug', 'budgeting')->first()->id,
                'description' => 'Plan your monthly budget and track expenses.',
                'calculator_logic' => [
                    'type' => 'budget',
                    'fields' => ['income', 'fixed_expenses', 'variable_expenses', 'savings_goal']
                ]
            ],
            [
                'name' => 'Loan Amortization',
                'category_id' => Category::where('slug', 'debt-management')->first()->id,
                'description' => 'View loan amortization schedule.',
                'calculator_logic' => [
                    'type' => 'amortization',
                    'fields' => ['loan_amount', 'interest_rate', 'loan_term']
                ]
            ],
            [
                'name' => 'Retirement Savings',
                'category_id' => Category::where('slug', 'retirement')->first()->id,
                'description' => 'Estimate retirement savings needed.',
                'calculator_logic' => [
                    'type' => 'retirement',
                    'fields' => ['current_age', 'retirement_age', 'current_savings', 'monthly_contribution', 'expected_return']
                ]
            ],
        ];

        foreach ($tools as $toolData) {
            Tool::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($toolData['name'])],
                $toolData
            );
        }
    }
}

