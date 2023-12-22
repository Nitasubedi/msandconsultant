  <!-- Topbar header - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header">
              <!-- This is for the sidebar toggle which is visible on mobile only -->
              <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                      class="ti-menu ti-close"></i></a>
              <!-- Logo -->
              <!-- ============================================================== -->
              <a class="navbar-brand" href="{{route('admin')}}">
                  <!-- Logo icon -->
                  {{-- <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="{{asset('backend/assets/images/logo-icon.png')}}"
                  alt="homepage"
                  class="dark-logo"
                  />
                  <!-- Light Logo icon -->
                  <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                  </b> --}}
                  <!--End Logo icon -->
                  <!-- Logo text -->
                  <span class="logo-text py-4">
                      <!-- dark Logo text -->
                      <h4>Admin Panel</h4>
                      {{-- <img
                  src="{{asset('backend/assets/images/logo-text.png')}}"
                      alt="homepage"
                      class="dark-logo"
                      />
                      <!-- Light Logo text -->
                      <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
                  </span>
              </a>

              <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                      class="ti-more"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent">

              <ul class="navbar-nav me-auto">
                  <li class="nav-item d-none d-md-block">
                      <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                          data-sidebartype="mini-sidebar"><i data-feather="arrow-left-circle"
                              class="feather-sm"></i></a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-bs-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <i data-feather="bell" class="feather-sm"></i>
                          <div class="notify">
                              <span class=""></span> <span class="point"></span>
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-start mailbox dropdown-menu-animate-up">
                          <ul class="list-style-none">
                              <li>
                                  <div class="border-bottom rounded-top py-3 px-4">
                                      <div class="mb-0 font-weight-medium fs-4">
                                          Notifications
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i data-feather="mail" class="feather-sm"></i>
                          <div class="notify">
                              <span class=""></span> <span class="point"></span>
                          </div>
                      </a>
                      <div class="dropdown-menu mailbox dropdown-menu-start dropdown-menu-animate-up"
                          aria-labelledby="2">
                          <ul class="list-style-none">
                              <li>
                                  <div class="border-bottom rounded-top py-3 px-4">
                                      <div class="mb-0 font-weight-medium fs-4">
                                          You have 0 new messages
                                      </div>
                                  </div>
                              </li>
                              <li>

                              </li>
                          </ul>
                      </div>
                  </li>
              </ul>



              <!-- ============================================================== -->

              <ul class="navbar-nav">

                  <li class="d-flex align-items-center">
                      <a href="{{route('index')}}" target="new" class="nav-link pr-5">
                          <button class="btn btn-info btn-sm">View Website</button>
                      </a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-bs-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <img src="{{asset('public/'.@companyInfo()->image)}}" alt="user" width="30" height="25"
                              style="object-fit:inherit; background-repeat:no-repeat; background-size: cover;"
                              class="profile-pic rounded-circle" />
                      </a>
                      <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                          <div class="d-flex no-block align-items-center p-3 bg-info text-white mb-2">
                              <div class="">
                                  <img src="{{asset('public/'.@companyInfo()->image)}}" alt="user"
                                      class="rounded-circle" width="60" style="object-fit: cover" />
                              </div>
                              <div class="ms-2">
                                  <h4 class="mb-0 text-white">{{Auth::user()->name}}</h4>
                                  <p class="mb-0">{{Auth::user()->email}}</p>
                              </div>
                          </div>
                          <a class="dropdown-item" href="{{route('view_profile')}}"><i data-feather="user"
                                  class="feather-sm text-info me-1 ms-1"></i>
                              My Profile</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{route('view_change_password')}}"><i data-feather="settings"
                                  class="feather-sm text-warning me-1 ms-1"></i>
                              Change Password</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                              <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                              Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                          <div class="dropdown-divider"></div>
                          <div class="pl-4 p-2">
                              <a href="{{route('view_profile')}}" class="btn d-block w-100 btn-info rounded-pill">View
                                  Profile</a>
                          </div>
                      </div>
                  </li>
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->

              </ul>
          </div>
      </nav>
  </header>
  <!-- ============================================================== -->
  <!-- End Topbar header -->