@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-md-5 align-self-center">
          <h3 class="page-title">Profile</h3>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Profile
                </li>
              </ol>
            </nav>
          </div>
        </div>
        
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <!-- -------------------------------------------------------------- -->
      <!-- Start Page Content -->
      <!-- -------------------------------------------------------------- -->
      <!-- Row -->
      <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
          <div class="card">
            <div class="card-body">
              <center class="mt-4">
                <img
                  src="{{asset('public/'.Auth::user()->image)}}"
                  class="rounded-circle"
                  width="150"
                />
                <h4 class="card-title mt-2">{{Auth::user()->name}}</h4>
                {{-- <h6 class="card-subtitle">Accoubts Manager Amix corp</h6> --}}
                
              </center>
            </div>
            <div class="card-body">
              <small class="text-muted">Email address </small>
              <h6>{{Auth::user()->email}}</h6>
              <small class="text-muted pt-4 db">Phone</small>
              <h6>{{Auth::user()->phone_no}}</h6>
              <small class="text-muted pt-4 db">Address</small>
              <h6>{{Auth::user()->address}}</h6>
            </div>
          </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
          <div class="card">
            <!-- Tabs -->
            <ul
              class="nav nav-pills custom-pills"
              id="pills-tab"
              role="tablist"
            >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="pills-setting-tab"
                  data-bs-toggle="pill"
                  href="#previous-month"
                  role="tab"
                  aria-controls="pills-setting"
                  aria-selected="true"
                  >Setting</a
                >
              </li>
            </ul>
            <!-- Tabs -->
            <div class="tab-content" id="pills-tabContent">
              <div
                class="tab-pane fade show active"
                id="previous-month"
                role="tabpanel"
                aria-labelledby="pills-setting-tab"
              >
                <div class="card-body">
                  <form action="{{route('profile.update',Auth::user()->id)}}" class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="col-md-12">Full Name</label>
                      <div class="col-md-12">
                        <input
                          type="text" name="name"
                          placeholder="John Doe"
                          class="form-control form-control-line" value="{{Auth::user()->name}}"
                        />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="example-email" class="col-md-12"
                        >Email</label
                      >
                      <div class="col-md-12">
                        <input
                          type="email" name="email"
                          placeholder="john@admin.com"
                          class="form-control form-control-line" value="{{Auth::user()->email}}"
                          name="example-email"
                          id="example-email"
                        />
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="col-md-12">Phone No</label>
                      <div class="col-md-12">
                        <input
                          type="text" name="phone_no"
                          placeholder="Phone No"
                          class="form-control form-control-line" value="{{Auth::user()->phone_no}}"
                        />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="col-md-12">Address</label>
                      <div class="col-md-12">
                        <input
                          type="text" name="address"
                          placeholder="Address"
                          class="form-control form-control-line" value="{{Auth::user()->address}}"
                        />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="col-md-12">Date of Birth</label>
                      <div class="col-md-12">
                        <input
                          type="date" name="dob"
                          placeholder="dob"
                          class="form-control form-control-line" value="{{Auth::user()->dob}}"
                        />
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="col-sm-12">Gender</label>
                      <div class="col-sm-12">
                        <select class="form-control form-control-line" name="gender">
                          <option value="M"{{Auth::user()->gender == 'M' ? 'selected': ''}}>Male</option>
                          <option value="F"{{Auth::user()->gender == 'F' ? 'selected': ''}}>Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="col-md-12">Image</label>
                      <div class="col-md-12">
                        <input
                          type="file" name="image"
                          placeholder="Image"
                          class="form-control form-control-line" onchange="loadFile(event)"
                        />
                      </div>
                        <img
                          src="{{asset('public/'.Auth::user()->image)}}"
                          class="rounded-circle" id="output"
                          width="150"
                        />
                    </div>
                    <div class="mb-3">
                      <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">
                          Update Profile
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Column -->
      </div>
      <!-- Row -->
      <!-- -------------------------------------------------------------- -->
      <!-- End PAge Content -->
      <!-- -------------------------------------------------------------- -->
    
    
  </div>

@endsection