@extends('layouts.admin')

@section('title', $resource->title)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1>{{ $resource->title }}</h1>
        <p class="text-muted mb-0">
            Category: {{ $resource->category?->name ?? 'Uncategorized' }} |
            Created: {{ $resource->created_at->format('Y-m-d') }}
        </p>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ route('admin.resources.edit', $resource) }}" class="btn btn-outline-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form method="POST" action="{{ route('admin.resources.destroy', $resource) }}" class="d-inline" onsubmit="return confirm('Delete this resource?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
        <a href="{{ route('admin.resources.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-list"></i> All Resources
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>Resource Path</h5>
                <p class="mb-0"><code>{{ $resource->file_path }}</code></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Resource Info</h6>
            </div>
            <div class="card-body">
                <p><strong>Category:</strong> {{ $resource->category?->name ?? 'Uncategorized' }}</p>
                <p><strong>Downloads:</strong> {{ number_format($resource->downloads_count) }}</p>
                <p><strong>Slug:</strong> {{ $resource->slug }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
