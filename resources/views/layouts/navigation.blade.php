<nav>
        <ul class="menu">
            <li class="logo"><a href="#"><img src="{{asset('img/winsorlogo.png')}}" alt="companylogo" /></a></li>
            <li class="item"><a href="{{route('home')}}">Home</a></li>
            <li class="item"><a href="{{route('rooms')}}">Apartments</a></li>
            <li class="item"><a href="{{route('about')}}">About Us</a></li>
            <li class="item"><a href="{{route('jobs')}}">Jobs</a></li>
            <li class="item"><a href="{{route('contact')}}">Contact Us</a></li>
            @auth
            @if(Auth::check() && Auth::user()->user_type == "1")
            <li class="item button"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="item button"><a href="{{route('booking.user')}}">My Bookings</a></li>
            @else
            <li class="item button"><a href="{{route('booking.user')}}">My Bookings</a></li>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <li class="item"><button  type="submit" class="border-0" style="background:transparent; color: #C70039;">
             Logout
              </button></li>
          </form>
           
            @else
            <li class="item button"><a href="{{route('login')}}">Login</a></li>
            <li class="item button secondary"><a href="{{route('register')}}">Sign Up</a></li>
            @endauth
           
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>