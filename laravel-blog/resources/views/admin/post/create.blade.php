@extends('layouts.base')

@section('content')

<section class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.store' )}}" method="post">
                @csrf   

                <input type="text" name="title"  class="form-control mb-3" placeholder="title *">
                <textarea type="text" name="description" class="form-control mb-3" placeholder="description *"></textarea>

                <div class="input-group">
                    @if (empty($categories))
                        <li><a href="#!">{{ __('No categories') }}</a></li>
                    @endif

                    <select class="form-control mb-3" name="category_id">
                        <option value="">Choose category</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $key }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-info">Create</button>
            </form>
            </div>
        </div>
</section>

@endsection