@extends('admin.layouts.app')


  <!-- Content Wrapper. Contains page content -->
  
@section('content')
    <!-- Main content -->
  
   
              @section('title')
             Manage File
              @endsection
             
              @include('admin.inc.flash-message')
              <a href="{{route('files.create')}}" class="btn btn-info btn-md" role="button">
          <i class="fas fa-add" >Add File</i>
        </a>
      
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblFIle" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>S.N.</th>
                    <th>Name</th>
                    <th>FIle</th>
                    <th>Extension</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                  </thead>
                  <tbody>
                      @if($files)
                      @foreach($files as $file)

                  <tr>
                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$file->name}}</td>
                                    <td><img src="{{asset('uploads\files')}}/{{$file->file_link}}" alt=""style="display:block; object-fit: contain;" width="80%" height="100px"></td>
                                    <td>{{$file->ext}}</td>
                                    <td>
                                    <input data-id="{{$file->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $file->status ? 'checked' : '' }}>
                                    </td>
                                    <td>
                    
                                    <form action="{{route('files.destroy',$file->id)}}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure Want to Delete?')"><i class="fa fa-trash"></i></button>
                                    <a class="btn btn-info" href="{{ route('files.show',$file->id) }}"><i class="fa fa-eye"></i></a>
                                    <!-- <a class="btn btn-info btn-sm " href="{{route('files.edit',$file->id)}}"><i class="la la-edit text-white "></i>Edit</a> -->
                                     <!-- <button class="btn btn-info btn-sm " type="submit" ><i class="la la-edit text-white "></i> </button> --> -->
                                    </div>
                                    
                                   
                </td>     
                  </tr>
                  </form>
                  @endforeach
                 @endif
                </table>
                
              </div>
              
              <script>
   $(function() { 
           $('.toggle-class').change(function() { 
           var status = $(this).prop('checked') == true ? 1 : 0;  
           var file_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/status/update', 
               data: {'status': status, 'file_id': file_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
</script>
    
    @endsection
  

    <input data-id="{{$file->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $file->status ? 'checked' : '' }}>

   