<?php

namespace App\Contracts;

use App\Models\Tool;
use Illuminate\Pagination\LengthAwarePaginator;

interface FinanceToolsRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Tool;
    public function getByCategory(int $categoryId, int $perPage = 12): LengthAwarePaginator;
}

