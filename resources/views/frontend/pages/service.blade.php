@extends('frontend.layouts.main')
@section('content')
<section class="banner-area relative immigration-top" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Our Services
                </h1>
                <p class="text-white link-nav"><a href="{{ route('index') }}">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Service</a></p>
            </div>
        </div>
    </div>
</section>

<section class="service-area section-gap list-page-service" id="immigration">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 pb-40 header-text text-center">
                <h1 class="pb-10">Our Services</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </p>
            </div>
        </div>

        <div id="service-slider">
            <div class="row">
                @foreach ($services as $service)

                <div class="col-lg-3 col-md-3">
                    <div class="single-service">
                        <div class="thumb">
                            <img src="{{ asset('public/' . $service->image) }}" alt>
                        </div>
                        <a href="#">
                            <div class="row d-flex align-items-center justify-content-center">

                                <h4>{{ $service->title }}</h4>

                            </div>
                        </a>
                        <p>
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>

@endsection

@push('custom-scripts')
<script>
    let service = document.getElementById('service');
    service.classList.add('menu-active');
</script>
@endpush