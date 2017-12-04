@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Tags
        @slot('comment')
          In this page you can <u>edit</u> or <u>delete</u> tags
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-tag mr-1" aria-hidden="true"></i> <strong>Tags</strong>
          </h2>
        </div>
      </div>
            <div class="d-flex justify-content-center">
        <form class="jumbotron" method="POST" action="/admin/tags">
          {{csrf_field()}}
          <div class="form-inline">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon"><i class="fa fa-tag mr-1" aria-hidden="true"></i></div>
              <input required type="text" class="form-control" name="tag" placeholder="New tag">
            </div>
            <button type="submit" class="btn btn-theme-orange">Create tag</button>
          </div>
            {{-- Error --}}
            @component('admin/snippets/error')
              tag
              @slot('feedback')
              {{ $errors->first('tag') }}
              @endslot
            @endcomponent
        </form>          
      </div>
      <div class="row">
        <div class="col-8 mx-auto">
          {{-- Sort results bar --}}
          @component('components/snippets/sort_bar')
            showing <strong>{{ $tags->firstItem() }}-{{ $tags->lastItem() }}</strong> of {{ $tags->total() }}<span class="d-none d-sm-inline"> tags</span>

            @slot('show')
            <option value="20" {{ (Request::input('show') == '20') ? 'selected' : '' }}>20</option>
            <option value="40" {{ (Request::input('show') == '40') ? 'selected' : '' }}>40</option>
            <option value="80" {{ (Request::input('show') == '80') ? 'selected' : '' }}>80</option>
            <option value="{{ $tags->total() }}" {{ (Request::input('show') == $tags->total()) ? 'selected' : '' }}>all</option>
            @endslot

            @slot('sort')
            <option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>newest</option>
            <option value="articles_count" {{ (Request::input('sort') == 'articles_count') ? 'selected' : '' }}>number of usage</option>
            <option value="name" {{ (Request::input('sort') == 'name') ? 'selected' : '' }}>tag (a to z)</option>
            @endslot
          @endcomponent
        </div>
        <div class="col-12 text-center">   
          <p class="text-muted mb-2">
            <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
            You currently have <strong>{{ count($tags) }}</strong> tags
          </p>
        </div>
        <div class="col-lg-10 col-md-12 mx-auto d-flex align-items-center justify-content-center flex-wrap">
          @foreach ($tags as $tag)
          <div class="d-flex align-items-center justify-content-center  flex-column p-1 px-2 m-2 tag-item round-corners">
            <div class="d-flex align-items-center bb-1 pb-1">
            <p class="m-0">
              <strong>{{$tag->name}}</strong>
            </p>
              <i data-toggle="modal" data-target="#delete_modal" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}" class="ml-2 fa fa-trash align-middle cursor-link" aria-hidden="true"></i>
              <i data-toggle="modal" data-target="#edit_modal" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}" data-count="{{ $tag->articles_count }}" class="ml-2 fa fa-pencil-square-o align-middle cursor-link" aria-hidden="true" style="margin-top: 3px"></i>
            </div>
            <div>
              <small>
                {{$tag->articles_count}} breaks
              </small>
            </div>
          </div>
          @endforeach
        </div>
        <div class="col-12 d-flex justify-content-center">
          {{ $tags->appends(Request::except('page'))->links() }}
        </div>
      </div>

      @include('admin/snippets/confirm_delete')
      @include('admin/snippets/edit_tag')

    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.fa-trash').on('click', function() {
  $id = $(this).attr('data-id');
  $name = $(this).attr('data-name');

  $('#delete_modal form').attr('action', '/admin/tags/'+$name);
  $('#delete_modal h6 strong').text($name);
});

$('.fa-pencil-square-o').on('click', function() {
  $id = $(this).attr('data-id');
  $name = $(this).attr('data-name');
  $count = $(this).attr('data-count');

  $('#edit_modal form').attr('action', '/admin/tags/'+$name);
  $('#edit_modal input[name="tag"]').val($name);
  $('#edit_modal span#count').text($count);
});
</script>
@endsection