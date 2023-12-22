@extends('frontend.layouts.main')
@section('content')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    About Us
                </h1>
                <p class="text-white link-nav"><a href="{{ route('index') }}">Home </a> <span
                        class="lnr lnr-arrow-right"></span> <a href="#"> About Us</a></p>
            </div>
        </div>
    </div>
</section>


<section class="about-top-area section-gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 about-top-left">
                <h1 style="width: 300px">
                    {{ @$about->title }}
                </h1>
                <p>
                    {{ @$about->description }}
                </p>
            </div>
            <div class="col-lg-6 about-top-right">
                <img class="img-fluid" src="public/frontend/img/1701945569.png" alt>
            </div>
        </div>
    </div>
</section>

<section class="about-top-area section-gap">
    <div class="container">

        <div class="row align-items-center justify-content-center">

            <div class="col-lg-5 about-top-right">
                <img class="img-fluid" src="public/frontend/img/1702550678.jpg" alt>
            </div>
            <div class="col-lg-6 about-top-left">
                <h1 style="width: 300px">
                    Message from Chairman </h1>
                <p>
                    I am Suraj Karki, a former para-military commando, and the proud founder of our consultancy, I've
                    had the privilege of leading dedicated teams in various tasks and responsibilities. This experience
                    has shown me the immense potential that resides within individuals from our region.

                    It is with this spirit of excellence that I founded MS & CONSULTANTS. Our consultancy offers a wide
                    range of services, including study abroad opportunities, work placements, permanent residency
                    solutions, investment pathways, visit visas, skill training, and personalized career counseling. Our
                    mission is to transform dreams into reality and empower individuals from Nepal, South Asia, and
                    beyond to explore the world and make a positive impact.

                    We aim to inspire and guide you to find a greater purpose and extend your reach globally. At MS &
                    CONSULTANTS, we are committed to ethical practices and driven by a passion to bring your dreams to
                    fruition. We work cohesively as a team to provide tailored services that align with your unique
                    aspirations.

                    Together, let's shape a brighter future where your ambitions become your achievements, where our
                    rich collective experiences combine with your aspirations to create a global impact. Let MS &
                    CONSULTANTS be your trusted partner on this remarkable journey.
                </p>
            </div>

        </div>
    </div>
</section>



<section class="feature-area section-gap" id="service">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text">
                <h1>Our Unique Features that can impress you</h1>
                <p>
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4><span class=""></span>{{ $service->title }}</h4>
                    <p>
                        {{ $service->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="review-area section-gap" id="review">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text text-center">
                <h1 class="pb-10">How Our Customers Treat Us</h1>
                <p>
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="active-review-carusel">
                @foreach ($testimonials as $testimonial)
                <div class="single-review item">
                    <img src="{{asset('public/'.$testimonial->customer_img)}}" alt>
                    <div class="title justify-content-start d-flex">
                        <a href="#">
                            <h4>{{$testimonial->customer_name}}</h4>
                        </a>
                    </div>
                    <p>
                        {{$testimonial->message}}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('custom-scripts')
<script>
let about = document.getElementById('about');
about.classList.add('menu-active');
</script>
@endpush