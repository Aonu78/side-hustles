@extends('layouts.admin')

@section('title', 'New Resource')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>New Resource</h1>
    <a href="{{ route('admin.resources.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
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

<form method="POST" action="{{ route('admin.resources.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Resource Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Path <span class="text-danger">*</span></label>
                        <input type="text" name="file_path" class="form-control @error('file_path') is-invalid @enderror" value="{{ old('file_path') }}" placeholder="downloads/budget-template.xlsx" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Meta</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Downloads Count</label>
                        <input type="number" name="downloads_count" class="form-control @error('downloads_count') is-invalid @enderror" value="{{ old('downloads_count', 0) }}" min="0">
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100">Create Resource</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
