@extends('layouts.base')


@section('content')

    <form action="{{ route('category.update'  , $category->id) }}" method="post" class="container d-flex m-5">
        @csrf
        <input name="name" type="text" value="{{ $category->name }}" class="form-control">
        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection