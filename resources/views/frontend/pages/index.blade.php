@extends('frontend.layouts.main')
@section('content')

<section class="banner-area" id="home">
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-start">
            <div class="banner-content col-lg-9">
                {{-- <h6>Process Visa without within hours</h6> --}}
                <h1 class="text-white">
                    {{ @$slider->title }}
                </h1>
                <a href="#" class="genric-btn circle">Book Consultancy</a>
            </div>
            <img class="header-img img-fluid align-self-end d-flex slider"
                src="{{ asset('public/' . @$slider->image) }}">
        </div>
    </div>
</section>


<!-- The Modal -->
<div class="modal show" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="title">{{@$popUp->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="padding: 0% !important">
                <img src="{{asset('public/'.@$popUp->image)}}" alt="" height="100%" width="100%"
                    style="object-fit:contain; background-position:center; background-repeat:no-repeat">
            </div>

        </div>
    </div>
</div>

<section class="calltotop-area pt-70 pb-70">
    <div class="container">
        <div class="callto-section">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 call-left no-padding">
                    <p>
                        Start <span>planning</span> your <br>
                        New <span>Dream</span>
                    </p>
                </div>
                <div class="col-lg-5 call-middle">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                    </p>
                </div>
                <div class="col-lg-3 call-right justify-content-end d-flex">
                    <a href="#" class="call-btn">Request Free Consultancy</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-area section-gap" id="immigration">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text text-center">
                <h1 class="pb-10">Our Services</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </p>
            </div>
        </div>

        <div class="container-xl">
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945621.png') }}" alt="">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>STUDY ABROAD</h4>
                                                <p>With a comprehensive understanding of student visas, application
                                                    processes, and cultural acclimation, we ensure that your study
                                                    abroad experience is seamless and transformational.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945659.png') }}"
                                                    class="img-fluid" alt="Headphone">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>WORK</h4>
                                                <p>Our proven expertise in work permits, combined with our
                                                    commitment to
                                                    staying abreast of evolving regulations, guarantees a smooth and
                                                    successful transition to your desired work destination.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945694.png') }}"
                                                    class="img-fluid" alt="Macbook">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>PR/MIGRATION</h4>
                                                <p>Whether you're seeking a fresh start, better opportunities,
                                                    or a
                                                    change of scenery, we're here to guide you through the
                                                    complexities of permanent residency and migration processes.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945741.png') }}"
                                                    class="img-fluid" alt="Nikon">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>INVESTMENT</h4>
                                                <p>Whether you're envisioning business ventures in a
                                                    thriving
                                                    economy or
                                                    seeking a secure haven for your investments, we're here
                                                    to
                                                    guide
                                                    you
                                                    through the intricacies of investment visas.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item carousel-item ">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945659.png') }}"
                                                    class="img-fluid" alt="Headphone">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>WORK</h4>
                                                <p>Our proven expertise in work permits, combined with our
                                                    commitment to
                                                    staying abreast of evolving regulations, guarantees a smooth and
                                                    successful transition to your desired work destination.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945694.png') }}"
                                                    class="img-fluid" alt="Macbook">
                                            </div>
                                            <div class="thumb-content">

                                                <h4>PR/MIGRATION</h4>
                                                <p>Whether you're seeking a fresh start, better opportunities,
                                                    or a
                                                    change of scenery, we're here to guide you through the
                                                    complexities of permanent residency and migration processes.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945741.png') }}"
                                                    class="img-fluid" alt="Nikon">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>INVESTMENT</h4>
                                                <p>Whether you're envisioning business ventures in a
                                                    thriving
                                                    economy or
                                                    seeking a secure haven for your investments, we're here
                                                    to
                                                    guide
                                                    you
                                                    through the intricacies of investment visas.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945621.png') }}" alt="">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>STUDY ABROAD</h4>
                                                <p>With a comprehensive understanding of student visas, application
                                                    processes, and cultural acclimation, we ensure that your study
                                                    abroad experience is seamless and transformational.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item carousel-item ">
                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945694.png') }}"
                                                    class="img-fluid" alt="Macbook">
                                            </div>
                                            <div class="thumb-content">

                                                <h4>PR/MIGRATION</h4>
                                                <p>Whether you're seeking a fresh start, better opportunities,
                                                    or a
                                                    change of scenery, we're here to guide you through the
                                                    complexities of permanent residency and migration processes.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945741.png') }}"
                                                    class="img-fluid" alt="Nikon">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>INVESTMENT</h4>
                                                <p>Whether you're envisioning business ventures in a
                                                    thriving
                                                    economy or
                                                    seeking a secure haven for your investments, we're here
                                                    to
                                                    guide
                                                    you
                                                    through the intricacies of investment visas.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945621.png') }}" alt="">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>STUDY ABROAD</h4>
                                                <p>With a comprehensive understanding of student visas, application
                                                    processes, and cultural acclimation, we ensure that your study
                                                    abroad experience is seamless and transformational.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945659.png') }}"
                                                    class="img-fluid" alt="Headphone">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>WORK</h4>
                                                <p>Our proven expertise in work permits, combined with our
                                                    commitment to
                                                    staying abreast of evolving regulations, guarantees a smooth and
                                                    successful transition to your desired work destination.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item carousel-item ">
                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945741.png') }}"
                                                    class="img-fluid" alt="Nikon">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>INVESTMENT</h4>
                                                <p>Whether you're envisioning business ventures in a
                                                    thriving
                                                    economy or
                                                    seeking a secure haven for your investments, we're here
                                                    to
                                                    guide
                                                    you
                                                    through the intricacies of investment visas.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945621.png') }}" alt="">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>STUDY ABROAD</h4>
                                                <p>With a comprehensive understanding of student visas, application
                                                    processes, and cultural acclimation, we ensure that your study
                                                    abroad experience is seamless and transformational.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945659.png') }}"
                                                    class="img-fluid" alt="Headphone">
                                            </div>
                                            <div class="thumb-content">
                                                <h4>WORK</h4>
                                                <p>Our proven expertise in work permits, combined with our
                                                    commitment to
                                                    staying abreast of evolving regulations, guarantees a smooth and
                                                    successful transition to your desired work destination.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset('/public/images/service/1701945694.png') }}"
                                                    class="img-fluid" alt="Macbook">
                                            </div>
                                            <div class="thumb-content">

                                                <h4>PR/MIGRATION</h4>
                                                <p>Whether you're seeking a fresh start, better opportunities,
                                                    or a
                                                    change of scenery, we're here to guide you through the
                                                    complexities of permanent residency and migration processes.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



<section class="feature-area section-gap" id="service" style="padding-top:0px !important ">
    <br>
    <br>
    <br>
    <br>
    <br>

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
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-user"></span>Expert Technicians</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid
                        advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-license"></span>Professional Service</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid
                        advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-phone"></span>Great Support</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid
                        advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid
                        advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-diamond"></span>Highly Recomended</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid
                        advancement of technology and power.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
                    <p>
                        Usage of the Internet is becoming more common due to rapid
                        advancement of technology and power.
                    </p>
                </div>
            </div>
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
                        {{-- <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div> --}}
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

<section class="latest-blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest News from our Blog</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)

            <div class="col-lg-6 single-blog">
                <img class="img-fluid" src="{{asset('public/'.$article->image)}}" alt>

                <a href="#">
                    <h4 class="mt-4">{{$article->title}}</h4>
                </a>
                <p>
                    {!! Str::limit($article->description, 300) !!}
                </p>
                <p class="post-date">{{$article->created_at->format('d M,Y')}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="callto-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h1 class="text-white">No Look Further. Try us today!</h1>
                <p class="text-white pt-20 pb-20">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore
                    et dolore <br> magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation.
                </p>

            </div>
        </div>
    </div>
</section>
@endsection

@push('custom-scripts')
<script>
let home = document.getElementById('home');
home.classList.add('menu-active');
</script>
<script>
$(document).ready(function() {

    let title = $('#title').text();
    if (title != '') {
        $("#myModal").modal();
    }
});
</script>

<script>
$(document).ready(function() {
    $(".wish-icon i").click(function() {
        $(this).toggleClass("fa-heart fa-heart-o");
    });
});
</script>

<script>
$(document).ready(function() {
    $('#myCarousel').carousel();
});
</script>

@endpush