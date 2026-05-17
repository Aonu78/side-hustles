@extends('layouts.app')

@section('title', $title)

@section('content')
<section class="bg-hero-gradient text-white py-5">
  <div class="container">
    <h1 class="font-heading fw-bold display-5 mb-0">{{ $title }}</h1>
  </div>
</section>

<section class="py-5">
  <div class="container" style="max-width: 760px;">
    <div class="card-hf p-4 p-md-5">
      <p class="lead mb-4">{{ $body }}</p>
      <a href="{{ route('home') }}" class="btn btn-hf-primary">Back Home</a>
    </div>
  </div>
</section>
@endsection
