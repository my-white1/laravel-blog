@extends('layouts.base')


@section('content')

    <form action="{{ route('category.store') }}" method="post" class="container d-flex m-5">
        @csrf
        <input name="name" type="text" value="{{ request()->old('name') }}" class="form-control">
        <button type="submit" class="btn btn-success">Create</button>
    </form>

@endsection