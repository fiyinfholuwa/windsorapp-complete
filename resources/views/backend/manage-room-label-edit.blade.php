
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-lg-5">
        <div class="card">
  <div class="card-body">
    <h5 class="card-title">Update Room Label</h5>
   
    <!-- Custom Styled Validation -->
    <form action="{{route('update.label', $room_label_d->id)}}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="col-md-12s">
        <label for="validationCustom01" class="form-label">Room Label</label>
        <input type="text" class="form-control" name="room_label" id="validationCustom01" placeholder="Room Label" value="{{$room_label_d->room_label}}"  required>
        <p style="color:red; font-weight:400;">
          @error('room_label')
            {{$message}}
          @enderror
        </p>
        <div class="invalid-feedback">
          room label required
        </div>
      </div>
     
     
     
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update Room Label</button>
      </div>
    </form><!-- End Custom Styled Validation -->

  </div>
</div>
        </div>
        <div class="col-lg-7">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Room Labels <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">Room Label</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  
                @if(count($get_all_labels) > 0)
                <?php $num = 1; ?>
              @foreach($get_all_labels as $label)

              <tr>
                  <td>{{$num++;}}</td>
                  <td>{{$label->room_label}}</td>
                
                  <td>@if($label->label_status =="pending")
                  <span  class="btn btn-warning btn-sm" style="font-size: 8px;">Pending</span>
                  @else
                  <span  class="btn btn-success btn-sm" style="font-size: 8px;">Active</span>
                  @endif
                  </td>
                 <td>
                  <a href="{{route('edit.label', $label->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>
                  <a href="#" data-toggle="modal" data-target="#label_{{$label->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                  @include('backend.modals.deleteLabel')
                </td>
                
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