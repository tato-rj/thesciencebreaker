@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Editor's Picks
        @slot('comment')
          In this page you can <u>change</u> the Editor's Picks
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-star mr-1" aria-hidden="true"></i> <strong>Editor's Picks</strong>
          </h2>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <div class="jumbotron">
            @foreach ($picks as $pick)
            <form method="POST" class="d-flex {{ (!$loop->last) ? 'mb-3' : '' }}" action="/admin/editor-picks/{{ $pick->id }}">
              {{csrf_field()}}
              {{method_field('PATCH')}}
                <div class="input-group">
                  <div class="input-group-addon">{{ $loop->iteration }}</div>
                  <select required class="form-control" id="pick" name="pick">
                    @foreach ($articles as $article)
                    <option value="{{ $article->id }}" {{ ($article->id == $pick->id) ? 'selected' : ''}}>
                      {{ $article->title }}
                    </option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" data-id="{{ $pick->id }}" class="btn btn-warning ml-3 z-10">Change</button>
            </form>
            @endforeach
          </div>    
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('form button').on('click', function(event) {
  if ($(this).attr('data-id') == $(this).parent().find('select option:selected').val()) {
    event.preventDefault();
    alert('No changes have been made!');
  }
  
});
</script>
@endsection