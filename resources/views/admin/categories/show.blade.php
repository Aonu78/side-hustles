@extends('layouts.admin')

@section('title', $category->name)

@section('pageTitle', 'Category Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1>{{ $category->name }}</h1>
        <p class="text-sm text-secondary mb-0">Slug: {{ $category->slug }}</p>
    </div>
    <div class="btn-group btn-group-sm">
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-primary mb-0">Edit</a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary mb-0">All Categories</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Description</h6>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $category->description ?: 'No description provided.' }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Usage</h6>
            </div>
            <div class="card-body">
                <p><strong>Posts:</strong> {{ $category->posts_count }}</p>
                <p><strong>Tools:</strong> {{ $category->tools_count }}</p>
                <p><strong>Resources:</strong> {{ $category->resources_count }}</p>
                <p><strong>Created:</strong> {{ $category->created_at->format('Y-m-d') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
