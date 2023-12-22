@extends('frontend.layouts.main')
@section('content')

<h1>Gallery </h1>

<img src="/public/storage/gallery_images" alt="Image">

<form action="/galleries/1/upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <input type="text" name="caption" placeholder="Caption">
    <button type="submit">Upload Image</button>
</form>

@endsection