@extends('admin.layouts.app')
@section('content')
@section('title')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Sliders</h2>
</div>
<div class="text-left">
<a class="btn btn-primary" href="{{ route('sliders.index') }}"> Back</a>
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
<form class="row g-3 needs-validation" method="POST" action="{{ route('sliders.update',$sliders->id) }}" enctype="multipart/form-data" novalidate >
@csrf
@include('admin.inc.flash-message')
@method('PUT')

  <div class="col-md-12">
    <label for="validationBlog" class="form-label">Name</label>
    <input type="text" class="form-control"  name="name" value="{{$sliders->name}}">
 
  </div>
  <div class="col-md-12">
    <label for="validationBlog" class="form-label">Image Link</label>
    <input type="text" class="form-control"  name="img_link" value="{{$sliders->img_link}}">
  
  </div>
  
  

<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Update</button>
</div> 
</form>
@endsection
