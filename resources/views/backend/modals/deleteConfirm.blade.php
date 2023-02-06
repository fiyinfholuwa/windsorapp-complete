
    <!-- Modal -->
<div class="modal fade" id="confirm_{{$confirm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="{{route('confirm.delete', $confirm->id)}}" method="post">
   @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel"> Payment Confirmation</h5>
        
      </div>
      @if($confirm->verify_status == "accepted" || $confirm->verify_status == "rejected")
      
        <div class="modal-body">
        Are You Sure You want to delete this Payment Confirmation
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
       
        @else
        <div class="modal-body">
       You cannot delete this Payment confirmation because you have not verified it
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>  
      </div>
    </div>
        @endif
     
    </form>
  </div>
</div>

