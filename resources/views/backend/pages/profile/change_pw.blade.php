@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
          <div class="col-md-5 align-self-center">
            <h3 class="page-title">Profile</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Change Password
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          
        </div>
      </div>

      <div class="container-fluid">

        <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3 pb-3 border-bottom"> Change Your Password</h4>
                  <form action="{{route('change_password',Auth::user()->id)}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <input type="password" name="old_password" class="form-control" id="tb-fname" placeholder="Enter Your Old Password" required/>
                          <label for="tb-fname">Old Password</label>
                          @if (session('message'))
                              <span class="text-danger">{{session('message')}}</span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <input type="password" name="new_password" class="form-control" id="tb-fname" placeholder="Enter Your New Password" required/>
                          <label for="tb-fname">New Password</label>
                          @error('new_password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <input type="password" name="confirm_new_password" class="form-control" id="tb-fname" placeholder="Enter Your Old Password" required/>
                          <label for="tb-fname">Confirm New Password</label>
                          @error('confirm_new_password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-md-flex align-items-center ">
                          <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class=" btn btn-info font-weight-medium rounded-pill px-4">
                              <div class="d-flex align-items-center">
                                <i data-feather="send" class="feather-sm fill-white me-2"></i>
                                Submit
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </div>

@endsection