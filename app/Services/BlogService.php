<?php

namespace App\Services;

use App\Contracts\BlogRepositoryInterface;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;

class BlogService
{
    public function __construct(
        private BlogRepositoryInterface $repository
    ) {}

    public function index(int $perPage = 12)
    {
        return $this->repository->allPaginated($perPage);
    }

    public function show(string $slug)
    {
        $post = $this->repository->findBySlug($slug);
        if ($post) {
            $post->increment('views');
        }
        return $post;
    }

    public function search(string $query, int $perPage = 12)
    {
        return $this->repository->search($query, $perPage);
    }

    public function create(PostStoreRequest $request): Post
    {
        return Post::create($request->validated());
    }

    public function update(Post $post, PostStoreRequest $request): bool
    {
        return $post->update($request->validated());
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }
}

