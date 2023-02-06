
    <!-- Modal -->
<div class="modal fade" id="label_{{$label->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="{{route('delete.label', $label->id)}}" method="post">
   @csrf
    <div class="modal-content">
     @if($label->label_status == "pending")
     <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Room Label Delete</h5>
        
      </div>
      <div class="modal-body">
        Are You Sure You want to delete this Room Label
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
     @else
     <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Unable to delete This</h5>
        
      </div>
      <div class="modal-body">
       This room label has been attached to a room, except the room is deleted, you cant perform further actions, thank you. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       
      </div>
     @endif
    </div>
    </form>
  </div>
</div>
