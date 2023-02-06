@extends('layouts.master')
@section('title')
{{'Contact'}}
@endsection
@section('content')
@include('layouts.navigation')
   <!-- Contact Section Begin -->
   <section class="contact-section spad " style="padding-top: 150px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Get In Touch</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Oluyole Extension Star Gate Ibadan</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>+2348099526001</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>info@windsorapartments.com.ng</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="{{route('store.message')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="fullname" value="{{old('fullname')}}" placeholder="Your Name">
                                @error('fullname')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="Your Email">
                                @error('email')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="phoneNumber" value="{{old('phoneNumber')}}" placeholder="Your Phone Number">
                                @error('phoneNumber')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Your Message" name="message">{{old('message')}}</textarea>
                                @error('message')
                                <p style="color: red; font-weight: 400; text-align: center;">{{$message}}</p>
                                @enderror
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.420433145525!2d3.82961602917225!3d7.2770086299745715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10398f4280a977ed%3A0x7cc87adf3f6490f2!2sStargate%20Homes!5e0!3m2!1sen!2sng!4v1669290049399!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    @include('layouts.footer')
@endsection