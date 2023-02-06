
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Windsor Admin - Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/winsorlogo.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" >

 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
        <img height="120px" width="60px" src="{{asset('img/winsorlogo.png')}}" alt="logo">
        <!-- <span class="d-none d-lg-block">WindSor</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">{{count($count_payment)}}</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have {{count($count_payment)}} new messages
              <a href="{{route('payment.confirm.admin')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @if(count($payment_status) > 0)
            
            @foreach($payment_status as $status)
            <li class="message-item">
              <a href="{{route('payment.confirm.admin')}}">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>{{$status->full_name}} just made a request for payment confirmation</h4>
                 
                  <p>{{$status->created_at->diffForHumans()}}</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @endforeach
           @endif

           

            <li class="dropdown-footer">
              <a href="{{route('payment.confirm.admin')}}">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="https://www.pngitem.com/pimgs/m/576-5768680_avatar-png-icon-person-icon-png-free-transparent.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
             
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-header">
              <a href="{{route('home')}}" target="_blank">Visit Main Website</a>
            </li>

            <li class="dropdown-header">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
              <button type="submit" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span style="color:red;">Sign Out</span>
              </button>
          </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
   <!-- ======= Sidebar ======= -->
   <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{route('dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

 

  
  <li class="nav-item active">
    <a class="nav-link collapsed" data-bs-target="#rooms" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Manage Room Units</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="rooms" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     
      <li>
        <a href="{{route('room.manage')}}">
          <i class="bi bi-circle"></i><span>Manage Room Label</span>
        </a>
      </li>
      <li>
        <a href="{{route('add.room')}}">
          <i class="bi bi-circle"></i><span>Add Room Unit</span>
        </a>
      </li>
      <li>
        <a href="{{route('all.room')}}">
          <i class="bi bi-circle"></i><span>All Room Units</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item active">
    <a class="nav-link collapsed" data-bs-target="#jobs" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-task"></i><span>Manage Jobs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="jobs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('job.add')}}">
          <i class="bi bi-circle"></i><span>Add Jobs</span>
        </a>
      </li>
      <li>
        <a href="{{route('jobs.all')}}">
          <i class="bi bi-circle"></i><span>All Jobs</span>
        </a>
      </li>
      <li>
        <a href="{{route('jobs.apply.all')}}">
          <i class="bi bi-circle"></i><span>All Applied Jobs</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item active">
    <a class="nav-link collapsed" data-bs-target="#bookings" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-task"></i><span>Manage Bookings</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="bookings" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('admin.booking.all')}}">
          <i class="bi bi-circle"></i><span>Active Booking</span>
        </a>
      </li>
      <li>
        <a href="{{route('booking.reservations')}}">
          <i class="bi bi-circle"></i><span>All Reservations</span>
        </a>
      </li>
      <li>
        <a href="{{route('payment.confirm.admin')}}">
          <i class="bi bi-circle"></i><span>Payment Confirmation.</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#testimonial" data-bs-toggle="collapse" href="#">
      <i class="bi bi-speaker"></i><span>Manage Testimonials</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="testimonial" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('testimonial.view')}}">
          <i class="bi bi-circle"></i><span>Add Testimonial</span>
        </a>
      </li>
      <li>
        <a href="{{route('testimonial.all')}}">
          <i class="bi bi-circle"></i><span>All Testimonials</span>
        </a>
      </li>


      
      
    </ul>
  </li><!-- End Forms Nav -->


  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#users" data-bs-toggle="collapse" href="#">
      <i class="bi bi-speaker"></i><span>Manage Users</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="users" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{route('add.user')}}">
          <i class="bi bi-circle"></i><span>Add User</span>
        </a>
      </li>
      <li>
        <a href="{{route('all.users')}}">
          <i class="bi bi-circle"></i><span>All Users</span>
        </a>
      </li>


      
      
    </ul>
  </li><!-- End Forms Nav -->

  
 

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('messages.all')}}">
      <i class="bi bi-person"></i>
      <span>Contact Messages</span>
    </a>
  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('review.all')}}">
      <i class="bi bi-chat"></i>
      <span>Reviews</span>
    </a>
  </li><!-- End Profile Page Nav -->

  

</ul>

</aside><!-- End Sidebar-->

  @yield('content')

  
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
 
 

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>


 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'success':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'warning':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'error':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break; 
 }
 @endif 


</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>