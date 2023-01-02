@extends('admin.layouts.app')



  <!-- Content Wrapper. Contains page content -->
  
@section('content')
    <!-- Main content -->
  
   
              @section('title')
             Manage About
              @endsection
              @include('admin.inc.flash-message')

              <a href="{{route('about.create')}}" class="btn btn-info btn-md" role="button">
          <i class="fas fa-plus" >Add About</i>
        </a>

            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblAbout" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>S.N.</th>
                    <th>Image Link</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                  </thead>
                  <tbody>
                      @if($abouts)
                      @foreach($abouts as $about)

                  <tr>
                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$about->img_link}}</td>
                                    <td>{{$about->description}}</td>
                                    
                                    
                                    <td>
                                        @if($about->status==1)
                                        <a href="{{url('/status-update',$about->id)}}"  class="btn btn-primary btn-sm">Active</a>
                                        
                                        @else
                                        <a href="{{url('/status-update',$about->id)}}"  class="btn btn-danger btn-sm">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                    
                                    <form action="{{route('about.destroy',$about->id)}}" method="POST">
                                        @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    
                                    <button class="btn btn-danger btn-sm mr-2" type="submit" >  <i class="la la-trash text-white "></i> </button>
                                    <a class="btn btn-info btn-sm " href="{{route('about.edit',$about->id)}}"><i class="la la-edit text-white "></i>Edit</a>
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
  



  