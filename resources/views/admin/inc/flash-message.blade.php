@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
  <strong>{{ $message }}</strong>
</div>

@endif 
    
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
</div>
@endif
     
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
</div>
@endif
     
@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
</div>
@endif
    
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please check the form below for errors</strong>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
</div>
@endif