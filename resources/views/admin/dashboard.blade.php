@extends('layouts.admin')

@section('title', 'Dashboard')

@section('pageTitle', 'Dashboard Overview')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Blog Posts</p>
                            <h5 class="font-weight-bolder mb-0">{{ $stats['posts'] ?? 0 }}</h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="fas fa-newspaper text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Finance Tools</p>
                            <h5 class="font-weight-bolder mb-0">{{ $stats['tools'] ?? 0 }}</h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                            <i class="fas fa-calculator text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Side Hustles</p>
                            <h5 class="font-weight-bolder mb-0">{{ $stats['hustles'] ?? 0 }}</h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                            <i class="fas fa-bolt text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Resources</p>
                            <h5 class="font-weight-bolder mb-0">{{ $stats['resources'] ?? 0 }}</h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                            <i class="fas fa-download text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('admin.posts.create') }}" class="btn bg-gradient-primary btn-sm mb-0">New Post</a>
                    <a href="{{ route('admin.categories.create') }}" class="btn bg-gradient-dark btn-sm mb-0">New Category</a>
                    <a href="{{ route('admin.tools.create') }}" class="btn bg-gradient-success btn-sm mb-0">New Tool</a>
                    <a href="{{ route('admin.hustles.create') }}" class="btn bg-gradient-warning btn-sm mb-0">New Hustle</a>
                    <a href="{{ route('admin.resources.create') }}" class="btn bg-gradient-info btn-sm mb-0">New Resource</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Content Overview</h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                        <span>Posts</span>
                        <span class="badge bg-gradient-primary">{{ $stats['posts'] ?? 0 }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                        <span>Tools</span>
                        <span class="badge bg-gradient-success">{{ $stats['tools'] ?? 0 }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                        <span>Hustles</span>
                        <span class="badge bg-gradient-warning">{{ $stats['hustles'] ?? 0 }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-0">
                        <span>Resources</span>
                        <span class="badge bg-gradient-info">{{ $stats['resources'] ?? 0 }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

