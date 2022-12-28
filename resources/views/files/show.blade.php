
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show FIles</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('files.index') }}"> Back</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
{{ $files->name }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>File Link:</strong>
{{ $files->file_link }}
</div>
</div>
</div>
@endsection