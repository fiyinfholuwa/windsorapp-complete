
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Messages <span>| from Clients</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Messages</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                <?php $num = 1; ?>
                @if(count($messages) > 0)

              @foreach($messages as $message)

                      <tr>
                          <td>{{$num++;}}</td>
                          <td>{{$message->fullname}}</td>
                          <td>{{$message->email}}</td>
                          <td>{{$message->phoneNumber}}</td>
                          <td>{{$message->message}}</td>
                          <td><a href="#" data-toggle="modal" data-target="#messageDelete_{{$message->id}}" ><i style="color:red;" class="bi bi-trash"></i></a></td>
                          @include('backend.modals.deleteMessage')
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