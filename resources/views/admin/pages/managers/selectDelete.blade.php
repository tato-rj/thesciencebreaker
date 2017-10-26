@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Managers
        @slot('comment')
          Choose below the member you want to <u>delete</u>
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5">
            <i class="fa fa-trash mr-1" aria-hidden="true"></i> <strong>Delete member</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Manager to be deleted</label>
            <select class="form-control" id="break_id" name="break_id">
              <option selected disabled>I want to delete...</option>
              @foreach ($managers as $manager)
              <option data-id="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <p>You selected the manager <em><strong></strong></em></p>
            <div>
            </p>Please click below to confirm</p>
            <button type="button" class="btn btn-danger" data-id='' data-toggle="modal" data-target="#delete_manager">
              Delete manager
            </button>
          </div>
        </div>

          <!-- Modal -->
          <div class="modal fade" id="delete_manager" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body d-flex flex-column align-items-center ">
                  <h5 class="text-muted mb-4">This action cannot be undone!</h5>
                  <form method="POST" action="">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn  btn-danger">Yes, I am sure</button>
                  </form>
                  <button type="button" class="btn btn-link " data-dismiss="modal">Never mind</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('select').on('change', function() {
  $name = this.value;
  $id = $(this).children(':selected').attr('data-id');
  $('#confirm strong').text($name);
  $('#confirm button').attr('data-id', $id);
  $('#confirm').fadeIn();
});
$('#confirm button').on('click', function() {
  $id = $(this).attr('data-id');
  $('#delete_manager form').attr('action', '/admin/managers/'+$id);
});
</script>
@endsection