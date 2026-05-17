<?php

namespace App\Repositories;

use App\Contracts\ResourcesRepositoryInterface;
use App\Models\Resource;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourcesRepository implements ResourcesRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator
    {
        return Resource::with('category')
            ->orderBy('downloads_count', 'desc')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Resource
    {
        return Resource::with('category')
            ->where('slug', $slug)
            ->first();
    }

    public function getByCategory(int $categoryId, int $perPage = 12): LengthAwarePaginator
    {
        return Resource::with('category')
            ->where('category_id', $categoryId)
            ->paginate($perPage);
    }
}

