<?php

namespace App\Repositories;

use App\Contracts\FinanceToolsRepositoryInterface;
use App\Models\Tool;
use Illuminate\Pagination\LengthAwarePaginator;

class FinanceToolsRepository implements FinanceToolsRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator
    {
        return Tool::with('category')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Tool
    {
        return Tool::with('category')
            ->where('slug', $slug)
            ->first();
    }

    public function getByCategory(int $categoryId, int $perPage = 12): LengthAwarePaginator
    {
        return Tool::with('category')
            ->where('category_id', $categoryId)
            ->paginate($perPage);
    }
}

