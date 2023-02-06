
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Job <span style="color:blue; font-weight: 700;">{{$job_data->position}}</span></h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('job.update', $job_data->id )}}" method="post" class="row g-3 needs-validation" novalidate>
      @csrf
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Job Position</label>
        <input type="text" class="form-control" value="{{$job_data->position}}" name="position" id="validationCustom01"  required>
        <div class="invalid-feedback">
          job position required
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Location</label>
        <input type="text" class="form-control" value="{{$job_data->location}}" name="location" id="validationCustom02"  required>
        <div class="invalid-feedback">
          location required
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Salary Range</label>
          <input type="text" class="form-control" value="{{$job_data->salary}}" name="salary" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            salary range required
          </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Number Of Vacancy</label>
        <input type="number" class="form-control" value="{{$job_data->vacancy}}" name="vacancy" id="validationCustom03" required>
        <div class="invalid-feedback">
          number of Vacancy required.
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom04" class="form-label">Job Type</label>
        <select class="form-select" name="jobType" id="validationCustom04" required>
          <option selected value="{{$job_data->position}}">{{$job_data->jobType}}</option>
          <option value="Full Time">Full Time</option>
          <option value="Part Time">Part Time</option>
          <option value="Remote">Remote</option>
        </select>
        <div class="invalid-feedback">
          job type required
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom05" class="form-label">Deadline</label>
        <input type="datetime-local" name="deadline" value="{{$job_data->deadline}}" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
          deadline required
        </div>
      </div>

      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Responsiblity</label>
        <textarea  class="ckeditor form-control"name="responsibility" id="validationCustom05" required>{{$job_data->responsibility}}</textarea>
        @error('responsibility')
          {{$message}}
        @enderror
      </div>
      
      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Qualification</label>
        <textarea  class="ckeditor form-control" name="qualification"  id="validationCustom05" required>{{$job_data->qualification}}</textarea>
        @error('qualification')
          {{$message}}
        @enderror
      </div>
      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Job Descriptions</label>
        <textarea  class="ckeditor form-control" name="description" id="validationCustom05" required>{{$job_data->description}}</textarea>
        @error('description')
          {{$message}}
        @enderror
      </div>
      
      <div class="col-12">
        <button class="btn btn-primary btn-lg" type="submit">Update Job</button>
      </div>
    </form><!-- End Custom Styled Validation -->

  </div>
</div>

    </div>
</div><!-- End Left side columns -->

  

  </div>
</section>

</main><!-- End #main -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection