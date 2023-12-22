@extends('backend.layouts.main')
@section('content')


@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

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
                        <h4 class="card-title mb-3 pb-3 border-bottom">Create Gallery</h4>
                        <form action="{{route('gallery.store')}}" method="POST" id="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" class="form-control" id="tb-fname" placeholder="Enter Title here" required />
                                        <label for="tb-fname">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Image</label>
                                        <input class="form-control" name="image" type="file" id="formFile" onchange="loadFile(event)" />
                                        <p><img id="output" width="100" /></p>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-md-flex align-items-center mt-3">
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
        let gallery = document.getElementById('gallery');
        gallery.classList.add('active');

        var quill = new Quill("#editor", {
            theme: "snow",
        });

        let content = document.getElementById("editor");
        let textarea = document.getElementById("textarea");
        content.onkeyup = (e) => {
            // console.log(e.target.childNodes[0].innerText);
            textarea.value = e.target.childNodes[0].innerText;
        }
    </script>
    @endpush