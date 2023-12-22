@extends('backend.layouts.main')
@section('content')

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-5 align-self-center">
                <h3 class="page-title">Contacts</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Contact
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-7 justify-content-end align-self-center d-none d-md-flex">

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Contact</h4>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success" id="alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('danger'))
                    <div class="alert alert-danger" id="alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session('danger') }}
                    </div>
                    @endif

                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
                        rel="stylesheet">

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <link rel="stylesheet" type="text/css"
                        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

                    <script type="text/javascript">
                    $("document").ready(function() {

                        setTimeout(function() {
                            $("div.alert").remove();
                        }, 3000);
                    });
                    </script>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$contact['name']}}</td>
                                        <td>{{$contact['email']}}</td>
                                        <td>{{$contact['subject']}}</td>
                                        <td>{{$contact['message']}}</td>
                                        <td>
                                            <form action="{{route('contact.destroy',$contact->id)}}" method="post"
                                                class="pl-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete <i
                                                        data-feather="trash-2" class="feather-sm"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection