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
                        <h2>All Jobs</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Home</a>
                            <span>All Jobs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


    <!-- Jobs Start -->
<section class="container" style="margin-top: -70px;" >
   
 
@if(count($jobs_for_user) > 0)
@foreach($jobs_for_user as $job)
<div class="job-item" style="padding: 20px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; margin: 20px 0px;">
        <div class="row g-4">
            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                <img class="flex-shrink-0 img-fluid  rounded" src="https://cdn0.iconfinder.com/data/icons/media-and-advertisement-1/49/18-512.png" alt=""
                    style="width: 80px; height: 80px;">
                <div class="text-start ps-4 job-posting">
                    <h5 class="mb-3 job-posting">{{$job->position}}</h5>
                    <span class="text-truncate me-3"><i class="fas fa-map-marker-alt  me-2"></i>{{$job->location}}</span>
                    <span class="text-truncate me-3"><i class="fas fa-clock  me-2"></i>{{$job->jobType}}</span>
                    <span class="text-truncate me-0"><i class="fas fa-money-bill-alt me-2"></i>{{$job->salary}}</span>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                <div class="d-flex mb-3 job-apply">
    
                    <a class="" href="{{route('job.details', $job->position_slug)}}">Apply Now</a>
                </div>
                <small class="text-truncate" ><i class="far fa-calendar-alt    me-2" style="padding: 2px;"></i>Deadline: {{ date('d-m-Y', strtotime($job->deadline))}}</small>
            </div>
        </div>
    </div>
    
@endforeach

                <div class="col-lg-12">
                    <div class="room-pagination">
                       
                        {{$jobs_for_user->links('paginate')}}
                       
                    </div>
                </div>
@else
<h3 style="color:red; padding:50px 0px; text-align:center">No Job Posted Yet.</h3>
@endif
</section>
    
@include('layouts.footer')        
    <!-- Jobs End -->
@endsection