<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Original - Lifestyle Blog Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/core-img/favicon.ico') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset(mix('frontend/css/style.css')) }}">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="preload-content">
        <div id="original-load"></div>
    </div>
</div>

<!-- Subscribe Modal -->
<div class="subscribe-newsletter-area">
    <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <h5 class="title">{{ __('Subscribe to my newsletter') }}</h5>
                    <form action="#" class="newsletterForm" method="post">
                        <input type="email" name="email" id="subscribesForm2" placeholder="{{ __("Your e-mail here") }}">
                        <button type="submit" class="btn original-btn">{{ __('Subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('includes.header')


<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
@isset($banners)
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->
            @foreach($banners as $banner)
                <div class="single-hero-slide bg-img" style="background-image: url({{ $banner->thumb(500) }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="slide-content text-center">
                                    <div class="post-tag">
                                        <a href="{{ route('category', $banner->categories->first()->slug) }}" data-animation="fadeInUp">{{ $banner->categories->first()->category }}</a>
                                    </div>
                                    <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{ route('post', $banner->slug) }}">{{ $banner->title }}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!-- ##### Hero Area End ##### -->

<!-- ##### Blog Wrapper Start ##### -->
<div class="blog-wrapper section-padding-100 clearfix">
    @if(!isset($principal) && !isset($last))
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                @isset($principal)
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-area clearfix mb-100">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <a href="{{ route('category', $principal->categories->first()->slug) }}" class="post-tag">{{ $principal->categories->first()->category }}</a>
                                <h4><a href="{{ route('post', $principal->slug) }}" class="post-headline">{{ $principal->title }}</a></h4>
                                <p>{{ $principal->subtitle }}</p>
                                <a href="{{ route('post', $principal->slug) }}" class="btn original-btn">{{ __('Read More') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-catagory-area clearfix mb-100">
                            <img src="{{ $principal->categories->first()->post->first()->thumb(350, 412) }}" alt="">
                            <!-- Catagory Title -->
                            <div class="catagory-title">
                                <a href="{{ route('category', $principal->categories->first()->slug) }}">Categoria - {{ $principal->categories->first()->category }}</a>
                            </div>
                        </div>
                    </div>
                @endisset
                
                <!-- Single Blog Area -->
                @isset($last)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-catagory-area clearfix mb-100">
                            <img src="{{ $last->thumb(350, 412) }}" alt="">
                            <!-- Catagory Title -->
                            <div class="catagory-title">
                                <a href="{{ route('posts') }}">{{ __('latest posts') }}</a>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                @yield('content')
            </div>

            <!-- ##### Sidebar Area ##### -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="post-sidebar-area">

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <form action="#" class="search-form">
                            <input type="search" name="search" id="searchForm" placeholder="Search">
                            <input type="submit" value="submit">
                        </form>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title subscribe-title">{{ __('Subscribe to my newsletter') }}</h5>
                        <div class="widget-content">
                            <form action="{{ route('api.newsletter') }}" method='post' class="newsletterForm">
                                @csrf
                                <input type="email" name="email" id="subscribesForm" placeholder="{{ __("Your e-mail here") }}">
                                <button type="submit" class="btn original-btn">{{ __('Subscribe') }}</button>
                            </form>
                        </div>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">{{ __("Advertisement") }}</h5>
                        <a href="#"><img src="{{ asset('frontend/img/bg-img/add.gif') }}" alt=""></a>
                    </div>

                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">{{ __('Latest Posts') }}</h5>

                        <div class="widget-content">
                            @isset($latests)
                                @foreach ($latests as $latest)
                                    <div class="single-blog-post d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ $latest->thumb(115) }}" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="{{ route('category', $latest->categories->first()->slug) }}" class="post-tag">{{ $latest->categories->first()->category }}</a>
                                            <h4><a href="{{ route('post', $latest->slug) }}" class="post-headline">{{ $latest->title }}</a></h4>
                                            <div class="post-meta">
                                                <p><a href="#">{{ date('d M', strtotime($post->created_at)) }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>

                    <!-- Widget Area -->
                    @isset($tags)
                    <div class="sidebar-widget-area">
                        <h5 class="title">Tags</h5>
                        <div class="widget-content">
                            <ul class="tags">
                                @foreach ($tags as $tag)
                                    <li><a href="{{ route('posts', ['tags' => [$tag->slug]]) }}">{{ $tag->tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')


<script src="{{ asset('frontend/js/vendor.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
