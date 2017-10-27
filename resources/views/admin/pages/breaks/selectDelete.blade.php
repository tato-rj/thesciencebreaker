@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breaks
        @slot('comment')
          Use the form below to <u>delete</u> the Break
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-trash mr-1" aria-hidden="true"></i> <strong>Delete Break</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Break to be deleted</label>
            <select class="form-control" id="break_id" name="break_id">
              <option selected disabled>I want to delete...</option>
              @foreach ($breaks as $break)
              <option data-id="{{ $break->id }}">{{ $break->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <button type="button" class="btn btn-danger" data-title="" data-id="" data-toggle="modal" data-target="#delete_modal">
              Delete Break
            </button>
          </div>
          @include('admin/snippets/confirm_delete')        
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('select').on('change', function() {
  $title = this.value;
  $id = $(this).children(':selected').attr('data-id');
  $('#confirm button').attr('data-id', $id).attr('data-title', $title);
  $('#confirm').fadeIn();
});
$('#confirm button').on('click', function() {
  $id = $(this).attr('data-id');
  $title = $(this).attr('data-title');
  $('#delete_modal h6 strong').text($title);
  $('#delete_modal form').attr('action', '/admin/breaks/'+$id);
});
</script>
@endsection