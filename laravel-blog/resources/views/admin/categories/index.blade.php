@extends('layouts.base')


@section('content')
    <div class="container mb-5">
        <a href="{{ route('category.create') }}" class="btn btn-warning ms-3">Create</a>
    </div>
    <table class="table container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="d-flex">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info me-3">Update</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-success ms-3">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
