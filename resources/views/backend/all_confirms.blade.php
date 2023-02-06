
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Payment Confirmations.<span></span></h5>

              <table class="table table-borderless datatable">
              <thead>
                      <tr>
                        <th scope="col">#BookingId</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Amount Sent</th>
                        <th>Full Name</th>
                        <th>Confirmation Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($confirms)> 0)
                    @foreach($confirms as $confirm)
                      <tr>
                       <td>{{$confirm->bookingId}}</td>
                       <td>{{$confirm->account_name}}</td>
                       <td>{{$confirm->bank_name}}</td>
                       <td>{{$confirm->amount_sent}}</td>
                       <td>{{$confirm->full_name}}</td>
                       <td>
                           @if($confirm->verify_status == "accepted")
                           <span class="btn btn-success btn-sm">accepted</span>
                           @elseif($confirm->verify_status == "pending")
                           <span class="btn btn-warning btn-sm">Awaiting confirmation</span>
                           @else
                           <span class="btn btn-danger btn-sm">rejected</span>
                           @endif
                      
                         <td>
                         @if($confirm->verify_status == "accepted")
                         
                           @else
                           <a href="{{route('confirm.edit', $confirm->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>
                           @endif
                    
                          <a href="#" data-toggle="modal" data-target="#confirm_{{$confirm->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                      </td>
                      @include('backend.modals.deleteConfirm')
                      </tr>
                      @endforeach
                     @else
                     <p class="text-center">No recent payment Confirmation</p>
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