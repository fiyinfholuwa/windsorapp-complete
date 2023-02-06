
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Payment Confirmation || <span>{{$confirmd->bookingId}}</span></h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('confirm.update', $confirmd->id)}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="col-md-6">
      <label for="validationCustom02" class="form-label">Account Name</label>
        <input readonly value="{{$confirmd->account_name}}" class="form-control"  id="validationCustom02" placeholder="Price in Naira" >
      </div>
      <div class="col-md-6">
      <label for="validationCustom02" class="form-label">Bank Name</label>
        <input readonly value="{{$confirmd->bank_name}}" class="form-control"  id="validationCustom02" placeholder="Price in Naira" >
      </div>
      <div class="col-md-6">
      <label for="validationCustom02" class="form-label">Amount Sent</label>
        <input readonly value="#{{$confirmd->amount_sent}}" class="form-control"  id="validationCustom02" placeholder="Price in Naira" >
      </div>
      <div class="col-md-6">
      <label for="validationCustom02" class="form-label">Client Name</label>
        <input readonly value="{{$confirmd->full_name}}" class="form-control"  id="validationCustom02" placeholder="Price in Naira" >
      </div>
      <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Confirm Payment</label>
        <div class="form-group">
        <select class="form-control" name="confirm" id="validationCustom02" placeholder="Select Room Label"  required>
        <option value="" selected >Confirm Payment</option>
        <option value="accepted"  >Amount Recieved</option>
        <option value="rejected" >Amount Not Recieved</option>
          
        </select>
        
        </div>
       
      </div>
    
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update Payment Status</button>
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