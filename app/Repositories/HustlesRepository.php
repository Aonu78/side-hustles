<?php

namespace App\Repositories;

use App\Contracts\HustlesRepositoryInterface;
use App\Models\Hustle;
use Illuminate\Pagination\LengthAwarePaginator;

class HustlesRepository implements HustlesRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator
    {
        return Hustle::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Hustle
    {
        return Hustle::with('category')
            ->where('slug', $slug)
            ->first();
    }

    public function search(string $query, $categorySlug = null, int $perPage = 12): LengthAwarePaginator
    {
        $queryBuilder = Hustle::with('category')
            ->where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%");

        if ($categorySlug) {
            $queryBuilder->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        return $queryBuilder->paginate($perPage);
    }
}

