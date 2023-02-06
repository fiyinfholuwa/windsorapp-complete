
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Jobs <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Position</th>
                    <th scope="col">Location</th>
                    <th scope="col">No of Vacancy</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Description</th>
                    <th scope="col">Responsibility</th>
                    <th scope="col">Qualification</th>

                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                <?php $num = 1; ?>
              @if(count($jobs) > 0)

              @foreach($jobs as $job)
             
                      <tr>
                          <td>{{$num++;}}</td>
                          <td>{{$job->position}}</td>
                          <td>{{$job->location}}</td>
                          <td>{{$job->vacancy}}</td>
                          <td>{{$job->jobType}}</td>
                          <td>{{$job->salary}}</td>
                         
                          <td>{{ date('d-m-Y', strtotime($job->deadline))}}</td>
                          <td> {!!Str::limit(html_entity_decode($job->description),20,"...")!!}</td>
                          <td> {!!Str::limit(html_entity_decode($job->responsibility),20,"...")!!}</td>
                          <td> {!!Str::limit(html_entity_decode($job->qualification),20,"...")!!}</td>
                         
                          <td>
                        
                          <a href="{{route('job.edit', $job->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>
                          <a href="#" data-toggle="modal" data-target="#job_{{$job->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                        </td>
                          @include('backend.modals.deleteJob')
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