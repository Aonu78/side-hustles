@extends('layouts.admin')

@section('title', 'Users')

@section('pageTitle', 'Users')

@section('content')
    @include('components.users-table', ['users' => $users])
@endsection
