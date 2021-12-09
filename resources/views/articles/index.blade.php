@extends('layouts.app')
@section('title', 'All Articles')
@section('mycss')
    <style>
        a {
            cursor: pointer;
            text-decoration: none;
        }

        a:hover {
            color: #fff;
        }

    </style>
@endsection
@section('content')
    <div class="container col-md-8 offset-md-1">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h5>All Articles</h5>
        <a href="{{ url('/articles/create') }}" class="btn btn-primary mb-2">Create New Article</a>
        {{ $articles->links() }}
        @foreach ($articles as $article)
            <div class="card p-2 mb-2">
                <div class="card-body">
                    <h4>
                        <a href="" class="badge bg-dark badge-pill">
                            <i class="fas fa-user-circle"></i>
                            {{ Str::title($article->user->name )}}
                        </a>
                    </h4>
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <small class="text-info">{{$article->updated_at->diffForHumans()}}</small>
                    <p class="text-justify">{{ Str::words($article->body, 5, ' .....') }}</p>
                    <a href="{{ url('articles/show/' . $article->id) }}" class="badge bg-dark">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
