@extends('layouts.admin')

@section('title', 'Edit Category')

@section('pageTitle', 'Edit Category')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit {{ $category->name }}</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm mb-0">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.categories.update', $category) }}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $category->description) }}</textarea>
            </div>
            <button type="submit" class="btn bg-gradient-primary btn-sm mb-0">Update Category</button>
        </div>
    </div>
</form>
@endsection
