<!-- Modal -->
<div class="modal fade" id="delete_multiple_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center ">
        <p class="m-0">I want to remove <span class="count"></span></p>
        <h6 class="text-center ml-2 mr-2"><strong></strong></h6>
        <small class="text-danger">This action cannot be undone!</small>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/available-articles/destroy-multiple">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <input type="hidden" name="articles">
          <button type="submit" class="btn btn-danger">Yes, I am sure</button>
        </form>
      </div>
    </div>
  </div>
</div>