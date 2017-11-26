@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breakers
        @slot('comment')
          Choose below the Breaker you want to <u>delete</u>
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-trash mr-1" aria-hidden="true"></i> <strong>Delete Breaker</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Breaker to be deleted</label>
            <select class="form-control" id="breaker_slug" name="breaker_slug">
              <option selected disabled>I want to delete...</option>
              @foreach ($breakers as $breaker)
              <option data-slug="{{ $breaker->slug }}">{{ $breaker->first_name }} {{ $breaker->last_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <button type="button" class="btn btn-danger" data-name="" data-slug="" data-toggle="modal" data-target="#delete_modal">
              Delete Breaker
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
  $name = this.value;
  $slug = $(this).children(':selected').attr('data-slug');
  $('#confirm button').attr('data-name', $name);
  $('#confirm button').attr('data-slug', $slug);
  $('#confirm').fadeIn();
});
$('#confirm button').on('click', function() {
  $slug = $(this).attr('data-slug');
  $name = $(this).attr('data-name');
  $('#delete_modal h6 strong').text($name);
  $('#delete_modal form').attr('action', '/admin/breakers/'+$slug);
});
</script>
@endsection