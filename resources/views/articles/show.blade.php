@extends('layouts.app')
@section('title', 'Article Detail')
@section('mycss')

@endsection

@section('content')
    <div class="col-md-6 offset-md-1">
        <h5>Article Detail</h5>
        <a href="/articles" class="btn btn-warning text-white mb-2"><< Back </a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-text">{{$article->title}}</h5>
                <p class="text-dark">{{$article->body}}</p>
                <p class="text-muted">Posted {{$article->updated_at->diffForHumans()}}</p>
                <div class="float-end">
                    <a href="{{url('articles/edit/'.$article->id)}}" class="btn btn-info text-white">Edit</a>
                    <a href="{{url('articles/destroy/'.$article->id)}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
