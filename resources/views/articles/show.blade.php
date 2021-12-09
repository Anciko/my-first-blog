@extends('layouts.app')
@section('title', 'Article Detail')
@section('mycss')

@endsection

@section('content')
    <div class="col-md-10 offset-md-1 col-10 offset-1">
        <h5>Article Detail</h5>
        <a href="{{ url('/articles') }}" class="btn btn-warning text-white mb-2">
            << Back </a>

                <div class="d-flex justify-content-md-between flex-wrap">
                    <div class="col-md-7 ">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-text">{{ $article->title }}</h5>
                                <p class="text-dark">{{ $article->body }}</p>
                                <p class="text-primary">
                                    {{ Str::title($article->user->name) }} posted
                                    {{ $article->updated_at->diffForHumans() }}
                                </p>
                                @if (auth()->user()->id == $article->user->id)
                                    <div class="float-end">
                                        <a href="{{ url('articles/edit/' . $article->id) }}"
                                            class="btn btn-info text-white">Edit</a>
                                        <a href="{{ url('articles/destroy/' . $article->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Creating comments -->
                        <form action="{{ url("/comments/store/$article->id") }}" method="POST" class="my-3">
                            @csrf
                            <input type="hidden" name="comment_user" value="{{ auth()->user()->id }}">
                            <div class="form-group">
                                <textarea class="form-control" name="content" placeholder="Leave a comment here"
                                    id="floatingTextarea"></textarea>
                                @error('content')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-primary float-end my-2"> <i
                                        class="far fa-comment-dots"></i>
                                    Send</button>
                            </div>
                        </form>

                    </div>

                    <!-- Showing comments -->
                    <div class="col-md-4 col-12">
                        <div class="card mb-2">
                            <div class="card-header bg-primary text-light">
                                {{ count($article->comments) }}
                                @if (count($article->comments) > 1)
                                    <span>comments</span>
                                @else
                                    <span>comment</span>
                                @endif
                            </div>
                        </div>

                        @foreach ($article->comments as $comment)
                            <div class="card p-2 mb-2">
                                <div class="d-flex justify-content-between">
                                    <h5 class="d-inline text-info">{{ $comment->user->name }}</h5>
                                    <div class="float-end">
                                        @if (auth()->user()->id == $comment->user->id)
                                            <form action="{{ url("comments/$comment->id") }}" method="post">
                                                <input type="hidden" value="delete">
                                                <button type="submit" class="btn">
                                                    <i class="far fa-trash-alt text-danger fa-lg"></i>
                                                </button>
                                            </form>

                                        @endif
                                    </div>

                                </div>

                                <p> {{ $comment->content }} </p>

                                <div class="d-flex justify-content-end text-muted">
                                    <span>{{ $comment->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>


                        @endforeach
                    </div>
                </div>
    </div>

@endsection
