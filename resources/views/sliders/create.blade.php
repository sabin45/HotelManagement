@extends('admin.layouts.app')
@section('content')
@section('title')
Create Slider
@endsection
<form class="row g-3 needs-validation" method="POST" action="{{route('sliders.store')}}" enctype="multipart/form-data" novalidate>
@csrf
@include('admin.inc.flash-message')
<div class="col-md-9 form-group">
    <label for="validationCustom01" class="form-label">Name</label>
    <input type="text" class="form-control"  name="name" require>

  </div>

  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Image Link</label>
    <input type="text" class="form-control"  name="img_link" require>
  
  </div>


<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Submit</button>
</div> 

@endsection
</form>