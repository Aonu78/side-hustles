@extends('layouts.app')

@section('title', $hustle->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <article class="card shadow-sm">
                <div class="card-body">
                    <h1 class="mb-4">{{ $hustle->name }}</h1>
                    
                    <div class="mb-4">
                        <span class="badge bg-success fs-6 me-2">${{ number_format($hustle->revenue_potential, 0) }}/month</span>
                        <span class="badge bg-warning fs-6">{{ ucfirst($hustle->effort_level) }} effort</span>
                    </div>
                    
                    <p class="lead">{{ $hustle->category->name }}</p>
                    
                    <div class="mb-4">
                        {!! nl2br(e($hustle->description)) !!}
                    </div>
                </div>
            </article>
        </div>
        
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0"><i class="bi bi-lightning-charge me-2"></i>Quick Stats</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Revenue Potential</span>
                            <strong>${{ number_format($hustle->revenue_potential, 0) }}/mo</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Effort Level</span>
                            <span class="badge bg-{{ $hustle->effort_level == 'low' ? 'success' : ($hustle->effort_level == 'medium' ? 'warning' : 'danger') }}">
                                {{ ucfirst($hustle->effort_level) }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Category</span>
                            <span>{{ $hustle->category->name }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0"><i class="bi bi-people me-2"></i>Similar Hustles</h6>
                    </div>
                    <div class="card-body">
                        @forelse ($similarHustles ?? [] as $similar)
                            <div class="d-flex mb-3 p-2 border-bottom">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $similar->name }}</h6>
                                    <small>${{ number_format($similar->revenue_potential, 0) }}/mo</small>
                                </div>
                                <a href="{{ route('hustles.show', $similar->slug) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </div>
                        @empty
                            <p class="text-muted">No similar hustles yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

