@extends('admin.layouts.app')

  <!-- Content Wrapper. Contains page content -->
  
@section('content')
    <!-- Main content -->
  
   
              @section('title')
             Manage Slider
              @endsection
              @include('admin.inc.flash-message')
             

              <a href="{{route('sliders.create')}}" class="btn btn-info btn-md" role="button">
          <i class="fas fa-plus" >Add Slider</i>
        </a>

            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="slider" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>S.N.</th>
                    <th>Name</th>
                    <th>Image Link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                  </thead>
                  <tbody>
                      @if($sliders)
                      @foreach($sliders as $slider)

                  <tr>
                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$slider->name}}</td>
                                    <td>{{$slider->img_link}}</td>
                                    <td>
                                        @if($slider->status==1)
                                        <p class="btn btn-primary btn-sm">Active</p>
                                        @else
                                        <p class="btn btn-secondary btn-sm">Deactive</p>
                                        @endif
                                    </td>
                                    <td>
                    
                                    <form action="{{route('sliders.destroy',$slider->id)}}" method="POST">
                                        @csrf
                                    @method('DELETE')
                                    <div class="row-md-3" style="display: flex; justify-content:flex-end;"> 
                                    
                                    <button class="btn btn-danger btn-sm mr-2" type="submit" >  <i class="la la-trash text-white "></i> </button>
                                    <a class="btn btn-info btn-sm " href="{{route('sliders.edit',$slider->id)}}"><i class="la la-edit text-white "></i>Edit</a>
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
  



  