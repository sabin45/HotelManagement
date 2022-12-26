@extends('admin.layouts.app')
@section('content')
@section('title')
Create Blogs
@endsection
<form class="row g-3 needs-validation" method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data" novalidate>
@csrf

  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Image Link</label>
    <input type="text" class="form-control"  name="img_link" require>
  
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Title</label>
    <input type="text" class="form-control"  name="title" require>
  
  </div>
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Sub Title</label>
    <input type="text" class="form-control"  name="sub_title" require>
  
  </div>

  
  <div class="col-md-9 form-group">
    <label for="validationCustom01" class="form-label">Description</label>
    <textarea id="description" class="form-control" name="description" require></textarea>

  </div>

  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Button Link</label>
    <input type="text" class="form-control"  name="btn_link" require>
  
  </div>
  

<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Submit</button>
</div> 

@endsection
</form>
<Script type ="text/javascript">

    CKEDITOR.replace('description');
  </Script>
<style>
.ck-editor__editable_inline {
    min-height: 400px;
}
</style>