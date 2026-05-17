@extends('layouts.admin')

@section('title', 'Resources')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Resources</h1>
    <a href="{{ route('admin.resources.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Resource
    </a>
</div>

<form method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-5">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="search" class="form-control" placeholder="Search resources..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary mb-0" type="submit">Search</button>
                <a href="{{ route('admin.resources.index') }}" class="btn btn-outline-secondary mb-0">Clear</a>
            </div>
        </div>
    </div>
</form>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Downloads</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($resources as $resource)
                    <tr>
                        <td>{{ Str::limit($resource->title, 40) }}</td>
                        <td>{{ $resource->category?->name ?? 'Uncategorized' }}</td>
                        <td>{{ number_format($resource->downloads_count) }}</td>
                        <td>{{ $resource->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.resources.show', $resource) }}" class="btn btn-outline-primary">View</a>
                                <a href="{{ route('admin.resources.edit', $resource) }}" class="btn btn-outline-secondary">Edit</a>
                                <form method="POST" action="{{ route('admin.resources.destroy', $resource) }}" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No resources found. <a href="{{ route('admin.resources.create') }}">Create one</a>.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between">
            <p>Showing {{ $resources->firstItem() ?? 0 }} to {{ $resources->lastItem() ?? 0 }} of {{ $resources->total() }} results</p>
            {{ $resources->links() }}
        </div>
    </div>
</div>
@endsection

