@extends('layouts.frontend')

@section('content')
    @foreach ($posts as $post)
        <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="single-blog-thumbnail">
                        <img src="{{ $post->thumb(825) }}" alt="">
                        <div class="post-date">
                            <a href="#">{{ date('d', strtotime($post->created_at)) }} <span>{{ date('M', strtotime($post->created_at)) }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Blog Content -->
                    <div class="single-blog-content">
                        <div class="line"></div>
                        <a href="{{ route('category', $post->categories->first()->slug) }}" class="post-tag">{{ $post->categories->first()->category }}</a>
                        <h4><a href="{{ route('post', $post->slug) }}" class="post-headline">{{ $post->title }}</a></h4>
                        <p>{{ $post->subtitle }}</p>
                        <div class="post-meta">
                            <p>By <a href="{{ route('post-user', $post->user->id) }}">{{ $post->user->name }}</a></p>
                            <p>{{$post->comments->count()}} {{__('comments')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {!! $posts->appends(request()->all())->links() !!}

@endsection
