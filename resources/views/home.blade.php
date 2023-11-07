@extends('layouts.master')
@section('title')
{{'Home'}}
@endsection
@section('content')

@include('layouts.navigation')


<!-- Hero Section Begin -->
<section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Windsor Apartments</h1>
                        <p>Here are the best apartment booking sites, including recommendations for international
                            travel and for finding low-priced apartment for relaxation.</p>
                        <a href="{{route('rooms')}}" class="primary-btn">Discover Now</a>
                    </div>
                </div>
                <!-- <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Your Apartment</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">2 Adults</option>
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Available Room:</label>
                                <select id="room">
                                    <option value="">Room 201</option>
                                    <option value="">Room 202</option>
                                </select>
                            </div>
                            <button class="btn-2  "data-toggle="modal" data-target="#exampleModal"  type="submit">Make Reservation</button>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{asset('img/windsor1.jpg')}}"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('img/windsor2.jpg')}}"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('img/windsor3.jpg')}}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="">
                            <h4>About Us</h4>
                            <!-- <h2>Windsor Apartments</h2> -->
                        </div>
                        <!-- <p class="f-para">Elevating Hospitality Through Exceptional Service Apartments....</p> -->

                        <p class="f-para">Welcome to a world of refined comfort and modern luxury. At WINDSOR APARTMENTS, every stay is an experience to cherish. We take pride in offering you more than just a place to stay; we provide you with an experience that feels like home while embracing the convenience of a top-tier service apartment.</p>

                        <p class="f-para">We have been dedicated to providing exceptional service apartment accommodation for our customers around the world.
                        </p>
                        
                        <a href="{{route('about')}}" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                           <img src="{{asset('img/windsor5.jpg')}}" alt="">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="service-item">
                        <i class="fa fa-home fa-4x"></i>
                        <h4>Executive Suites</h4>
                        <p>It is a great pleasure for us to welcome you to the Windsor apartment. We do hope that your
stay with us will be enjoyable and we wish you a nice time in Ibadan, Oyo state</p>
                    </div>
                </div>
                <!-- <i class="fa-solid fa-business-time"></i> -->
                <div class="col-lg-6 col-sm-6">
                    <div class="service-item">
                        <i class="fa-solid fa-business-time fa-4x"></i>
                        <h4>Business Meeting</h4>
                        <p>Our service apartments offer business-friendly amenities to cater to your work needs, ensuring a seamless blend of business and leisure.</p>
                    </div>
                </div>
                <!-- <i class="fa-solid fa-jug-detergent"></i> -->
                <div class="col-lg-6 col-sm-6">
                    <div class="service-item">
                        <i class="fa-solid fa-jug-detergent fa-4x"></i>
                        <h4>Laundry</h4>
                        <p>Keep your wardrobe fresh and clean with convenient on-site laundry facilities, making extended stays hassle-free.
</p>
                    </div>
                </div>
               
                <div class="col-lg-6 col-sm-6">
                    <div class="service-item">
                        <i class="fa fa-film fa-4x"></i>
                        <h4>Movie and Photoshoot</h4>
                        <p>Unleash your creative side with access to movie and photoshoot facilities, ideal for capturing special moments or professional projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    
                   @if(!empty($get_rooms))
                    @foreach($get_rooms as $room)
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset($room->poster_img)}}">
                            <div class="hr-text">
                                <h3>{{$room->label->room_label}}</h3>
                                <h2>#{{$room->price}}<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="r-o">Room Status:</td>
                                       @if($room->status =="Available")
                                       <td><span class="badge bg-success">{!!Str::limit(html_entity_decode($room->status),20,"...")!!}</span></td>
                                       @else
                                       <td><span class="badge bg-warming">{!!Str::limit(html_entity_decode($room->status),20,"...")!!}</span></td>
                                       @endif
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>{!!Str::limit(html_entity_decode($room->capacity),20,"...")!!}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>{!!Str::limit(html_entity_decode($room->service),20,"...")!!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if($room->status =="Available")
                                <a href="{{route('room.detail', $room->label->room_label_slug )}}" class="primary-btn">More Details</a>
                                @else
                                <a class="primary-btn " data-toggle="modal" data-target="#exampleModal1" >Unavailable for reservation</a>
                                @endif
                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                   @else
                   <div class="text-center">No Rooms Available</div>
                   @endif
                   
               
            </div>
        </div>
    </section>
                <div class="text-center" style="padding: 40px 0px">
                    <a href="{{route('rooms')}}" class="btn btn-danger">View all Apartments</a>
                </div>
                </div>
    
    <section class="testimonial">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
					<div class="sec-heading text-center">
						<h6>What People say about us</h6>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="clients-carousel owl-carousel">
                @if(count($get_testimonial) > 0)

                @foreach($get_testimonial as $testimonial)

                <div class="single-box">
                    <div class="img-area"><img alt="" class="img-fluid" src="{{asset($testimonial->test_image)}}"></div>
                    <div class="content">
                        <p>{{$testimonial->content}}</p>
                        <h4>{{$testimonial->fullname}}</h4>
                        <h6>{{$testimonial->occupation}}</h6>
                    </div>
                </div>
                @endforeach

                
                @else
                <h5 class="text-danger text-center" style="padding:50px 0px">No Available Testimonial</h5>
                @endif
					
					
				</div>
			</div>
		</div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <!-- <span>we</span> -->
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
        <div class="m-4">
    <div class="accordion" id="myAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">At what time can we check into our room?</button>									
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <p>Customers are expected to arrive for 4PM. We will gladly provide you access to your room earlier if possible.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">What is the checkout time?</button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <p>Customers must check out for 11AM. However, we can keep your luggage for free if need be.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">Is there Wi-Fi in every room?</button>                     
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="card-body">
                    <p>High speed wireless internet is offered for free throughout the apartment; whether it be rooms, poolside, terrace, communal areas or breakfast area.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
	/* Custom style */
    .accordion-button::after {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
      transform: scale(.7) !important;
    }
    .accordion-button:not(.collapsed)::after {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
    }
</style>
	</section>

    <!-- Testimonial Section End -->
    @include('layouts.footer')
    @endsection