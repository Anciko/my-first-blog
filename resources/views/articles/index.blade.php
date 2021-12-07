@extends('layouts.app')
@section('title', 'All Articles')
@section('mycss')
    <style>
        a {
            cursor: pointer;
        }
        a:hover {
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-8 offset-md-1">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h5>All Articles</h5>
        <a href="{{ url('/articles/create') }}" class="btn btn-primary mb-2">Create New Article</a>
        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="text-justify">{{ $article->body }}</p>
                    <a href="{{url('articles/show/'.$article->id)}}" class="badge bg-dark text-decoration-none">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
