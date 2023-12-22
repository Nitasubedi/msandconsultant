@extends('backend.layouts.main')
@section('content')
    
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
          <div class="col-md-5 align-self-center">
            <h3 class="page-title">Testimonial Management</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('testimonial.index')}}">Testimonial</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Update
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
                  <h4 class="card-title mb-3 pb-3 border-bottom">Update Testimonial</h4>
                  <form action="{{route('testimonial.update', $testimonial->id)}}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="customer_name" value="{{$testimonial->customer_name}}" class="form-control" id="tb-fname" placeholder="Enter Title here" required/>
                          <label for="tb-fname">Customer Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">Customer Image</label>
                          <input class="form-control" name="customer_img" type="file" id="formFile" onchange="loadFile(event)"/>
                          <p><img src="{{asset('public/'.$testimonial->customer_img)}}" id="output" width="100" /></p>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <textarea name="message" id="textarea" hidden>{{$testimonial->message}}</textarea>
                        <div class="mb-3">
                          <label for="" class="form-label">Message</label>
                        <div id="editor" style="height: 200px">
                            {{$testimonial->message}}
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
  let testimonial = document.getElementById('testimonial');
  testimonial.classList.add('active');

  var quill = new Quill("#editor", {
    theme: "snow",
  });

  let content = document.getElementById("editor");
    let textarea = document.getElementById("textarea");
    content.onkeyup = (e)=>{
        textarea.value = e.target.childNodes[0].innerText;
    }
</script>
@endpush