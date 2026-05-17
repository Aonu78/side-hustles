@extends('layouts.admin')

@section('title', 'Tools')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Finance Tools</h1>
    <a href="{{ route('admin.tools.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Tool
    </a>
</div>

<!-- Search form -->
<form method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-5">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="search" class="form-control" placeholder="Search tools..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary mb-0" type="submit">Search</button>
                <a href="{{ route('admin.tools.index') }}" class="btn btn-outline-secondary mb-0">Clear</a>
            </div>
        </div>
    </div>
</form>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Results</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tools as $tool)
                    <tr>
                        <td>{{ Str::limit($tool->name, 40) }}</td>
                        <td>{{ $tool->category?->name ?? 'Uncategorized' }}</td>
                        <td>{{ $tool->results_count ?? 0 }}</td>
                        <td>{{ $tool->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.tools.show', $tool) }}" class="btn btn-outline-primary">View</a>
                                <a href="{{ route('admin.tools.edit', $tool) }}" class="btn btn-outline-secondary">Edit</a>
                                <form method="POST" action="{{ route('admin.tools.destroy', $tool) }}" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No tools found. <a href="{{ route('admin.tools.create') }}">Create one</a>.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between">
            <p>Showing {{ $tools->firstItem() ?? 0 }} to {{ $tools->lastItem() ?? 0 }} of {{ $tools->total() }} results</p>
            {{ $tools->links() }}
        </div>
    </div>
</div>
@endsection


