<?php

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Post;
    public function search(string $query, int $perPage = 12): LengthAwarePaginator;
    public function getByCategory(int $categoryId, int $perPage = 12): LengthAwarePaginator;
}

