@extends('admin.layouts.app')



  <!-- Content Wrapper. Contains page content -->
  
@section('content')
    <!-- Main content -->
  
   
              @section('title')
             Manage Rooms
              @endsection
              @include('admin.inc.flash-message') 

              <a href="{{route('rooms.create')}}" class="btn btn-info btn-md" role="button">
          <i class="fas fa-plus" >Add Rooms</i>
        </a>

            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblAbout" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>S.N.</th>
                    <th>Image Link</th>
                    <th>TItle </th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                  </thead>
                  <tbody>
                      @if($rooms)
                      @foreach($rooms as $room)

                  <tr>
                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$room->img_link}}</td>
                                    <td>{{$room->title}}</td>
                                    <td>{{$room->description}}</td>
                                    
                                    
                                    <td>
                                        @if($room->status==1)
                                        <p class="btn btn-primary btn-sm">Active</p>
                                        @else
                                        <p class="btn btn-secondary btn-sm">Deactive</p>
                                        @endif
                                    </td>
                                    <td>
                    
                                    <form action="{{route('rooms.destroy',$room->id)}}" method="POST">
                                        @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    
                                    <button class="btn btn-danger btn-sm mr-2" type="submit" >  <i class="la la-trash text-white "></i> </button>
                                    <a class="btn btn-info btn-sm " href="{{route('rooms.edit',$room->id)}}"><i class="la la-edit text-white "></i>Edit</a>
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
  



  