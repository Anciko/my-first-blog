@extends('layouts.app')
@section('title', 'Update Article')
@section('content')
    <div class="col-md-6 offset-md-3">
        <h5>Update Article</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('articles/'.$article->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-text">Title</label>
                        <input name="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"  id="title"
                        value="{{$article->title}}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="desc" class="form-text">Description</label>
                        <textarea name="desc" class="form-control @if ($errors->has('desc')) is-invalid @endif" id="desc" cols="10"
                            rows="5">{{$article->body}}</textarea>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="float-end">
                        <button class="btn btn-outline-secondary" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
