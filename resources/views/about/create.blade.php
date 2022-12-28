@extends('admin.layouts.app')
@section('content')
@section('title')
Create About
@endsection
<form class="row g-3 needs-validation" method="POST" action="{{route('about.store')}}" enctype="multipart/form-data" novalidate>
@csrf
@include('admin.inc.flash-message')

<div class="form-group mb-3">                               
  <label for="">Browse Image <span style="color:red;">*</span></label>
</div>

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Browse Image
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="myModalLabel">Choose Image</h1>
        <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <style>
        [ type=radio]:checked+img{
          outline: 2px solid blue;
        }
       </style>

              @if($files)
                @foreach($files as $file)
                  <label>
                    <input type="radio" id="selectimage" name="img" value="{{$file->file_link}}" style="opacity: 0;" />
                    <img class="card-img-top" src="{{asset('uploads\files')}}/{{$file->file_link}}" alt="" style="width:100%; height:110px; object-fit:contain">
                  </label>
                @endforeach
              @endif
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-close btn-primary" onclick="firstFunction()" data-dismiss="modal">Select</button>
      </div>
    </div>
  </div>
</div>



  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Image Link<span style="color:red;">*</span></label>
    <input type="text" id ="imagebox" class="form-control" name="img_link" require>
  
  </div>

  
  <div class="col-md-9 form-group">
    <label for="validationCustom01" class="form-label">Description<span style="color:red;">*</span></label>
    <textarea id="description" class="form-control" name="description" require></textarea>

  </div>


  

<div class="col-md-12 mt-2">
  <button class="btn btn-primary " type="submit" style="margin-bottom: 50px">Submit</button>
</div> 


</form>

<script type ="text/javascript">
	// copy link of an image
  function firstFunction() {
			document.getElementById('imagebox').value = document.querySelector('input[name=img]:checked').value;
		} </script>
@endsection