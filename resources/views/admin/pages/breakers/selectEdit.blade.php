@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breakers
        @slot('comment')
          Choose below the Breaker you want to <u>edit</u>
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Choose Breaker to edit</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Breaker to be edited</label>
            <select class="form-control" id="breaker_id" name="breaker_slug">
              <option selected disabled>I want to edit...</option>
              @foreach ($breakers as $breaker)
              <option data-slug="{{ $breaker->slug }}">{{ $breaker->first_name }} {{ $breaker->last_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('select#breaker_id').on('change', function() {
  $title = this.value;
  $slug = $(this).children(':selected').attr('data-slug');
  window.location.href =  '/admin/breakers/'+$slug+'/edit';
});
</script>
@endsection