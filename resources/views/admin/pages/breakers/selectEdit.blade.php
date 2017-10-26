@extends('admin/_core')

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
          <h2 class="text-muted op-5">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Choose Breaker to edit</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Breaker to be edited</label>
            <select class="form-control" id="breaker_id" name="breaker_id">
              <option selected disabled>I want to edit...</option>
              @foreach ($breakers as $breaker)
              <option data-id="{{ $breaker->id }}">{{ $breaker->first_name }} {{ $breaker->last_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <p>You selected the Breaker <em><strong></strong></em></p>
            <div>
            <a href="" class="btn no-hover btn-theme-orange">
              Edit Breaker
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('select').on('change', function() {
  $title = this.value;
  $id = $(this).children(':selected').attr('data-id');
  $('#confirm strong').text($title);
  $('#confirm a').attr('href', '/admin/breakers/'+$id+'/edit');
  $('#confirm').fadeIn();
});
</script>
@endsection