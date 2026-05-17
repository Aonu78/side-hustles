<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(
        private BlogRepository $blogRepository
    ) {}

    public function index(Request $request)
    {
        $posts = Post::with('category')->latest()->paginate(10);
        if ($search = $request->get('search')) {
            $posts = Post::with('category')
                ->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%")
                ->latest()
                ->paginate(10);
        }
        $posts->appends($request->query());
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        $this->blogRepository->create($request->validated());
        return redirect()->route('admin.posts.index')->with('success', 'Post created.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostStoreRequest $request, Post $post)
    {
        $this->blogRepository->update($post, $request->validated());
        return redirect()->route('admin.posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $this->blogRepository->delete($post);
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}

