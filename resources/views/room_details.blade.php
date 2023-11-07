@extends('layouts.master')
@section('title')
{{$label_name}}
@endsection
@section('content')
@include('layouts.navigation')
 <!-- Breadcrumb Section Begin -->
 <div class="breadcrumb-section" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{$label_name}}</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>{{$label_name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <!-- <img src="img/room/room-details.jpg" alt=""> -->
                        <div class = "card">
                            <!-- card left -->
                            <div class = "product-imgs">
                              <div class = "img-display">
                                <div class = "img-showcase">
                                  <img src = "{{asset($get_room_detail->poster_img)}}" alt = "shoe image">
                                  <img src = "{{asset($get_room_detail->image_2)}}" alt = "show image">
                                  <img src = "{{asset($get_room_detail->image_3)}}" alt = "shoe image">
                                  <img src = "{{asset($get_room_detail->image_4)}}" alt = "show image">
                                </div>
                              </div>
                              <div class = "img-select">
                                <div class = "img-item">
                                  <a href = "#" data-id = "1">
                                    <img src = "{{asset($get_room_detail->poster_img)}}" alt = "show image">
                                  </a>
                                </div>
                                <div class = "img-item">
                                  <a href = "#" data-id = "2">
                                    <img src = "{{asset($get_room_detail->image_2)}}" alt = "show image">
                                  </a>
                                </div>
                                <div class = "img-item">
                                  <a href = "#" data-id = "3">
                                    <img src = "{{asset($get_room_detail->image_3)}}" alt = "shoe image">
                                  </a>
                                </div>
                                <div class = "img-item">
                                  <a href = "#" data-id = "4">
                                    <img src = "{{asset($get_room_detail->image_4)}}" alt = "shoe image">
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{$label_name}}</h3>
                                <div class="rdt-right">
                                    <!-- <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div> -->
                                    <a href="#booking">Booking Now</a>
                                </div>
                            </div>
                            <h2>{{$get_room_detail->price}}<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                   
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{$get_room_detail->capacity}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>{{$get_room_detail->service}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <div class="rd-reviews">
                        @if(count($reviews)> 0)
                        <h4>Reviews ({{count($reviews)}})</h4>
                        @else
                        <h4>Reviews (0)</h4>
                        @endif
                       @if(count($reviews)> 0)
                       @foreach($reviews as $review)
                       <div class="review-item">
                            <div class="ri-pic">
                                <img src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
                            </div>
                            <div class="ri-text">
                                <span>{{ \Carbon\Carbon::parse($review->created_at)->isoFormat('MMM  Do, YYYY')}}</span>
                                <!-- <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div> -->
                                <h5>{{$review->reviewer_name}}</h5>
                                <p>{{$review->review_content}}</p>
                            </div>
                        </div>
                       @endforeach
                       @else
                       <div style="text-align:center; color:red !important; padding:30px 0px"><h5 class="text-danger">No Review yet</h5></div>
                       @endif

                    </div>
                    <div class="review-add">
                       
                    
                        @if(Auth::check())
                        <h4>Add Review</h4>
                        <form action="{{route('store.review')}}" method="post" class="ra-form">
                            @csrf
                            <div class="row">
                               
                                <div class="col-lg-12">
                                    <!-- <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="room_id" value="{{$get_room_detail->id}}" />
                                    <input type="hidden" name="reviewer_name" value="{{Auth::user()->name}}" />
                                    <textarea name="review_content" placeholder="Your Review"></textarea>
                                    <p style="text-align:center; color:red;">
                                        @error('review_content')
                                        {{$message}}
                                        @enderror
                                    </p>
                                    <button type="submit">Add Review</button>
                                </div>
                            </div>
                        </form>
                        @else
                       <div class="text-center"> <a href="{{route('login')}}" class="btn btn-danger">You need to login before commenting your review</a></div>
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-4" id="booking">
                    <div class="room-booking">
                        <h3>Your Reservation</h3>
                        <form action="{{route('pay')}}" method="post">
                            @csrf
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" name="checkIn" value="{{old('checkIn')}}" id="date-in">
                                <i class="icon_calendar"></i>
                                <p style="color:red">
                                    @error('checkIn')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" name="checkOut" value="{{old('checkOut')}}" id="date-out">
                                <i class="icon_calendar"></i>
                                <p style="color:red">
                                    @error('checkOut')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select name="guest" id="guest">
                                <option value="">Select Number of Guest</option>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Persons</option>
                                    <option value="3">3 Persons</option>
                                    <option value="4">4 Persons</option>
                                    <option value="5">5 Persons</option>
                                    <option value="6">6 Persons</option>
                                </select>
                                <p style="color:red">
                                    @error('guest')
                                    {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <!-- <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                </select>
                            </div> -->
                           @if(Auth::check())
                           <input type="hidden" name="apartment_id" value="{{$get_room_detail->id}}" />
                           <input type ="hidden" value="{{Auth::user()->email}}" name="user_email" />
                           <input type ="hidden" value="{{$get_room_detail->price}}" name="price" />
                           <button type="submit" name="online_pay">CheckOut / Pay Online</button>
                           <button class="btn2" type="submit" ">Make Reservation / Offline Payment</button>
                           
                           @else
                           <a href="{{route('login')}}" class="btn-2 btn btn-primary text-primary border-0">Login before making reservation.</a>
                           <a href="{{route('register')}}" class="btn btn-danger text-white border-0 mt-4">I donot have account, please Login.</a>
                           @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <!-- Rooms Section End -->
    @include('layouts.footer')
@endsection