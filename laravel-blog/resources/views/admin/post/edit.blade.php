@extends('layouts.base')

@section('content')

<section class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.update' , $post->id) }}" method="post">
            <input type="text" name="title" value="{{ $post->title }}" class="form-control mb-3">
            <textarea type="text" name="description" class="form-control mb-3">{{ $post->description }}</textarea>
                @csrf
                <button type="submit" class="btn btn-info">Edit</button>
            </form>
            </div>
        </div>
</section>

@endsection