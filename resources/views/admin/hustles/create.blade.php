@extends('layouts.admin')

@section('title', 'New Hustle')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>New Side Hustle</h1>
    <a href="{{ route('admin.hustles.index') }}" class="btn btn-secondary">
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

<form method="POST" action="{{ route('admin.hustles.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Hustle Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="8" required>{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Publishing Info</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="hustle_category_id" class="form-select @error('hustle_category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('hustle_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Revenue Potential <span class="text-danger">*</span></label>
                        <input type="number" name="revenue_potential" class="form-control @error('revenue_potential') is-invalid @enderror" value="{{ old('revenue_potential') }}" min="0" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Effort Level <span class="text-danger">*</span></label>
                        <select name="effort_level" class="form-select @error('effort_level') is-invalid @enderror" required>
                            <option value="">Select Effort Level</option>
                            <option value="low" {{ old('effort_level') === 'low' ? 'selected' : '' }}>Easy</option>
                            <option value="medium" {{ old('effort_level') === 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('effort_level') === 'high' ? 'selected' : '' }}>Advanced</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100">Create Hustle</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
