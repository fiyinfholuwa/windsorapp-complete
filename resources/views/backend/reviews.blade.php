
@extends('backend.layouts.master')

 @section('content')
 
 <main id="main" class="main">



<section class="section dashboard">
  <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

           

            <div class="card-body">
              <h5 class="card-title">All Reviews <span>| from Clients</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Reviewer's Name</th>
                    <th scope="col">Review Content</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                <?php $num = 1; ?>
                @if(count($reviews) > 0)

              @foreach($reviews as $review)

                      <tr>
                          <td>{{$num++;}}</td>
                          <td>{{$review->reviewer_name}}</td>
                          <td>{{$review->review_content}}</td>
                          <td><a href="#" data-toggle="modal" data-target="#reviewDelete_{{$review->id}}" ><i style="color:red;" class="bi bi-trash"></i></a></td>
                          @include('backend.modals.deleteReview')
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