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
                                      @if($file->status==1)
                                        <a href="javascript:void(0)" id ="status{{$file->id}}" title='on' onclick="status('{{$file->id}}','{{$file->status}}')"><img src="{{url('')}}/uploads/files/onpng.png" alt="" style="display:block; object-fit: contain;" width="80%" height="50px"></a>
                                        @else
                                        <a href="javascript:void(0)" id ="status{{$file->id}}" title="off" onclick="status('{{$file->id}}','{{$file->status}}')"><img src="{{url('')}}/uploads/files/offpng.png" alt="" style="display:block; object-fit: contain;" width="80%" height="50px"></a>
                                        @endif
                                   
                                    </td>
                                    <td>
                    
                                    <form action="{{route('files.destroy',$file->id)}}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure Want to Delete?')"><i class="fa fa-trash"></i></button>
                                    <a class="btn btn-info" href="{{ route('files.show',$file->id) }}"><i class="fa fa-eye"></i></a>
                                    <!-- <a class="btn btn-info btn-sm " href="{{route('files.edit',$file->id)}}"><i class="la la-edit text-white "></i>Edit</a> -->
                                     <!-- <button class="btn btn-info btn-sm " type="submit" ><i class="la la-edit text-white "></i> </button> --> 
                                    </div>
                                    
                                   
                </td>     
                  </tr>
                  </form>
                  @endforeach
                 @endif
                </table>
                
              </div>
              
          <script>
            function status(id,status){
             // alert(id+"-"+status);
              var stp = document.getElementById('status' + id).title;
//alert(stp);
              if(stp == "on"){
                stf = 0;
              
              }
              if(stp == "off"){
                stf = 1;
              }

              $.ajax({
                url:"/FilesController/status/update/" + id + "/" + stf,

                success: function(response){
                  if (response.status == "1"){
                   
                    document.getElementById('status' + id).innerHTML = '<img src="{{url('')}}/uploads/files/onpng.png" alt="" style="display:block; object-fit: contain;" width="80%" height="50px">';
                    document.getElementById('status' + id).title = 'on';
                  
                  }
                  if(response.status == "0"){
                  document.getElementById('status' + id).innerHTML = '<img src="{{url('')}}/uploads/files/offpng.png" alt="" style="display:block; object-fit: contain;" width="80%" height="50px">';
                  document.getElementById('status' + id).title = 'off';
                  }
                }
              })

            }
          </script>    
         
    
    @endsection
  

  

   