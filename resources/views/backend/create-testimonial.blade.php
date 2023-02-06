
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add Testimonial</h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('store.testimony')}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="fullname" id="validationCustom01" placeholder="Full Name"  required>
        <p style="color:red; font-weight:400;">
          @error('fullname')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          fullname required
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationCustom02" class="form-label">Occupation</label>
        <input type="text" class="form-control" name="occupation" id="validationCustom02" placeholder="Occupation"  required>
        <p style="color:red; font-weight:400;">
          @error('occupation')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          occupation required
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Testimonial Image</label>
       
        <input type="file" class="form-control" name="test_image"  id="file-upload" accept="image/*" onchange="previewImage(event);" required>
        <p style="color:red; font-weight:400;">
          @error('test_image')
            {{$message}}
          @enderror
        </p>
        <img height="50px" width="50px" id="preview-selected-image" />
          <div class="invalid-feedback">
            testimony image required
          </div>
      
      </div>
     
      <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Testimony Content</label>
       
        <textarea class="form-control" name="content" placeholder="Write Testimony here" required></textarea>
        <p style="color:red; font-weight:400;">
          @error('content')
            {{$message}}
          @enderror
        </p>
        
          <div class="invalid-feedback">
            testimony required
          </div>
      
      </div>
     
     
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Add Testimonial</button>
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