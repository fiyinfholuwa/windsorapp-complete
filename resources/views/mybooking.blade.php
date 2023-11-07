@extends('layouts.master')
@section('title')
{{'Rooms'}}
@endsection
@section('content')
@include('layouts.navigation')
 <!-- Breadcrumb Section Begin -->
 <div class="breadcrumb-section mt-7" style="padding-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>My Booking</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>My Booking</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="contact-section spad " style="margin-top: -130px;">
        <div class="container">
            <div class="d-flex justify-content-center row">
                <div class="col-md-12">
                    <div class="rounded">
                        <div class="table-responsive table-borderless">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">BookingID #</th>
                                        <th class="text-center">Reference</th>
                                        <th class="text-center">Check In</th>
                                        <th class="text-center">Check Out</th>
                                        <th class="text-center">Guest</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center"> Payment Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                @if(count($bookings) > 0)
                                    @foreach($bookings as $booking)
                                    <tr class="text-center">
                                        <td>#{{$booking->bookingId}}</td>
                                        <td>{{$booking->reference}}</td>
                                        <td>{{$booking->checkIn}}</td>
                                        <td>{{$booking->checkOut}}</td>
                                        <td>
                                            @if($booking->guest === "1")
                                            {{$booking->guest}} person
                                            @else
                                            {{$booking->guest}} persons
                                            @endif
                                        </td>
                                       
                                        <td>#{{$booking->price}}</td>
                                        <td>
                                            @if($booking->payment_status === "Paid")
                                            <span class="badge badge-success">Paid</span>
                                            @elseif($booking->payment_status === "Pending")
                                            <span class="badge badge-warning">Payment Pending</span>
                                            @else
                                            <span class="badge badge-danger">{{$booking->payment_status}}</span>
                                            @endif
                                        </td>
                                       
                                        <td> 
                                             @if($booking->payment_status === "Paid")
                                             <a href="{{route('invoice.generate' , $booking->id)}}" class="badge badge-danger">Download Invoice</a>
                                            @else
                                            <a href="{{route('invoice.generate' , $booking->id)}}" class="badge badge-danger">Download Invoice</a>  <a href="{{route('make.payment' , $booking->id)}}" class="badge badge-warning">Make Payment</a></td>
                                            @endif    
                                    
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                               
                            </table>
                            <div class="col-lg-12">
                                        <div class="room-pagination">
                                        
                                            {{$bookings->links('paginate')}}
                                        
                                        </div>
                                    </div>
                                @else
                                <table class="table">
                                <thead>
                                    <tr>
                                   
                                        <th class="text-center text-danger" style="color:red;"><span class="text-danger">No Booking Yet</span></th>
                                       
                                     
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                               
                               
                            </table>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
    @include('layouts.footer')
@endsection