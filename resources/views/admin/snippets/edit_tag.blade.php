<!-- Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-tag mr-2" aria-hidden="true"></i>Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center">
        <form method="POST" action="">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group mb-0">
          <input type="text" class="form-control" name="tag">
        </div>
        <p class="mt-2 mb-2">
          <small>This tag is linked to <strong><span id="count"></span></strong> break(s)</small>
        </p>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-theme-orange">Update tag</button>
        </form>
      </div>
    </div>
  </div>
</div>