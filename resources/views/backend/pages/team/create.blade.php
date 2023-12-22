@extends('backend.layouts.main')
@section('content')
    
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
          <div class="col-md-5 align-self-center">
            <h3 class="page-title">Team Management</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('team.index')}}">Team</a></li>
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
                  <h4 class="card-title mb-3 pb-3 border-bottom">Create Team</h4>
                  <form action="{{route('team.store')}}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="name" class="form-control" id="tb-fname" placeholder="Enter Name here" required/>
                          <label for="tb-fname">Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="address" class="form-control" id="tb-address" placeholder="Enter Address Here" required/>
                          <label for="tb-address">Address</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="email" name="email" class="form-control" id="tb-email" placeholder="name@example.com" required/>
                          <label for="tb-email">Email address</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="mobile_no" class="form-control" id="tb-mobile_no" placeholder="Enter mobile_no Here" required/>
                          <label for="tb-mobile_no">Mobile No</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" name="phone_no" class="form-control" id="tb-phone_no" placeholder="Enter phone_no Here" required/>
                          <label for="tb-phone_no">Phone No</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label for="" class="form-label">Gender:</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
                              <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="date" name="dob" class="form-control" id="tb-phone_no" placeholder="Enter Here" required/>
                          <label for="tb-phone_no">Date of Birth</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="date" name="joining_date" class="form-control" id="tb-phone_no" placeholder="Enter Here" required/>
                          <label for="tb-phone_no">Joining Date</label>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">Image</label>
                          <input class="form-control" name="image" type="file" id="formFile" onchange="loadFile(event)" />
                          <p><img id="output" width="100" /></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <select name="blood_group" class="form-control" required>
                            <option selected disabled>Select Blood Group</option>
                            <option value="O+">O+</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O-">O-</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                          </select>
                          <label for="tb-address">Select Blood Group</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <textarea name="bio" id="textarea" hidden></textarea>
                        <div class="mb-3">
                          <label for="" class="form-label">Bio Data</label>
                          <div id="editor" style="height: 200px">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-md-flex align-items-center">
                          <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class=" btn btn-info font-weight-medium rounded-pill px-4">
                              <div class="d-flex align-items-center">
                                <i
                                  data-feather="send"
                                  class="feather-sm fill-white me-2"
                                ></i>
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
  let team = document.getElementById('team');
  team.classList.add('active');

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