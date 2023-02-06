
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">Active Reservations<span></span></h5>

              <table class="table table-borderless datatable">
              <thead>
                      <tr>
                        <th scope="col">#BookingId</th>
                        <th scope="col">CheckIn</th>
                        <th scope="col">CheckOut</th>
                        <th scope="col">Guest</th>
                        <th>Payment Status</th>
                      
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
                           @if($order->payment_status == "Paid")
                           <span class="btn btn-success btn-sm">Paid</span>
                           @elseif($order->payment_status == "Pending")
                           <span class="btn btn-warning btn-sm">Awaiting confirmation</span>
                           @else
                           <span class="btn btn-danger btn-sm">Not Paid</span>
                           @endif
                       </$order->
                       <td>
                        
                    
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