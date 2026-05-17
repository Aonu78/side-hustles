@extends('layouts.admin')

@section('title', $hustle->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1>{{ $hustle->name }}</h1>
        <p class="text-muted mb-0">
            Category: {{ $hustle->category?->name ?? 'Uncategorized' }} |
            Created: {{ $hustle->created_at->format('Y-m-d') }}
        </p>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ route('admin.hustles.edit', $hustle) }}" class="btn btn-outline-primary">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form method="POST" action="{{ route('admin.hustles.destroy', $hustle) }}" class="d-inline" onsubmit="return confirm('Delete this hustle?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
        <a href="{{ route('admin.hustles.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-list"></i> All Hustles
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>Description</h5>
                <p class="mb-0">{!! nl2br(e($hustle->description)) !!}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Hustle Info</h6>
            </div>
            <div class="card-body">
                <p><strong>Category:</strong> {{ $hustle->category?->name ?? 'Uncategorized' }}</p>
                <p><strong>Effort Level:</strong>
                    @if ($hustle->effort_level === 'low')
                        Easy
                    @elseif ($hustle->effort_level === 'medium')
                        Medium
                    @else
                        Advanced
                    @endif
                </p>
                <p><strong>Revenue Potential:</strong> ${{ number_format($hustle->revenue_potential, 2) }}/mo</p>
                <p><strong>Slug:</strong> {{ $hustle->slug }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
