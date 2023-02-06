
@extends('backend.layouts.master')

 @section('content')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">All Users <span>| Clients</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{count($all_user)}}</h6>
                        <a href="{{route('all.users')}}">view all</a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->


              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">All Jobs <span>| created</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{count($all_jobs)}}</h6>
                      
                      <a href="{{route('jobs.all')}}">view all</a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->


              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Job Applications <span>| Applicants</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-search"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{count($all_apply_job)}}</h6>
                      <a href="{{route('jobs.apply.all')}}">view all</a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->


            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Testimonials <span>| created</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{count($all_testimonials)}}</h6>
                    
                      <a href="{{route('testimonial.all')}}">view all</a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Active Bookings<span>| All</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{count($orders)}}</h6>
                    
                      <a href="{{route('admin.booking.all')}}">view all</a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <!-- <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div> -->

                </div>
              </div>

            </div><!-- End Customers Card -->

            

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

               

                <div class="card-body">
                  <h5 class="card-title">Recent Booking <span class="badge badge-secondary">Paid <span>| latest</span> <a href="{{route('admin.booking.all')}}" class="btn btn-danger">View all booking</a></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#BookingId</th>
                        <th scope="col">CheckIn</th>
                        <th scope="col">CheckOut</th>
                        <th scope="col">Guest</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($recent_order)> 0)
                    @foreach($recent_order as $order)

                      <tr>
                       <td>{{$order->bookingId}}</td>
                       <td>{{$order->checkIn}}</td>
                       <td>{{$order->checkOut}}</td>
                       <td>{{$order->guest}}</td>
                       
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