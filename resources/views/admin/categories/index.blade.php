@extends('layouts.admin')

@section('title', 'Categories')

@section('pageTitle', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Categories</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn bg-gradient-primary btn-sm mb-0">
        <i class="fas fa-plus me-1"></i> New Category
    </a>
</div>

<form method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-5">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary mb-0" type="submit">Search</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary mb-0">Clear</a>
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
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Created</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td class="ps-4">
                            <p class="text-sm font-weight-bold mb-0">{{ $category->name }}</p>
                            <p class="text-xs text-secondary mb-0">{{ $category->slug }}</p>
                        </td>
                        <td>
                            <p class="text-sm mb-0">{{ Str::limit($category->description ?: 'No description', 60) }}</p>
                        </td>
                        <td class="text-center">
                            <span class="text-secondary text-sm">{{ $category->created_at->format('Y-m-d') }}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-outline-primary mb-0">View</a>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-secondary mb-0">Edit</a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mb-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No categories found. <a href="{{ route('admin.categories.create') }}">Create one</a>.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center px-4 py-3">
            <p class="mb-0">Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} results</p>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
