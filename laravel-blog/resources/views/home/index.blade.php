@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid
                            atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                            voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @if (empty($posts))
                        <h1 class="h2 text-center">{{ __('No posts') }}</h1>
                    @endif
                    @foreach ($posts as $key => $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                                        alt="post image" /></a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="small text-muted">{{ $post->created_at->format('Y-m-d') }}</div>
                                        <div class="small text-muted">{{ $post->category->name }}</div>
                                    </div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->description }}</p>
                                    <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination-->
                {{ $posts->links() }}
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <form action="{{ route('home') }}" method="get">
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                {{-- <input name="search" value="{{ request('search') }}" class="form-control" --}}
                                    {{-- placeholder="{{ __('Search') }}" /> --}}
                                <button type="submit" class=" btn btn-primary">{{ __('Search') }}</button>
                            </div>
                            <div class="input-group">
                                @if (empty($categories))
                                    <li><a href="#!">{{ __('No categories') }}</a></li>
                                @endif

                                <select class="form-control" name="category_id">
                                    <option value="">Choose category</option>
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
