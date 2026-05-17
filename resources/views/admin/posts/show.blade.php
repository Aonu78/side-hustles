@extends('layouts.admin')

@section('title', $post->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1>{{ $post->title }}</h1>
        <p class="text-muted mb-0">
            Category: {{ $post->category?->name ?? 'Uncategorized' }} | 
            Created: {{ $post->created_at->format('Y-m-d') }}
            @if ($post->published_at)
                | Published: {{ $post->published_at->format('Y-m-d') }}
                @if ($post->views)
                    | Views: {{ number_format($post->views) }}
                @endif
            @else
                | Draft
            @endif
        </p>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-outline-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="d-inline" onsubmit="return confirm('Delete this post?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-list"></i> All Posts
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>Excerpt</h5>
                <p class="lead">{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 150) }}</p>
                
                <hr>
                
                <h5>Content</h5>
                <div class="post-content">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Post Info</h6>
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> 
                    @if ($post->published_at)
                        <span class="badge bg-success">Published</span>
                    @else
                        <span class="badge bg-warning">Draft</span>
                    @endif
                </p>
                <p><strong>User:</strong> {{ $post->user?->name ?? 'Unknown' }}</p>
                <p><strong>Views:</strong> {{ number_format($post->views ?? 0) }}</p>
                <p><strong>Slug:</strong> {{ $post->slug }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

