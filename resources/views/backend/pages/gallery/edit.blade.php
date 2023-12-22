@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-5 align-self-center">
                <h3 class="page-title">Gallery Management</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('gallery.index')}}">Gallery</a></li>
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
                        <h4 class="card-title mb-3 pb-3 border-bottom">Update Gallery</h4>
                        <form action="{{route('gallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" value="{{$gallery->title}}" class="form-control" id="tb-fname" placeholder="Enter Title here" required />
                                    </div> <label for="tb-fname">Title</label>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Image</label>
                                        <input class="form-control" name="image" type="file" id="formFile" onchange="loadFile(event)" />
                                        <p><img src="{{asset('public/'.$gallery->image)}}" id="output" width="100" />
                                        </p>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="d-md-flex align-items-center mt-3">
                                        <div class="ms-auto mt-3 mt-md-0">
                                            <button type="submit" class=" btn btn-info font-weight-medium rounded-pill px-4">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="send" class="feather-sm fill-white me-2"></i>
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
        let gallery = document.getElementById('gallery');
        gallery.classList.add('active');

        let timeLimit = document.getElementById('timeLimit');
        let expires = document.getElementById('expires');

        if (timeLimit.value == 1) {
            expires.removeAttribute('readonly');
        }

        timeLimit.addEventListener('change', () => {
            if (timeLimit.value == 1) {
                expires.removeAttribute('readonly');
            } else if (timeLimit.value == 0) {
                expires.setAttribute('readonly', null);
                expires.value = null;
            }
        })


        var quill = new Quill("#editor", {
            theme: "snow",
        });

        let content = document.getElementById("editor");
        let textarea = document.getElementById("textarea");
        content.onkeyup = (e) => {
            textarea.value = e.target.childNodes[0].innerText;
        }
    </script>
    @endpush