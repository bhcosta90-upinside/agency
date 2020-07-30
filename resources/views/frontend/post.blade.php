@extends('layouts.frontend')

@section('content')
    <!-- Single Blog Area  -->
    <div class="single-blog-area blog-style-2 mb-50">

        <div class="single-blog-thumbnail">
            <img src="{{ $post->thumb(1000, 500) }}" alt="">
            <div class="post-tag-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="post-date">
                                <a href="#">{{date('d', strtotime($post->created_at))}} <span>{{date('M', strtotime($post->created_at))}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Content -->
        <div class="single-blog-content">
            <div class="line"></div>
            <a href="{{ route('category', $post->categories->first()->slug) }}" class="post-tag">{{ $post->categories->first()->category }}</a>
            <h4><a href="#" class="post-headline mb-0">{{ $post->title }}</a></h4>
            <div class="post-meta mb-50">
                <p>By <a href="{{ route('post-user', $post->user->id) }}">{{$post->user->name}}</a></p>
                <p>{{ $post->comments->count() }} {{ __('comments') }}</p>
            </div>
            <p>{{ $post->description }}</p>
        </div>
    </div>

    <!-- About Author -->
    <div class="blog-post-author mt-100 d-flex">
        <div class="author-info">
            <div class="line"></div>
            <span class="author-role">{{ __('Author') }}</span>
            <h4><a href="#" class="author-name">{{ $post->user->name }}</a></h4>
        </div>
    </div>

    <!-- Comment Area Start -->
    <div class="comment_area clearfix mt-70">
        <h5 class="title">{{ __('Comments') }}</h5>

        <ol>
            <!-- Single Comment Area -->
            @foreach($comments as $comment)
                <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                        <!-- Comment Author -->
                        <div class="comment-author">
                            <img src="{{ asset('frontend/img/bg-img/b7.jpg') }}" alt="author">
                        </div>
                        <!-- Comment Meta -->
                        <div class="comment-meta">
                            <a href="#" class="post-date">{{ date('M d', strtotime($comment->created_at))}}</a>
                            <p><a href="{{ route('post-user', $post->user->id) }}" class="post-author">{{ $comment->user->name }}</a></p>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                </li>
            @endforeach

            {!! $comments->appends(request()->all())->links() !!}

        </ol>
    </div>

    <div class="post-a-comment-area mt-70">
        <h5>{{ __('Leave a commentary') }}</h5>
        <!-- Reply Form -->
        <form action="{{ route('api.commentary', $post->slug) }}" id='frmCommentary' method="post">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="group">
                        <input type="text" name="name" id="name" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>{{ __('Name') }}</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="group">
                        <input type="email" name="email" id="email" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>{{ __('Email') }}</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="group">
                        <textarea name="message" id="message" required></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>{{ __('Comment') }}</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn original-btn">{{ __('Comment') }}</button>
                </div>
            </div>
        </form>
    </div>

@endsection
