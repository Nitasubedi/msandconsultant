<header id="header" id="home">
    <div class="container">
        <div class="row header-top align-items-center">
            <div class="col-lg-4 col-sm-4 menu-top-left">
                <span>
                    We believe we helps people <br>
                    for happier lives
                </span>
            </div>
            <div class="col-lg-4 menu-top-middle justify-content-center d-flex">
                <a href="{{route('index')}}">
                    <img class="img-fluid logo" src="{{asset('public/'. @getLogo()->image)}}" alt>
                </a>
            </div>
            <div class="col-lg-4 col-sm-4 menu-top-right">
                <a class="tel" href="tel:{{companyInfo()->phone_no}}">{{companyInfo()->phone_no}}</a>
                <a href="tel:{{companyInfo()->phone_no}}"><span class="lnr lnr-phone-handset"></span></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row align-items-center justify-content-center d-flex">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li id="home" class=""><a href="{{route('index')}}">Home</a></li>
                    <li id="about"><a href="{{route('about')}}">About</a></li>
                    <li id="service"><a href="{{route('service')}}">Services</a></li>
                    {{-- <li><a href="course-list.html">Course</a></li>
   
                        <li><a href="country-list.html">Country</a></li> --}}

                    <li id="blog"><a href="{{route('blog')}}">Blogs</a></li>
                    <li id="contact"><a href="{{route('contact')}}">Contact</a></li>
                    <li id="gallery"><a href="{{route('gallery')}}">Gallery</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>