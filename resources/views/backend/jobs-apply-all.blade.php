
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Applied Jobs <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Cover Letter</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
                @if(count($jobs_applied) > 0)
                <?php $num = 1; ?>
              @foreach($jobs_applied as $job)

              <tr>
                  <td>{{$num++;}}</td>
                  <td>{{$job->fullname}}</td>
                  <td>{{$job->phoneNumber}}</td>
                  <td>{{$job->email}}</td>
                  <td><a href="{{asset($job->resume)}}" target="_blank" class="btn btn-primary btn-sm" style="font-size: 8px;">Open Resume</a></td>
                  <td>{{$job->jobTitle}}</td>
                  <td>@if($job->cover_letter ==NULL)
                  <span  class="btn btn-danger btn-sm" style="font-size: 8px;">No letter</span>
                  @else
                  <a href="#" data-toggle="modal" data-target="#readLetter_{{$job->id}}"class="btn btn-success btn-sm"style="font-size: 8px;" >read letter</a>
                  @endif
                  </td>
                  
                  <td><a href="#" data-toggle="modal" data-target="#jobApply_{{$job->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                
                </td>
                  @include('backend.modals.deleteJobApply')
                  @include('backend.modals.readLetter')
                </tr>

              @endforeach

            @else
              <tr>
                <td colspan="5" class="text-center">No Data Found</td>
              </tr>
            @endif
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

    

      </div>
    </div><!-- End Left side columns -->

  

  </div>
</section>

</main><!-- End #main -->

 
@endsection