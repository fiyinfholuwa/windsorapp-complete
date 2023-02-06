
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add Job</h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('job.store')}}" method="post" class="row g-3 needs-validation" novalidate>
      @csrf
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Job Position</label>
        <input type="text" class="form-control" name="position" id="validationCustom01" placeholder="Job Position/ Job Title"  required>
        <div class="invalid-feedback">
          job position required
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Location</label>
        <input type="text" class="form-control" name="location" id="validationCustom02" placeholder="Location"  required>
        <div class="invalid-feedback">
          location required
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Salary Range</label>
          <input type="text" class="form-control" name="salary" id="validationCustomUsername" placeholder="Salary Range" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            salary range required
          </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom03" class="form-label">Number Of Vacancy</label>
        <input type="number" class="form-control" name="vacancy" id="validationCustom03" placeholder="Number of Vacancy" required>
        <div class="invalid-feedback">
          number of Vacancy required.
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom04" class="form-label">Job Type</label>
        <select class="form-select" name="jobType" id="validationCustom04" required>
          <option selected disabled value="">Select Job Type </option>
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
        <input type="datetime-local" name="deadline" class="form-control" placeholder="Deadline" id="validationCustom05" required>
        <div class="invalid-feedback">
          deadline required
        </div>
      </div>

      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Responsiblity</label>
        <textarea  class="ckeditor form-control" name="responsibility" id="validationCustom05"  placeholder="Responsibility" required></textarea>
        <p style="color:red; font-weight:400;">
        @error('responsibility')
          {{$message}}
        @enderror
        </p>
        <div class="invalid-feedback">
          responsiblity required
        </div>
      </div>
      
      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Qualification</label>
        <textarea  class="ckeditor form-control" name="qualification" id="validationCustom05" placeholder="QUalification" required></textarea>
        <p style="color:red; font-weight:400;">
        @error('qualification')
          {{$message}}
        @enderror
        </p>
        <div class="invalid-feedback">
          qualification required
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustom05" class="form-label">Job Descriptions</label>
        <textarea  class="ckeditor form-control" name="description" id="validationCustom05" placeholder="Job Description" required></textarea>
        <p style="color:red; font-weight:400;">
        @error('description')
          {{$message}}
        @enderror
        </p>
        <div class="invalid-feedback">
          job description required
        </div>
      </div>
      
      <div class="col-12">
        <button class="btn btn-primary btn-lg" type="submit">Save Job</button>
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