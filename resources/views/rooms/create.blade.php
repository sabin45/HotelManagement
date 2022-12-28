@extends('admin.layouts.app')
@section('content')
@section('title')
Create Roomd
@endsection
<form class="row g-3 needs-validation" method="POST" action="{{route('rooms.store')}}" enctype="multipart/form-data" novalidate>
@csrf
@include('admin.inc.flash-message')
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Image Link</label>
    <input type="text" class="form-control"  name="img_link" require>
  
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Title</label>
    <input type="text" class="form-control"  name="title" require>
  
  </div>
  
  <div class="col-md-9 form-group">
    <label for="validationCustom01" class="form-label">Description</label>
    <textarea id="imagebox" class="form-control" name="description" require></textarea>

  </div>  

<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Submit</button>
</div> 

@endsection
</form>