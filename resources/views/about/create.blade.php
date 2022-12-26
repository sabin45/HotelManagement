@extends('admin.layouts.app')
@section('content')
@section('title')
Create About
@endsection
<form class="row g-3 needs-validation" method="POST" action="{{route('about.store')}}" enctype="multipart/form-data" novalidate>
@csrf

  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Image Link<span style="color:red;">*</span></label>
    <input type="text" class="form-control"  name="img_link" require>
  
  </div>

  
  <div class="col-md-9 form-group">
    <label for="validationCustom01" class="form-label">Description<span style="color:red;">*</span></label>
    <textarea id="description" class="form-control" name="description" require></textarea>

  </div>


  

<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Submit</button>
</div> 

@endsection
</form>
<script type ="text/javascript">

        CKEDITOR.replace('description');
</script>
<style>
.ck-editor__editable_inline {
    min-height: 400px;
} </style>