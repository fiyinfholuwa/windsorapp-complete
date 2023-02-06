
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Testimonials <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Email</th>
                   
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
              
              @if(count($users) > 0)
              <?php $num = 1; ?>
              @foreach($users as $user)

                      <tr>
                          <td>{{$num++;}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->phone_number}}</td>
                          <td>
                            @if($user->user_type== 1)
                            <span class="btn btn-success btn-sm">Manager</span>
                            @else
                            <span class="btn btn-warning btn-sm">Regular User</span>
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        
                        <td>
                      
                        <a href="{{route('user.edit', $user->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>
                       
                        <a href="#" data-toggle="modal" data-target="#user_{{$user->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                      </td>
                      @include('backend.modals.deleteUser')
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