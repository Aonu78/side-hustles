<?php

namespace Database\Seeders;

use App\Models\HustleCategory;
use Illuminate\Database\Seeder;

class HustleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Online Business', 'slug' => 'online-business'],
            ['name' => 'Freelancing', 'slug' => 'freelancing'],
            ['name' => 'Content Creation', 'slug' => 'content-creation'],
            ['name' => 'Local Services', 'slug' => 'local-services'],
            ['name' => 'E-commerce', 'slug' => 'e-commerce'],
            ['name' => 'Tutoring', 'slug' => 'tutoring'],
        ];

        foreach ($categories as $cat) {
            HustleCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}

