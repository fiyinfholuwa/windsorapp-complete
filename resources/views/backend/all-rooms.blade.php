
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Rooms <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room Label</th>
                    <th scope="col">Price</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Services</th>
                    <th scope="col">Poster Image</th>
                    <th scope="col">Image 2</th>
                    <th scope="col">Image 3</th>
                    <th scope="col">Image 4</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
                @if(count($rooms) > 0)
                <?php $num = 1; ?>
              @foreach($rooms as $room)

              <tr>
                  <td>{{$num++;}}</td>
                  <td>{{$room->label->room_label}}</td>
                  <td>{{$room->price}}</td>
                  <td> {!!Str::limit(html_entity_decode($room->capacity),20,"...")!!}</td>
                  <td> {!!Str::limit(html_entity_decode($room->service),20,"...")!!}</td>
                  <td><img src="{{asset($room->poster_img)}}" height="40px" width="40px" /></td>
                  <td><img src="{{asset($room->image_2)}}" height="40px" width="40px" /></td>
                  <td><img src="{{asset($room->image_3)}}" height="40px" width="40px" /></td>
                  <td><img src="{{asset($room->image_4)}}" height="40px" width="40px" /></td>
                  <td>@if($room->status =="Available")
                  <span  class="btn btn-success btn-sm" style="font-size: 8px;">Available</span>
                  @else
                  <span  class="btn btn-warning btn-sm" style="font-size: 8px;">Unavailable</span>
                  @endif
                  </td>
                  
                  <td>
                  <a href="{{route('room.edit', $room->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>    
                  <a href="#" data-toggle="modal" data-target="#deleteRoom_{{$room->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                  @include('backend.modals.deleteRoom')
                </td>
                
                </tr>

              @endforeach

            @else
              <tr>
                <td colspan="5" class="text-center">No Data Found</td>
              </tr>
            @endif
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

    

      </div>
    </div><!-- End Left side columns -->

  

  </div>
</section>

</main><!-- End #main -->

 
@endsection