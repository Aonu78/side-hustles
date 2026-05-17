@extends('layouts.app')

@section('title', $tool->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tool->name }}</h1>
            <p class="text-muted">{{ $tool->category->name }}</p>
            <div class="mb-4">
                {!! $tool->description !!}
            </div>
            
            <div class="alert alert-info">
                <h5>Calculator Logic</h5>
                <pre>{{ json_encode($tool->calculator_logic, JSON_PRETTY_PRINT) }}</pre>
            </div>
            
            <h5>Your Results</h5>
            @if (auth()->check() && $tool->results->count())
                @foreach ($tool->results->take(5) as $result)
                    <div class="card mb-2">
                        <div class="card-body">
                            <pre>{{ json_encode($result->result_data, JSON_PRETTY_PRINT) }}</pre>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No results yet. Use the calculator to generate your first result!</p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6>Quick Stats</h6>
                    <p>Views: {{ $tool->views ?? 0 }}</p>
                    <p>Total Uses: {{ $tool->results->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

