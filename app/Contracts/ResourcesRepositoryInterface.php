<?php

namespace App\Contracts;

use App\Models\Resource;
use Illuminate\Pagination\LengthAwarePaginator;

interface ResourcesRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Resource;
    public function getByCategory(int $categoryId, int $perPage = 12): LengthAwarePaginator;
}

