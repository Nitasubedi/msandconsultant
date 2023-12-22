@extends('frontend.layouts.main')
@section('content')
<section class="banner-area relative immigration-top" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Our Gallery
                </h1>
                <p class="text-white link-nav"><a href="{{ route('index') }}">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Gallery</a></p>
            </div>
        </div>
    </div>
</section>

<section class="service-area section-gap list-page-service" id="immigration">
    <div class="container">

        <div id="service-slider">
            <div class="row">
                @foreach ($gallery as $gallery)
                <div class="col-lg-3 col-md-3">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="{{ asset('public/' . $gallery->image) }}" alt>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>

@endsection

@push('custom-scripts')
<script>
    let gallery = document.getElementById('gallery');
    gallery.classList.add('menu-active');
</script>
@endpush