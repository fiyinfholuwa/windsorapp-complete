@extends('layouts.master')
@section('title')
{{'Forgot Password'}}
@endsection
@section('content')

<section class="login-auth" style="background: url('https://cf.bstatic.com/xdata/images/hotel/max1024x768/321441959.jpg?k=ce000a7ae2797d40e4d056b72c03fddf7e2c0c5c867a28b6df9253399dab17ea&o=&hp=1') no-repeat ; background-size: cover;" style="min-height: 100vh;">
    <div class="login-form">    
    <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="avatar"><i class="fa fa-user"></i></div>
            <h4 class="modal-title">Recover Your Password  | <span style="font-size:14px !important; color:navy !important;"><a href="{{route('home')}}">go to home</a></span></h4></h4>
            <div class="form-group">
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
             
                <p style="color:red; font-weight:400;">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>
           
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Create Password Reset Link">   
           
        </div>           
        </form>			
       
</section>
<!-- Footer Section Begin -->
<footer class="footer-section">
    
<div style="padding:10px 0px"><p class="text-center" style="padding: 20px 0px; font-size: 12px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Windsor Apartments</p></div>

</footer>
<!-- end login area  -->

@endsection