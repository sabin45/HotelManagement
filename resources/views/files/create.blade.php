@extends('admin.layouts.app')
@include('admin.inc.flash-message')
@section('content')
@section('title')
Create Files
@endsection
<form class="row g-3 needs-validation" method="POST" action="{{route('files.store')}}" enctype="multipart/form-data" novalidate>
@csrf

<div class="col-md-6 form-group">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control"  name="name" require>

  </div>

  <div class="col-md-9 mb-3  form-group">
  <label for="formFile" class="form-label">Browse FIle</label>
  <input class="form-control" type="file" id="file_link"name="file_link" require>
</div>
  
<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Submit</button>
</div> 

@endsection
</form>