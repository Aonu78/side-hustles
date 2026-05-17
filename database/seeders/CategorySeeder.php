<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Finance Calculators', 'slug' => 'finance-calculators', 'description' => 'Tools for financial calculations and planning.'],
            ['name' => 'Budgeting', 'slug' => 'budgeting', 'description' => 'Budget tracking and management tools.'],
            ['name' => 'Investments', 'slug' => 'investments', 'description' => 'Investment return and portfolio calculators.'],
            ['name' => 'Debt Management', 'slug' => 'debt-management', 'description' => 'Loan and debt repayment calculators.'],
            ['name' => 'Retirement', 'slug' => 'retirement', 'description' => 'Retirement savings and planning tools.'],
            ['name' => 'Online Business', 'slug' => 'online-business', 'description' => 'Side hustles involving online businesses.'],
            ['name' => 'Freelancing', 'slug' => 'freelancing', 'description' => 'Freelance and gig economy opportunities.'],
            ['name' => 'Content Creation', 'slug' => 'content-creation', 'description' => 'Blogging, YouTube, and content monetization.'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}

