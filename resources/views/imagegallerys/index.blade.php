<?php
use App\Common;
?>
@extends('layouts.app')

@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

<style type="text/css">
.gallery
{
    display: inline-block;
    margin-top: 20px;
}

.img_div{
  float: left;
  margin:20px;
  display: inline-block
  text-align: center
}
.img-responsive{
  width:300px;
}
</style>

@if(Session::has('msg'))
    <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{Session::get('msg')}}</strong> Permission not granted.
    </div>
@endif

<h3>Upload New Image</h3>
    <form action="{{ url('imagegallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

        {!! csrf_field() !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="row">
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>

    <div class="row">
    <div class='list-group gallery'>
            @if($images->count())
                @foreach($images as $image)
                <div class='img_div'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                        <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />
                        <div class='text-center'>
                            <small class='text-muted'>{{ $image->title }}</small>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="{{ url('imagegallery/delete',$image->id) }}" method="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger">Delete</button>
                    </form>
                </div> <!-- col-6 / end -->
                @endforeach
            @endif


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
    @endsection
