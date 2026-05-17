<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $resources = [
            [
'title' => 'Personal Finance Excel Templates',
                'category_id' => Category::where('slug', 'budgeting')->first()->id,
// 'description' => 'Free Excel templates for budgeting, debt payoff, and net worth tracking.',
                'file_path' => 'resources/templates/budget-tracker.xlsx'
            ],
            [
                'title' => 'Side Hustle Idea Generator PDF',
                'category_id' => Category::where('slug', 'online-business')->first()->id,
                // 'description' => '100+ side hustle ideas with startup costs and potential earnings.',
                'file_path' => 'resources/ideas/side-hustle-ideas.pdf'
            ],
            [
                'title' => 'Freelancing Contracts Template',
                'category_id' => Category::where('slug', 'freelancing')->first()->id,
                // 'description' => 'Professional contract templates for freelancers.',
                'file_path' => 'resources/templates/freelance-contract.docx'
            ],
            [
                'title' => 'Investment Tracking Spreadsheet',
                'category_id' => Category::where('slug', 'investments')->first()->id,
                // 'description' => 'Google Sheets template to track investment portfolio performance.',
                'file_path' => 'resources/templates/investment-tracker.xlsx'
            ],
            [
                'title' => 'Retirement Planning Workbook',
                'category_id' => Category::where('slug', 'retirement')->first()->id,
                // 'description' => 'Comprehensive workbook for retirement planning.',
                'file_path' => 'resources/workbooks/retirement-planner.xlsx'
            ],
        ];

        foreach ($resources as $resourceData) {
            Resource::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($resourceData['title'])],
                $resourceData
            );
        }
    }
}

