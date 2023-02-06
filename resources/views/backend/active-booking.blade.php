
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">Active Bookings<span></span></h5>

              <table class="table table-borderless datatable">
              <thead>
                      <tr>
                        <th scope="col">#BookingId</th>
                        <th scope="col">CheckIn</th>
                        <th scope="col">CheckOut</th>
                        <th scope="col">Guest</th>
                       <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($orders)> 0)
                    @foreach($orders as $order)

                      <tr>
                       <td>{{$order->bookingId}}</td>
                       <td>{{$order->checkIn}}</td>
                       <td>{{$order->checkOut}}</td>
                       <td>{{$order->guest}}</td>
                       <td>
                        
                        <a href="{{route('booking.edit', $order->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>
                        <a href="#" data-toggle="modal" data-target="#booking_{{$order->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                      </td>
                        @include('backend.modals.deleteBooking')
                      </tr>
                      @endforeach
                     @else
                     <p class="text-center">No recent Order</p>
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