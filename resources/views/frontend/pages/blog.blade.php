@extends('frontend.layouts.main')
@section('content')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-22">
                <h1 class="text-white">
                    Our Blog
                </h1>
                <p class="text-white link-nav"><a href="{{ route('index') }}">Home </a> <span
                        class="lnr lnr-arrow-right"></span> <a href="#"> Blog</a></p>
            </div>
        </div>
    </div>
</section>

<section class="blog-top-area section-gap">

    <div class="d-flex gs8 sm:fd-column">
        <div class="container">
            <div class="row">
                <div class="col-lg-15 col-sm-15 menu-top-left">
                    @foreach ($articles as $article)
                    <div class="single-post">
                        <img class="img-fluid" src="{{asset('public/'.$article->image)}}" alt="" height="250%"
                            width="250%">

                        <a href="#">
                            <h1>
                                {{$article->title}}
                            </h1>
                        </a>

                        <p>
                            {!! $article->description !!}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-1 col-sm-1 menu-top-right">

            <div class="card-header">
                <h4>Latest Posts</h4>
            </div>
            <div class="related js-gps-related-questions" data-tracker="rq=1">

                <div class="card-body">
                    @foreach($latest_posts as $article)
                    <a href="" class="text-decoration-none">
                        <h6> <img class="img-fluid" src="{{asset('public/'.$article->image)}}" alt>
                            {{ $article->title }}
                        </h6>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom-scripts')
<script>
let blog = document.getElementById('blog');
blog.classList.add('menu-active');
</script>
@endpush