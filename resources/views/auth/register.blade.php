@extends('layouts.master')
@section('title')
{{'Register'}}
@endsection
@section('content')

<section class="login-auth" style="background: url('https://cf.bstatic.com/xdata/images/hotel/max1024x768/321441959.jpg?k=ce000a7ae2797d40e4d056b72c03fddf7e2c0c5c867a28b6df9253399dab17ea&o=&hp=1') no-repeat ; background-size: cover;" style="min-height: 70vh;">
    <div class="login-form">    
    <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="avatar"><i class="fa fa-user"></i></div>
            <h4 class="modal-title">Register Your Account | <span style="font-size:14px !important; color:navy !important;"><a href="{{route('home')}}">go to home</a></span></h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" >
                    <p style="color:red; font-weight:400;">
                        @error('name')
                        {{$message}}
                        @enderror
                    </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" >
                   
                    <p style="color:red; font-weight:400;">
                        @error('email')
                        {{$message}}
                        @enderror
                    </p>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label>Phone Number:</label>
                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" >
                <p style="color:red; font-weight:400;">
                    @error('phone_number')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
            <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
             
                <p style="color:red; font-weight:400;">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
            <label>Password Confirmation:</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
             
                <p style="color:red; font-weight:400;">
                    @error('password_confirmation')
                    {{$message}}
                    @enderror
                </p>
            </div>
                </div>
            </div>
            
           
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Register">   
            <div class="text-center small"><span id="text-l">Already have an account?</span> <a href="{{route('login')}}">Sign In</a></div>
        </div>           
        </form>			
       
</section>
<!-- Footer Section Begin -->
<footer class="footer-section">
    
<div style="padding:10px 0px"><p class="text-center" style="padding: 20px 0px; font-size: 12px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Windsor Apartments</p></div>

</footer>
<!-- end login area  -->

@endsection