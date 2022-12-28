@extends('admin.layouts.app')
@section('content')
@section('title')

<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Files</h2>
</div>
@include('admin.inc.flash-message')
<div class="text-left">
<a class="btn btn-primary" href="{{ route('files.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

@endsection
<form class="row g-3 needs-validation" method="POST" action="{{ route('files.update',$files->id) }}" enctype="multipart/form-data" novalidate >
@csrf
@include('flash-message')
@method('PUT')

  <div class="col-md-12">
    <label for="validationFileName" class="form-label">Name</label>
    <input type="text" class="form-control"  name="name" value="{{$files->name}}">
 
  </div>
  <div class="col-md-9 mb-3  form-group">
  <label for="formFile" class="form-label">Browse FIle</label>
  <input class="form-control" type="file" id="file_link"name="file_link" value="{{$files->file_link}}" require>
</div>
 
  

<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Update</button>
</div> 
</form>
@endsection
