<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User profile -->
                    <div class="user-profile text-center position-relative pt-4 mt-1">
                        <!-- User profile image -->
                        <div class="profile-img m-auto">
                            <img src="{{asset('public/'.@companyInfo()->image)}}" alt="user"
                                class="w-100 rounded-circle" />
                        </div>
                        <!-- User profile text-->
                        <div class="profile-text py-1">
                            {{@companyInfo()->name}}
                            {{-- <a
                  href="#"
                  class="dropdown-toggle link u-dropdown"
                  data-bs-toggle="dropdown"
                  role="button"
                  aria-haspopup="true"
                  aria-expanded="true"
                  > <span class="caret"></span>
                </a> --}}
                            {{-- <div class="dropdown-menu animated flipInY">
                  <a class="dropdown-item" href="#">
                    <i
                      data-feather="user"
                      class="feather-sm text-info me-1 ms-1"
                    ></i>
                    My Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i
                      data-feather="settings"
                      class="feather-sm text-warning me-1 ms-1"
                    ></i>
                    Account Setting
                  </a>
                  <div class="dropdown-divider"></div>
                  <a
                    class="dropdown-item"
                    href="{{route('logout')}}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >
                            <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                            Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <div class="dropdown-divider"></div>
                            <div class="ps-4 p-2">
                                <button type="button" class="btn d-block w-100 btn-info rounded-pill">
                                    View Profile
                                </button>
                            </div>
                        </div> --}}
                    </div>
    </div>
    <!-- End User profile text-->
    </li>
    <!-- User Profile-->
    <li class="nav-small-cap">
        <i class="mdi mdi-dots-horizontal"></i>
        <span class="hide-menu">Personal</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark" href="{{route('admin')}}" aria-expanded="false">
            <i data-feather="home" class="feather-icon"></i>
            <span class="hide-menu">Dashboard
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="article" href="{{route('article.index')}}"
            aria-expanded="false"><i data-feather="book" class="feather-icon"></i><span
                class="hide-menu">Article</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="media" href="{{route('media.index')}}"
            aria-expanded="false"><i data-feather="smartphone" class="feather-icon"></i><span
                class="hide-menu">Media</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="service" href="{{route('service.index')}}"
            aria-expanded="false"><i data-feather="briefcase" class="feather-icon"></i><span
                class="hide-menu">Service</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="company" href="{{route('company.index')}}"
            aria-expanded="false"><i data-feather="slack" class="feather-icon"></i><span
                class="hide-menu">Company</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="team" href="{{route('team.index')}}"
            aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                class="hide-menu">Team</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('contact.index')}}"
            aria-expanded="false"><i data-feather="phone" class="feather-icon"></i><span
                class="hide-menu">Contact</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="testimonial"
            href="{{route('testimonial.index')}}" aria-expanded="false"><i data-feather="message-circle"
                class="feather-icon"></i><span class="hide-menu">Testimonials</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="socialMedia"
            href="{{route('social_media.index')}}" aria-expanded="false"><i data-feather="globe"
                class="feather-icon"></i><span class="hide-menu">Social Media</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="users" href="{{route('users.index')}}"
            aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                class="hide-menu">Users</span></a>
    </li>
    <li class="sidebar-item" id="setting">
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="setting1" href="javascript:void(0)"
            aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings
            </span></a>
        <ul aria-expanded="false" class="collapse first-level" id="setting2">
            <li class="sidebar-item">
                <a href="{{route('article_type.index')}}" class="sidebar-link" id="articleType"><i
                        class="mdi mdi-view-quilt"></i><span class="hide-menu"> Article Type </span></a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('media_type.index')}}" class="sidebar-link" id="mediaType"><i
                        class="mdi mdi-view-quilt"></i><span class="hide-menu"> Media Type </span></a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('service_type.index')}}" class="sidebar-link" id="serviceType"><i
                        class="mdi mdi-view-day"></i><span class="hide-menu"> Service Type </span></a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="faq" href="{{route('faq.index')}}"
            aria-expanded="false"><i data-feather="help-circle" class="feather-icon"></i><span
                class="hide-menu">FAQ</span></a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" id="gallery" href="{{route('gallery.index')}}"
            aria-expanded="false"><i data-feather="slack" class="feather-icon"></i><span
                class="hide-menu">Gallery</span></a>
    </li>
    </ul>
    </nav>
    <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>