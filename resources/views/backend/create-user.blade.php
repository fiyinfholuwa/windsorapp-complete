
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add User</h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('store.user')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Full Name"  required>
        <p style="color:red; font-weight:400;">
          @error('name')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          fullname required
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationCustom02" class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="phone_number" id="validationCustom02" placeholder="Phone Number"  required>
        <p style="color:red; font-weight:400;">
          @error('phone_number')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          phone number required
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationCustomUsername" class="form-label">User Type</label>
       
        <select class="form-control" name="user_type">
            <option value="" selected>Select User Type</option>
            <option value="0">Regular User</option>
            <option value="1">Manager</option>
        </select>
        <p style="color:red; font-weight:400;">
          @error('user_type')
            {{$message}}
          @enderror
        </p>
      </div>
     
      <div class="col-md-6">
        <label for="validationCustom02" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="validationCustom02" placeholder="Email"  required>
        <p style="color:red; font-weight:400;">
          @error('email')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          email required
        </div>
      </div>

    

      <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" id="validationCustom02" placeholder="Enter Password"  required>
        <p style="color:red; font-weight:400;">
          @error('password')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          password required
        </div>
      </div>

      <div class="col-12">
        <button class="btn btn-primary" type="submit">Add User</button>
      </div>
    </form><!-- End Custom Styled Validation -->

  </div>
</div>

    </div>
</div><!-- End Left side columns -->

  

  </div>
</section>

</main><!-- End #main -->

 <script>
   const previewImage = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
 </script>
@endsection