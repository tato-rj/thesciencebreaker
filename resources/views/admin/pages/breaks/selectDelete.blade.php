@extends('admin/app')

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
            <select class="form-control" id="break_slug" name="break_slug">
              <option selected disabled>I want to delete...</option>
              @foreach ($breaksByCategory as $category)
                <optgroup label="{{ $category->name }}">
                  @foreach ($category->articles as $break)
                  <option data-slug="{{ $break->slug }}">{{ $break->title }} (from {{ $break->created_at->toFormattedDateString() }})</option>
                  @endforeach
                </optgroup>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <button type="button" class="btn btn-danger" data-title="" data-slug="" data-toggle="modal" data-target="#delete_modal">
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
  $slug = $(this).find(':selected').attr('data-slug');
  $('#confirm button').attr('data-slug', $slug).attr('data-title', $title);
  $('#confirm').fadeIn();
});
$('#confirm button').on('click', function() {
  $slug = $(this).attr('data-slug');
  $title = $(this).attr('data-title');
  $('#delete_modal h6 strong').text($title);
  $('#delete_modal form').attr('action', '/admin/breaks/'+$slug);
});
</script>
@endsection