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
              <option data-slug="{{ $break->slug }}">{{ $break->title }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('select#break_id').on('change', function() {
  $title = this.value;
  $slug = $(this).children(':selected').attr('data-slug');
  window.location.href = '/admin/breaks/'+$slug+'/edit';
});
</script>
@endsection