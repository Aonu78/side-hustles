@extends('layouts.app')

@section('title', $post->title)

@section('content')
<section class="bg-hero-gradient text-white py-5">
    <div class="container">
        <a href="{{ route('blog.index') }}" class="small text-white-50 text-decoration-none d-inline-flex align-items-center gap-1 mb-3">
            <i class="bi bi-arrow-left"></i> Back to Blog
        </a>
        <h1 class="font-heading fw-bold display-6 mb-3">{{ $post->title }}</h1>
        <p class="text-white-50 mb-0">
            By {{ $post->user->name ?? 'Guest' }}
            in {{ $post->category?->name ?? 'Personal Finance' }}
            @if (!empty($post->published_at))
                | {{ $post->published_at->format('M d, Y') }}
            @endif
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 860px;">
        <article class="card-hf p-4 p-md-5">
            <div class="mb-4">
                {!! $post->content !!}
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('finance-tools.index') }}" class="btn btn-hf-primary">Use Finance Tools</a>
                <a href="{{ route('resources.index') }}" class="btn btn-outline-secondary">Browse Resources</a>
            </div>
        </article>
    </div>
</section>
@endsection
