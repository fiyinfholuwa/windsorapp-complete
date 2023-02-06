
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

  <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Update Room</h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('update.room', $get_room->id)}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Room Label</label>
        <div class="form-group">
        <select class="form-control" name="room_label_id" id="validationCustom02" placeholder="Select Room Label"  required>
        <option value="{{$get_room->label->id}}" selected >{{$get_room->label->room_label}}</option>
           @if(count($fetch_room_label) > 0)
           @foreach($fetch_room_label as $label)
           <option value="{{$label->id}}">{{$label->room_label}}</option>
           @endforeach
           @else
           <option disabled>No room label available</option>
           @endif
        </select>
        <div class="invalid-feedback">
          room label required
        </div>
        </div>
        <p style="color:red; font-weight:400;">
          @error('room_label_id')
            {{$message}}
          @enderror
        </p>
        
      </div>
      <div class="col-md-6">
        <label for="validationCustom02" class="form-label">Price in Naira</label>
        <input type="number" class="form-control" name="price" id="validationCustom02" placeholder="Price in Naira" value="{{$get_room->price}}"  required>
        <p style="color:red; font-weight:400;">
          @error('price')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          price required
        </div>
      </div>
      
      <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Capacity</label>
       
        <textarea class="form-control" name="capacity" placeholder="Room Capacity"   required> {{$get_room->capacity}}</textarea>
        <p style="color:red; font-weight:400;">
          @error('capacity')
            {{$message}}
          @enderror
        </p>
        
          <div class="invalid-feedback">
            capacity required
          </div>
      
      </div>
      <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Room Services</label>
       
        <textarea class="form-control" name="services" placeholder="Services related to the room"   required>{{$get_room->service}}</textarea>
        <p style="color:red; font-weight:400;">
          @error('services')
            {{$message}}
          @enderror
        </p>
        
          <div class="invalid-feedback">
           room services required
          </div>
      
      </div>
      <div class="col-lg-12">
        <label for="validationCustomUsername" class="form-label">Room Poster Image</label>
       
        <input type="file" class="form-control" name="poster_image"  id="file-upload"  accept="image/*" onchange="previewImage(event);" >
        
        <img height="50px" src="{{asset($get_room->poster_img)}}" width="50px" id="preview-selected-image" />
          
      
      </div>
     
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update Room unit</button>
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
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        imagePreviewElement.src = imageSrc;
         imagePreviewElement.style.display = "block";
        }
    }

    const previewImage1 = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image1");
        imagePreviewElement.src = imageSrc;
         imagePreviewElement.style.display = "block";
        }
    }

    const previewImage2 = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image2");
        imagePreviewElement.src = imageSrc;
         imagePreviewElement.style.display = "block";
        }
    }

    const previewImage3 = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image3");
        imagePreviewElement.src = imageSrc;
         imagePreviewElement.style.display = "block";
        }
    }

    
 </script>
@endsection