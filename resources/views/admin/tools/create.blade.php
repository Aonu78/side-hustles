@extends('layouts.admin')

@section('title', 'New Tool')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>New Finance Tool</h1>
    <a href="{{ route('admin.tools.index') }}" class="btn btn-secondary">
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

<form method="POST" action="{{ route('admin.tools.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Tool Info</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Category</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach (\App\Models\Category::orderBy('name')->get() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Calculator Logic (JSON)</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">JSON Config (optional)</label>
                        <textarea name="calculator_logic" class="form-control @error('calculator_logic') is-invalid @enderror" rows="6" placeholder='{ "formula": "pmt = P * r * (1+r)^n / ((1+r)^n - 1)" }'>{{ old('calculator_logic') }}</textarea>
                        <div class="form-text">JSON object for tool logic/params. Used by frontend calculator.</div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100">Create Tool</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

