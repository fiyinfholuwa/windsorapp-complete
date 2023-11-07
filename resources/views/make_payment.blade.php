@extends('layouts.master')
@section('title')
{{'Jobs'}}
@endsection
@section('content')
@include('layouts.navigation')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section mt-7" style="padding-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h5>Make Payment / Payment Confirmation.</h5>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>Make Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


    <!-- Jobs Start -->
<section class="container" style="margin-top: -70px; margin-bottom:50px;" >
   
 <div style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; padding:30px">
 <h4 style="text-align:center; padding:15px 0px;">Amount to be Paid <span style="color:green; font-weight:500;">#{{$booking->price}}</span></h4>
    <div class="row">
        <div class="col-lg-8">
            <h3>Account Details for Offline Payment.</h3>
            <div><p><strong><ul>
                <li><p>Acccount Name: Windsor Apartments and Allied Services Ltd.</p>
                    <p>Account Number: 221788015</p>
                    <p>Bank Name: FCMB</p>
                </li>
                <li>
                <p>Acccount Name: Windsor Apartments and Allied Services Ltd.</p>
                    <p>FCMB USD account : 9221788022</p>
                    
                </li>
            </ul></strong></p></div>
            <h3 class="mt-3 mb-2">Payment Confirmation</h3>
            <form action="{{route('payment.confirm')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="number" name="amount_sent" value="{{old('amount_sent')}}" placeholder="Amount Sent in Naira #">
                                @error('amount_sent')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="bank_name" value="{{old('bank_name')}}" placeholder="Bank Name">
                                @error('bank_name')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="account_name" value="{{old('account_name')}}" placeholder="Acount Name ">
                                @error('account_name')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                            <input type="hidden" value='{{Auth::user()->name}}' name="name" placeholder="Bank Name">
                            <input type="hidden" value='{{Auth::user()->email}}' name="email" placeholder="Bank Name">
                            <input type="hidden" value='{{$booking->bookingId}}' name="bookingId" placeholder="Bank Name">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
    </div>

        <div class="col-lg-4 mt-5">
        <h5 class="text-center">Make Online Payment</h5>
        <div>
            <form action="{{route('make.payment.online')}}" method="post">
                @csrf
            <input type="hidden" name="checkIn" value="{{$booking->checkIn}}" />
            <input type="hidden" name="checkOut" value="{{$booking->checkOut}}" />
            <input type="hidden" name="guest" value="{{$booking->guest}}" />
            <input type="hidden" name="user_email" value="{{$booking->user_email}}" />
            <input type="hidden" name="price" value="{{$booking->price}}" />
            <input type="hidden" name="bookingId" value="{{$booking->bookingId}}" />
           <div class="text-center mt-3"> <button type="submit" name="make_payments" class="btn btn-danger"/>Pay Online </button></div>
            </form>
        </div>
        <div>
    </div>
 </div>

    
</section>
    
@include('layouts.footer')        
    <!-- Jobs End -->
@endsection