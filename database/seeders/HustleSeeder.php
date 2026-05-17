<?php

namespace Database\Seeders;

use App\Models\Hustle;
use App\Models\HustleCategory;
use Illuminate\Database\Seeder;

class HustleSeeder extends Seeder
{
    public function run(): void
    {
        $hustles = [
            [
                'name' => 'Freelance Writing',
                'hustle_category_id' => HustleCategory::where('slug', 'freelancing')->first()->id,
                'description' => 'Write articles, blog posts, and copy for clients on platforms like Upwork.',
                'revenue_potential' => 3000,
                'effort_level' => 'medium'
            ],
            [
                'name' => 'YouTube Channel',
                'hustle_category_id' => HustleCategory::where('slug', 'content-creation')->first()->id,
                'description' => 'Create videos on niche topics and monetize through ads and sponsorships.',
                'revenue_potential' => 5000,
                'effort_level' => 'high'
            ],
            [
                'name' => 'Dropshipping Store',
                'hustle_category_id' => HustleCategory::where('slug', 'e-commerce')->first()->id,
                'description' => 'Sell products online without inventory using Shopify and Oberlo.',
                'revenue_potential' => 8000,
                'effort_level' => 'medium'
            ],
            [
                'name' => 'Online Tutoring',
                'hustle_category_id' => HustleCategory::where('slug', 'tutoring')->first()->id,
                'description' => 'Teach subjects or skills via Zoom on platforms like Tutor.com.',
                'revenue_potential' => 2500,
                'effort_level' => 'low'
            ],
            [
                'name' => 'Affiliate Marketing',
                'hustle_category_id' => HustleCategory::where('slug', 'online-business')->first()->id,
                'description' => 'Promote products via blog or social media and earn commissions.',
                'revenue_potential' => 4000,
                'effort_level' => 'medium'
            ],
        ];

        foreach ($hustles as $hustleData) {
            Hustle::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($hustleData['name'])],
                $hustleData
            );
        }
    }
}

