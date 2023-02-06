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
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea magnam distinctio velit veritatis, ad possimus eaque consequuntur nesciunt reprehenderit? Autem nam cumque voluptatem excepturi ipsum eaque praesentium sit minus eius. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero nulla reprehenderit neque sint, soluta voluptatum totam voluptas laborum repudiandae! Tempore amet debitis pariatur! Quod vero voluptates incidunt fugit error. Nesciunt.</p>

                           
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="ap-services">
                            <li><i class="icon_check"></i> 20% Off On Accommodation.</li>
                            <li><i class="icon_check"></i> Complimentary Daily Breakfast</li>
                            <li><i class="icon_check"></i> 3 Pcs Laundry Per Day</li>
                            <li><i class="icon_check"></i> Free Wifi.</li>
                            <li><i class="icon_check"></i> Discount 20% On F&B</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="about-page-services">
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
            </div>
        </div>
    </section>
    <!-- About Us Page Section End -->
    @include('layouts.footer')
@endsection

