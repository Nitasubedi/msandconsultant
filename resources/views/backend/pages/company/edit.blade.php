@extends('backend.layouts.main')
@section('content')
    
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
          <div class="col-md-5 align-self-center">
            <h3 class="page-title">Company Management</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('company.index')}}">Company</a></li>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3 pb-3 border-bottom">Update Company</h4>
                  <form action="{{route('company.update',$company->id)}}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="name" value="{{$company->name}}" class="form-control" id="tb-fname" placeholder="Enter Name here" required/>
                          <label for="tb-fname">Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="pan_vat_no" value="{{$company->pan_vat_no}}" class="form-control" id="tb-fname" placeholder="Enter Name here" required/>
                          <label for="tb-fname">Pan/Vat No</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="email" name="email" value="{{$company->email}}" class="form-control" id="tb-email" placeholder="name@example.com" required/>
                          <label for="tb-email">Email address</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="address" value="{{$company->address}}" class="form-control" id="tb-address" placeholder="Enter Address Here" required/>
                          <label for="tb-address">Address</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="phone_no" value="{{$company->phone_no}}" class="form-control" id="tb-phone_no" placeholder="Enter phone_no Here" required/>
                          <label for="tb-phone_no">Phone No</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="mobile_no" value="{{$company->mobile_no}}" class="form-control" id="tb-mobile_no" placeholder="Enter mobile_no Here" required/>
                          <label for="tb-mobile_no">Mobile No</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">Image</label>
                          <input class="form-control" name="image" type="file" id="formFile" onchange="loadFile(event)"/>
                          <p><img src="{{asset('public/'.$company->image)}}" alt="{{$company->name}}" id="output" width="100" /></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="location_embed_link" value="{{$company->location_embed_link}}" class="form-control" id="tb-address" placeholder="Enter Here" required/>
                          <label for="tb-address">Location Embeded Link</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <textarea name="description" id="textarea" hidden>{{$company->description}}</textarea>
                        <div class="mb-3">
                          <label for="" class="form-label">Description</label>
                        <div id="editor" style="height: 200px">
                           {{$company->description}}
                        </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-md-flex align-items-center mt-3">
                          <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class=" btn btn-info font-weight-medium rounded-pill px-4">
                              <div class="d-flex align-items-center">
                                <i
                                  data-feather="send"
                                  class="feather-sm fill-white me-2"
                                ></i>
                                Update
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
  let company = document.getElementById('company');
  company.classList.add('active');

  var quill = new Quill("#editor", {
    theme: "snow",
  });

  let content = document.getElementById("editor");
    let textarea = document.getElementById("textarea");
    content.onkeyup = (e)=>{
        // console.log(e.target.childNodes[0].innerText);
        textarea.value = e.target.childNodes[0].innerText;
    }
</script>
@endpush