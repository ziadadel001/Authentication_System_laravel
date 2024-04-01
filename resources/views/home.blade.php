@extends('layouts.app')
@section('title', 'Home')
@section('content')
    @auth
        {{ auth()->user()->name }}
    @endauth
@endsection
