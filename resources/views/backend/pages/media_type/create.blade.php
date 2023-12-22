@extends('backend.layouts.main')
@section('content')
    
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
          <div class="col-md-5 align-self-center">
            <h3 class="page-title">Media Type</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('media_type.index')}}"> Media Type</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Create
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
                  <h4 class="card-title mb-3 pb-3 border-bottom">Create Media Type</h4>
                  <form action="{{route('media_type.store')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <input type="text" name="name" class="form-control" id="tb-fname" placeholder="Enter Name here"/>
                          <label for="tb-fname">Name</label>
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

@push('custom-scripts')
  <script>
    let mediaType = document.getElementById('mediaType');
    let setting = document.getElementById('setting');
    let setting1 = document.getElementById('setting1');
    let setting2 = document.getElementById('setting2');
    setting.classList.add('selected');
    setting1.classList.add('active');
    setting2.classList.add('in');
    mediaType.classList.add('active');
  </script>
@endpush