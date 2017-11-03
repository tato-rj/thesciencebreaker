@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Managers
        @slot('comment')
          Choose below the member you want to <u>edit</u>
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Choose member to edit</strong>
          </h2>

          <div class="form-group">
            <label for="exampleSelect2">Select the Manager to be edited</label>
            <select class="form-control" id="manager_slug" name="manager_slug">
              <option selected disabled>I want to edit...</option>
              @foreach ($managers as $manager)
              <option data-slug="{{ $manager->slug }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="hidden" id="confirm">
            <p>You selected <em><strong></strong></em></p>
            <div>
            <a href="" class="btn no-hover btn-theme-orange">
              Edit manager
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
  $slug = $(this).children(':selected').attr('data-slug');
  $('#confirm strong').text($title);
  $('#confirm a').attr('href', '/admin/managers/'+$slug+'/edit');
  $('#confirm').fadeIn();
});
</script>
@endsection