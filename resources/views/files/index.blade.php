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
                                    <td><img src="{{asset('uploads\files')}}/{{$file->file_link}}" alt=""style="display:block; object-fit: contain;" width="100%" height="120px"></td>
                                    <td>{{$file->ext}}</td>
                                    <td>
                                        @if($file->status==1)
                                        <p class="btn btn-primary btn-sm">Active</p>
                                        @else
                                        <p class="btn btn-secondary btn-sm">Deactive</p>
                                        @endif
                                    </td>
                                    <td>
                    
                                    <form action="{{route('files.destroy',$file->id)}}" method="POST">
                                    <a class="btn btn-info" href="{{ route('files.show',$file->id) }}">Show</a>    
                                    
                                    @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    
                                    <button class="btn btn-danger btn-sm mr-2" type="submit" >  <i class="la la-trash text-white "></i> </button>
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
              
  
    
    @endsection
  



  