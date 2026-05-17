@extends('layouts.app')

@section('title', 'Finance Tools')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Finance Tools</h1>
        </div>
    </div>

    <div class="row">
        @forelse ($tools as $tool)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('finance-tools.show', $tool->slug) }}">{{ $tool->name }}</a>
                        </h5>
                        <p class="card-text">{{ Str::limit($tool->description, 120) }}</p>
                        <p class="text-muted">{{ $tool->category->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No finance tools available yet. <a href="/admin">Admin can add tools.</a>
                </div>
            </div>
        @endforelse
    </div>

    {{ $tools->links() }}
</div>
@endsection

