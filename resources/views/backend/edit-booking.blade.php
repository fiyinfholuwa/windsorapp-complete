
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Manage Booking Expiration.</h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('update.booking',  $bookingD->id)}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Room Label</label>
        <div class="form-group">
        <select class="form-control" name="time_up" id="validationCustom02" placeholder="Select Room Label"  required>
        <option value="" selected >Select Booking Expiration Status</option>
        <option value="0"  >Still have time</option>
        <option value="1" >Time Up</option>
          
        </select>
        
        </div>
       
      </div>
      
     
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update Booking Status</button>
      </div>
    </form><!-- End Custom Styled Validation -->

  </div>
</div>

    </div>
</div><!-- End Left side columns -->

  

  </div>
</section>

</main><!-- End #main -->

 
@endsection