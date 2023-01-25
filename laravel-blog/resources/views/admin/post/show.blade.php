@extends('layouts.base')

@section('content')
    <div class="row justify-content-center ">
        <div class="col-lg-6">
            <!-- Blog post-->
            <div class="card mb-4">
                <a><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="post image" /></a>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="small text-muted">{{ $post->created_at->format('Y-m-d') }}</div>
                        <div class="small text-muted">{{ $post->category->name }}</div>
                    </div>
                    <h2 class="card-title h4">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->description }}</p>
                    <div class="d-flex">
                        <a class="btn btn-primary me-3" href="{{ route('post.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
