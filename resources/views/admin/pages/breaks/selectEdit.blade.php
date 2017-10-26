@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breaks
        @slot('comment')
          Choose below the Break you want to <u>edit</u>
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Choose Break to edit</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Break to be edited</label>
            <select class="form-control" id="break_id" name="break_id">
              <option selected disabled>I want to edit...</option>
              @foreach ($breaks as $break)
              <option data-id="{{ $break->id }}">{{ $break->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <p>You selected the Break <em><strong></strong></em></p>
            <div>
            <a href="" class="btn no-hover btn-theme-orange">
              Edit Break
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
  $('#confirm a').attr('href', '/admin/breaks/'+$id+'/edit');
  $('#confirm').fadeIn();
});
</script>
@endsection