@extends('admin.layouts.app')

  <!-- Content Wrapper. Contains page content -->
  
@section('content')
    <!-- Main content -->
  
   
              @section('title')
             Manage Blog
              @endsection
              @include('admin.inc.flash-message')

              <a href="{{route('blogs.create')}}" class="btn btn-info btn-md" role="button">
          <i class="fas fa-plus" >Add Blog</i>
        </a>

            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblBolg" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>S.N.</th>
                    <th>Image Link</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Description</th>
                    <th>Button Link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                  </thead>
                  <tbody>
                      @if($blogs)
                      @foreach($blogs as $test)

                  <tr>
                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$test->img_link}}</td>
                                    <td>{{$test->title}}</td>
                                    <td>{{$test->sub_title}}</td>
                                    <td>{{$test->description}}</td>
                                    <td>{{$test->btn_link}}</td>
                                    
                                    
                                    
                                    <td>
                                        @if($test->status==1)
                                        <p class="btn btn-primary btn-sm">Active</p>
                                        @else
                                        <p class="btn btn-secondary btn-sm">Deactive</p>
                                        @endif
                                    </td>
                                    <td>
                    
                                    <form action="{{route('blogs.destroy',$test->id)}}" method="POST">
                                        @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    
                                    <button class="btn btn-danger btn-sm mr-2" type="submit" >  <i class="la la-trash text-white "></i> </button>
                                    <a class="btn btn-info btn-sm " href="{{route('blogs.edit',$test->id)}}"><i class="la la-edit text-white "></i>Edit</a>
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
  



  