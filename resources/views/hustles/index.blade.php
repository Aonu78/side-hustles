@extends('layouts.app')

@section('title', 'Side Hustles')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Side Hustles</h1>
        </div>
        <div class="col-md-4">
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search hustles..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse ($hustles as $hustle)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('hustles.show', $hustle->slug) }}" class="text-decoration-none">
                                {{ $hustle->name }}
                            </a>
                        </h5>
                        <p class="card-text">{{ Str::limit($hustle->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">${{ number_format($hustle->revenue_potential, 0) }}/mo</span>
                            <span class="badge bg-warning">{{ ucfirst($hustle->effort_level) }}</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted">{{ $hustle->category->name }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No hustles found matching your search. <a href="/admin/hustles/create">Admin can add hustles.</a>
                </div>
            </div>
        @endforelse
    </div>

    {{ $hustles->appends(request()->query())->links() }}
</div>
@endsection

