
    <!-- Modal -->
<div class="modal fade" id="readLetter_{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
   @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Cover Letter for <span style="color: green; font-weight:500;">{{$job->fullname}}</span></h5>
        
      </div>
      <div class="modal-body">
      {{$job->cover_letter}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
    </form>
  </div>
</div>
