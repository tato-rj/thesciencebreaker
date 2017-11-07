<div class="modal fade" id="order_breakers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-random mr-2" aria-hidden="true"></i>Drag to re-order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul id="breakers_list" class="m-0 p-0">

        </ul>
        <div class="hidden" id="temp_list">
          
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <div>
          <div id="success" class="hidden">
            <small class="text-success"><i class="fa fa-check mr-1" aria-hidden="true"></i><span></span></small>
          </div>
          <div id="fail" class="hidden">
            <small class="text-danger"><i class="fa fa-times mr-1" aria-hidden="true"></i><span></span></small>
          </div>
        </div>
        <button type="button" id="setOrder" data-break-slug="" class="btn btn-theme-green">Set new order</button>
      </div>
    </div>
  </div>
</div>