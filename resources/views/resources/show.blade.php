@extends('layouts.app')

@section('title', $resource->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <article class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h1 class="mb-3">{{ $resource->title }}</h1>
                    
                    <div class="mb-4">
                        <span class="badge bg-info fs-6 me-2">{{ $resource->category->name ?? 'General' }}</span>
                        <span class="badge bg-success fs-6">
                            <i class="bi bi-download me-1"></i>
                            {{ number_format($resource->downloads_count) }} downloads
                        </span>
                    </div>
                    
                    <div class="alert alert-info">
                        <h5><i class="bi bi-file-earmark-text me-2"></i>Resource Info</h5>
                        <p class="mb-0">Published {{ $resource->created_at->diffForHumans() }}</p>
                    </div>
                    
                    <div class="text-center my-5 py-5 bg-light rounded">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-3">Ready to Download?</h3>
                                <p class="lead mb-0">Get this valuable resource instantly.</p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('resources.download', $resource->slug) }}" class="btn btn-success btn-lg w-100">
                                    <i class="bi bi-download me-2"></i>
                                    Download Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h6 class="mb-0"><i class="bi bi-info-circle me-2"></i>About this Resource</h6>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Category</dt>
                            <dd class="col-sm-8">{{ $resource->category->name ?? 'Uncategorized' }}</dd>
                            
                            <dt class="col-sm-4">Size</dt>
                            <dd class="col-sm-8">Varies</dd>
                            
                            <dt class="col-sm-4">Downloads</dt>
                            <dd class="col-sm-8">{{ number_format($resource->downloads_count) }}</dd>
                        </dl>
                    </div>
                </div>
                
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0"><i class="bi bi-star me-2"></i>Popular Resources</h6>
                    </div>
                    <div class="card-body">
                        @forelse ($popularResources ?? [] as $popular)
                            <div class="d-flex align-items-center mb-3 p-2 hover-shadow">
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ Str::limit($popular->title, 40) }}</h6>
                                    <small class="text-muted">{{ number_format($popular->downloads_count) }} downloads</small>
                                </div>
                                <a href="{{ route('resources.show', $popular->slug) }}" class="btn btn-sm btn-outline-success">View</a>
                            </div>
                        @empty
                            <p class="text-muted text-center">No popular resources yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

