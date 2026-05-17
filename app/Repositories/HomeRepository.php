<?php

namespace App\Repositories;

use App\Contracts\HomeRepositoryInterface;
use App\Models\Hustle;
use App\Models\Tool;
use App\Models\Post;
use App\Models\Resource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HomeRepository implements HomeRepositoryInterface
{
    public function getFeaturedHustles(int $limit = 6): LengthAwarePaginator
    {
        return Hustle::with('category')
            ->orderBy('revenue_potential', 'desc')
            ->paginate($limit);
    }

    public function getSideHustles(): Collection
    {
        return Hustle::with('category')
            ->orderBy('revenue_potential', 'desc')
            ->get();
    }

    public function getFeaturedTools(int $limit = 6): LengthAwarePaginator
    {
        return Tool::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    public function getRecentPosts(int $limit = 6): LengthAwarePaginator
    {
        return Post::with(['category', 'user'])
            ->published()
            ->paginate($limit);
    }

    public function getFeaturedResources(int $limit = 6): LengthAwarePaginator
    {
        return Resource::with('category')
            ->orderBy('downloads_count', 'desc')
            ->paginate($limit);
    }

    public function adminStats(): array
    {
        return [
            'posts' => Post::count(),
            'tools' => Tool::count(),
            'hustles' => Hustle::count(),
            'resources' => Resource::count(),
        ];
    }
}

