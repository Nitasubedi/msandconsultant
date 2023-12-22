@extends('backend.layouts.main')
@section('content')
    
<div class="page-wrapper">

    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-md-5 align-self-center">
          <h3 class="page-title">Dashboard</h3>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Dashboard
                </li>
              </ol>
            </nav>
          </div>
        </div>
        
      </div>
    </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <!-- Row -->
      <div class="row"> 
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Medias</h4>
              <div class="text-end">
                <h2 class="fw-light mb-0">
                  <i data-feather="arrow-up" class="text-success"></i> {{$media}}
                </h2>
                <span class="text-muted">Total Media</span>
              </div>
              
            </div>
          </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Articles</h4>
              <div class="text-end">
                <h2 class="fw-light mb-0">
                  <i data-feather="arrow-up" class="text-info"></i> {{$article}}
                </h2>
                <span class="text-muted">Total Article</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Services</h4>
              <div class="text-end">
                <h2 class="fw-light mb-0">
                  <i data-feather="arrow-up" class="text-purple"></i> {{$service}}
                </h2>
                <span class="text-muted">Total Services</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        {{-- <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Yearly Sales</h4>
              <div class="text-end">
                <h2 class="fw-light mb-0">
                  <i data-feather="arrow-down" class="text-danger"></i> $12,000
                </h2>
                <span class="text-muted">Todays Income</span>
              </div>
              <span class="text-danger">80%</span>
              <div class="progress">
                <div
                  class="progress-bar bg-danger"
                  role="progressbar"
                  style="width: 80%; height: 6px"
                  aria-valuenow="25"
                  aria-valuemin="0"
                  aria-valuemax="100"
                ></div>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- Column -->
      </div>
      <!-- Row -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->

  {{-- </div> --}}

@endsection