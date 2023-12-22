@extends('backend.layouts.main')
@section('content')



<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-5 align-self-center">
                <h3 class="page-title">Article Management</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article</a></li>
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
                        <h4 class="card-title mb-3 pb-3 border-bottom">Create Article</h4>
                        <form action="{{route('article.store')}}" method="POST" id="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select name="article_type_id" class="form-control" required>
                                            <option selected disabled>Select Article Type</option>
                                            @foreach ($articleTypes as $articleType)
                                            <option value="{{$articleType->id}}">{{$articleType->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="tb-address">Select Article Type</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" class="form-control" id="tb-fname"
                                            placeholder="Enter Title here" required />
                                        <label for="tb-fname">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Image</label>
                                        <input class="form-control" name="image" type="file" id="formFile"
                                            onchange="loadFile(event)" />
                                        <p><img id="output" width="100" /></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="description" id="textarea" hidden></textarea>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <div id="editor" style="height: 200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-md-flex align-items-center mt-3">
                                        <div class="ms-auto mt-3 mt-md-0">
                                            <button type="submit"
                                                class=" btn btn-info font-weight-medium rounded-pill px-4">
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
    let article = document.getElementById('article');
    article.classList.add('active');

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