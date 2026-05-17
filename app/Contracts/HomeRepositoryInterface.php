<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface HomeRepositoryInterface
{
    public function getFeaturedHustles(int $limit = 6): LengthAwarePaginator;
    public function getSideHustles(): Collection;
    public function getFeaturedTools(int $limit = 6): LengthAwarePaginator;
    public function getRecentPosts(int $limit = 6): LengthAwarePaginator;
    public function getFeaturedResources(int $limit = 6): LengthAwarePaginator;

    /**
     * Get admin dashboard stats
     */
    public function adminStats(): array;
}

