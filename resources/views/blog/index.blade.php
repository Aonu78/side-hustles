@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog</h1>
    
    @if (request('search'))
        <p>Search results for: "{{ request('search') }}"</p>
    @endif
    
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Search posts..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>

    @forelse ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                </h5>
                <p class="card-text">{{ Str::limit($post->excerpt, 150) }}</p>
                <p class="text-muted">
                    By {{ $post->user->name ?? 'Guest' }} in {{ $post->category->name }}
                    | {{ $post->views }} views
                </p>
            </div>
        </div>
    @empty
        <p>No posts found.</p>
    @endforelse

    {{ $posts->links() }}
</div>
@endsection

