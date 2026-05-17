<?php

namespace App\Repositories;

use App\Contracts\BlogRepositoryInterface;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class BlogRepository implements BlogRepositoryInterface
{
    public function allPaginated(int $perPage = 12): LengthAwarePaginator
    {
        return Post::with(['category', 'user'])
            ->published()
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Post
    {
        return Post::with(['category', 'user'])
            ->published()
            ->where('slug', $slug)
            ->first();
    }

    public function search(string $query, int $perPage = 12): LengthAwarePaginator
    {
        return Post::with(['category', 'user'])
            ->published()
            ->where(function (Builder $builder) use ($query) {
                $builder
                    ->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            })
            ->paginate($perPage);
    }

    public function getByCategory(int $categoryId, int $perPage = 12): LengthAwarePaginator
    {
        return Post::with(['category', 'user'])
            ->published()
            ->where('category_id', $categoryId)
            ->paginate($perPage);
    }
}

