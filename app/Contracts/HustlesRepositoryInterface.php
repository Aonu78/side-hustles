<?php

namespace App\Contracts;

use App\Models\Hustle;
use Illuminate\Pagination\LengthAwarePaginator;

interface HustlesRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Hustle;
    public function search(string $query, string $categorySlug = null, int $perPage = 12): LengthAwarePaginator;
}

