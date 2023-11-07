@extends('layouts.master')
@section('title')
{{ $job_details->position}}
@endsection
@section('content')
@include('layouts.navigation')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section mt-7" style="padding-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{$job_details->position}}</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>{{$job_details->position}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


 <!-- Job Detail Start -->
 <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -80px;">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    <img class="flex-shrink-0 img-fluid  rounded" src="https://cdn0.iconfinder.com/data/icons/media-and-advertisement-1/49/18-512.png" alt="" style="width: 80px; height: 80px;">
                    <div class="text-start ps-4 job-details">
                        <h3 class="mb-3">{{$job_details->position}}</h3>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt  me-2"></i>{{$job_details->location}}</span>
                        <span class="text-truncate me-3"><i class="far fa-clock me-2"></i>{{$job_details->jobType}}</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt  me-2"></i>{{$job_details->salary}}</span>
                    </div>
                </div>
               
                <div class="mb-5">
                    <h4 class="mb-3">Job description</h4>
                    <p style="padding-left:30px;">{!! html_entity_decode($job_details->description) !!}</p>
                    <h4 class="mb-3">Responsibility</h4>
                    <p style="padding-left:30px;">{!! html_entity_decode($job_details->responsibility) !!}</p>
                   
                    <h4 class="mb-3">Qualifications</h4>
                    <p style="margin-left:30px !important;">{!! html_entity_decode($job_details->qualification) !!}</p>
                    
                </div>

                <div class="">
                   
                    <div class="review-add">
                        <h4 class="">Apply For The Job</h4>
                        <form action="{{route('job.apply')}}" method="post" class="ra-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Full Name <sup style="color: red;">*</sup></label>
                                    <input name="fullname" type="text" placeholder="Full Name">
                                    <p style="color:red; font-weight:500;">
                                        @error('fullname')
                                        {{$message}}
                                        @enderror
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <label>Phone Number <sup style="color: red;">*</sup></label>
                                    <input name="phoneNumber" type="text" placeholder="Phone Number">
                                    <p style="color:red; font-weight:500;">
                                        @error('phoneNumber')
                                        {{$message}}
                                        @enderror
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <label>Email <sup style="color: red;">*</sup></label>
                                    <input name="email" type="text" placeholder="Email">
                                    <p style="color:red; font-weight:500;">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <label>Resume/Cv <sup style="color: red;">*</sup></label>
                                    <input type="file" name="resume" placeholder="Your Resume">
                                   
                                    <p style="color:red; font-weight:500;">
                                        @error('resume')
                                        {{$message}}
                                        @enderror
                                    </p>
                                </div>
                                
                                <div class="col-lg-12">
                                    <label>Cover Letter <sup>optional</sup></label>
                                    <textarea name="cover_letter" placeholder="Your Cover Letter"></textarea>
                                    <input type="hidden" name="jobTitle" value="{{$job_details->position}}" >
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summary</h4>
                    <p><i class="fa fa-angle-right text-dark me-2" style="padding: 10px;"></i>Published On: {{ date('d-m-Y', strtotime($job_details->created_at))}} </p>
                    <p><i class="fa fa-angle-right text-dark me-2" style="padding: 10px;"></i>Vacancy: {{$job_details->vacancy}}</p>
                    <p><i class="fa fa-angle-right text-dark me-2"style="padding: 10px;"></i>Job Nature: {{$job_details->jobType}}</p>
                    <p><i class="fa fa-angle-right text-dark me-2"style="padding: 10px;"></i>Salary: {{$job_details->salary}}</p>
                    <p><i class="fa fa-angle-right text-dark me-2"style="padding: 10px;"></i>Location: {{$job_details->location}}</p>
                    <p class="m-0"><i class="fa fa-angle-right text-dark me-2" style="padding: 10px;"></i>Deadline: {{ date('d-m-Y', strtotime($job_details->deadline))}}</p>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Job Detail End -->
@include('layouts.footer')
@endsection