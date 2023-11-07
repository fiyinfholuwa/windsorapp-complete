@extends('layouts.master')
@section('title')
{{'About'}}
@endsection

@section('content')
@include('layouts.navigation')
  <!-- Breadcrumb Section Begin -->
  <div class="breadcrumb-section" style="padding-top: 150px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>About Us</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Us Page Section Begin -->
    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ap-title">
                            <h2>Welcome To Windsor Apartments</h2>
                            <p>Welcome to a world of refined comfort and modern luxury. At WINDSOR APARTMENTS, every stay is an experience to cherish. We take pride in offering you more than just a place to stay; we provide you with an experience that feels like home while embracing the convenience of a top-tier service apartment.</p>

                            <p>We have been dedicated to providing exceptional service apartment accommodation for our customers around the world.
                            </p>

                           
                        </div>
                        <h2 style="color:#c70039;">Our Mission</h2>

                        <p>Our vision is to be the epitome of hospitality excellence. We aspire to redefine the way travelers experience temporary housing by consistently providing exceptional service apartments that feel like home and exceed the expectations of every guest.</p>
                        <h2 style="color:#c70039;">Our Vision</h2>

                        <p>To provide exceptional hospitality by prioritizing guest needs, maintaining excellence in every detail, and creating memorable moments.</p>

                        <p>To expand our presence globally, welcoming travelers, partners, and team members to join us in elevating hospitality standards.</p>

                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <h2 style="color:#c70039;">Our Core Values</h2>
                        <ul class="ap-services">
                            <li><p style="font-size:14px;"><i class="icon_check"></i><span style="font-weight:600;">Uncompromising Quality</span>:We envision a future where every guest associates us with unparalleled quality, from the moment they step into our apartments to the day they check out.</p></li>

                            <li><p style="font-size:14px;"><i class="icon_check"></i><span style="font-weight:600;">Warm Hospitality</span>:We aim to create an atmosphere where every guest feels not just welcomed but truly valued, fostering a sense of belonging during their stay.</p></li>

                            <li><p style="font-size:14px;"><i class="icon_check"></i><span style="font-weight:600;">Innovation and Comfort</span>: Our vision includes continuous innovation in apartment design and amenities to ensure that every stay is marked by modern comfort and convenience.</p></li>

                            <li><p style="font-size:14px;"><i class="icon_check"></i><span style="font-weight:600;">Sustainability</span>: We are committed to integrating sustainable practices into our operations, working toward a future where eco-friendly hospitality is the norm.</p></li>
 

                            <li><p style="font-size:14px;"><i class="icon_check"></i><span style="font-weight:600;">Memorable Experiences</span>: We envision every guest departing with not just a stay but a collection of cherished memories, each associated with their time at our service apartments.</p></li>

                            <li><p style="font-size:14px;"><i class="icon_check"></i><span style="font-weight:600;">Global Reach:</span>In the future, we see our service apartments spanning key cities worldwide, offering travelers a consistent and exceptional experience wherever they go.</p></li>
 
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="about-page-services">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ap-service-item set-bg" data-setbg="https://toohotel.com/wp-content/uploads/2022/09/TOO_restaurant_Panoramique_vue_Paris_nuit_v2-scaled.jpg">
                            <div class="api-text">
                                <h3>Restaurants Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ap-service-item set-bg" data-setbg="https://hourlyrooms.sgp1.cdn.digitaloceanspaces.com/public/uploads/0000/1/2021/09/08/hotels-for-bp.jpg">
                            <div class="api-text">
                                <h3>Travel Plan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ap-service-item set-bg" data-setbg="https://restaurantclicks.com/wp-content/uploads/2021/06/20-Classic-Cocktails-To-Order-At-Any-Bar.jpg">
                            <div class="api-text">
                                <h3>Bar And Drink</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ap-service-item set-bg" data-setbg="https://www.goodcore.co.uk/blog/wp-content/uploads/2020/05/laundry-app.jpg">
                            <div class="api-text">
                                <h3>Laundry</h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div> -->
        </div>
    </section>
    <!-- About Us Page Section End -->
    @include('layouts.footer')
@endsection

