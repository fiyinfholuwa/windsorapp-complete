
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Testimonials <span></span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Image</th>
                    <th scope="col">Content</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
              
              @if(count($testimonials) > 0)
              <?php $num = 1; ?>
              @foreach($testimonials as $testimonial)

                      <tr>
                          <td>{{$num++;}}</td>
                          <td>{{$testimonial->fullname}}</td>
                          <td>{{$testimonial->occupation}}</td>
                          <td><img src="{{asset($testimonial->test_image)}}" height="40px" width="40px" /></td>
                          <td>{{$testimonial->content}}</td>
                          <td>
                        
                          <a href="{{route('testimonial.edit', $testimonial->id)}}" ><i style="color:blue;" class="bi bi-pencil-square"></i></a>
                          <a href="#" data-toggle="modal" data-target="#test_{{$testimonial->id}}" ><i style="color:red;" class="bi bi-trash"></i></a>
                        </td>
                        @include('backend.modals.deleteTestimonial')
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