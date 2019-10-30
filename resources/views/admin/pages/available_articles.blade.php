@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Available Articles
        @slot('comment')
          In this page you can <u>create</u>, <u>edit</u> and <u>delete</u> available articles
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-coffee mr-1" aria-hidden="true"></i> <strong>Available Articles</strong>
          </h2>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <form class="jumbotron" method="POST" action="/admin/available-articles">
            {{csrf_field()}}
            <div class="form-group">
              <textarea class="form-control" id="article" name="article" rows="3" placeholder="New article here"></textarea>
            </div>
            <div class="form-inline mt-3 d-flex justify-content-between">
              <select class="form-control" id="category_id" name="category_id">
                <option selected disabled>Select the category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              <button type="submit" class="btn btn-theme-orange">Make this article available</button>
            </div>
          </form>          
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
              {{-- Error --}}
              @component('admin/snippets/error')
                article
                @slot('feedback')
                {{ $errors->first('article') }}
                @endslot
              @endcomponent

      <div class="text-center">
        <button type="button" style="display: none;" id="delete_multiple" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_multiple_modal">Delete selections</button>
      </div>
      {{-- Sort --}}
      <small class="d-flex justify-content-between align-items-end mt-4">
        <div>
          showing <strong>{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</strong> of {{ $articles->total() }} breaks
        </div>
        <div class="form-inline">
          <label class="mr-sm-2">show</label>
          <form>
            <input type="hidden" name="sort" value="{{ Request::input('sort') }}">
            <select class="mb-2 mr-sm-2 mb-sm-0" name="show" onchange="this.form.submit()" id="show">
              <option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
              <option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
              <option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
              <option value="{{ $articles->total() }}" {{ (Request::input('show') == $articles->total()) ? 'selected' : '' }}>all</option>
            </select>
          </form>
          <label class="mr-sm-2">sort by</label>
          <form>
            <input type="hidden" name="show" value="{{ Request::input('show') }}">
            <select class="mb-2 mr-sm-2 mb-sm-0" name="sort" onchange="this.form.submit()" id="sort">
              <option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>newest</option>
              <option value="category_id" {{ (Request::input('sort') == 'category_id') ? 'selected' : '' }}>category</option>
            </select>
          </form>
        </div>
      </small>
      <hr style="margin-top: .5rem">

          @foreach ($articles as $article)
          <div class="d-flex mt-4 mb-2 pb-2">
            <div class="mr-2">
              <input type="checkbox" name="delete_multiple" data-id="{{ $article->id }}">
            </div>
            <div class="flex-grow mr-2">
              <p class="mb-1 lh-1"><small><i class="fa fa-newspaper-o mr-2" aria-hidden="true"></i>{!! html_entity_decode($article->article) !!}</small></p>
              <p class="m-0"><span class="badge badge-info btn-theme-green">in {{ $article->category->name }}</span></p>
            </div>
            <div>
              <button type="button" class="edit btn btn-sm btn-block btn-warning" data-id="{{ $article->id }}" data-article="{{ $article->article }}" data-category_id="{{ $article->category->id }}" data-toggle="modal" data-target="#edit_available">Edit</button>
              <button type="button" class="delete btn btn-sm btn-block btn-danger" data-title="This available article" data-id="{{ $article->id }}" data-toggle="modal" data-target="#delete_modal">Delete</button>
            </div>
          </div>
          @if (!$loop->last)
          <hr>
          @endif
          @endforeach
          {{ $articles->links() }}
        </div>
      </div>

      @include('admin/snippets/confirm_delete')
      @include('admin/snippets/confirm_delete_multiple')

        <!-- Edit Modal -->
        <div class="modal fade" id="edit_available" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>Edit Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="">
                  {{ method_field('PATCH') }}
                  {{csrf_field()}}
                  <div class="form-group">
                    <textarea class="form-control" id="article" name="article" rows="5" placeholder="Article"></textarea>
                  </div>
                  <div class="form-inline mt-3 d-flex justify-content-between">
                    <select class="form-control" id="category_id" name="category_id">
                      <option selected disabled>Select the category</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-theme-orange">Save changes</button>
              </div>
              </form>  
            </div>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('input[name="delete_multiple"]').on('click', function() {
  let ids = [];
  let msg;

  $('input[name="delete_multiple"]:checked').each(function() {
    ids.push($(this).attr('data-id'));
  });

  if (ids.length) {
    $('button#delete_multiple').show();
    $('#delete_multiple_modal input[name="articles"]').val(JSON.stringify(ids));
    if (ids.length > 1) {
      msg = 'all ' + ids.length + ' articles';
    } else {
      msg = '1 article';
    }
  } else {
    $('button#delete_multiple').hide();    
    msg = '';
  }

  $('#delete_multiple_modal span.count').text(msg);
  console.log(ids.length);
});
</script>
<script type="text/javascript">
$('button.edit').on('click', function() {
  $modal = $('#edit_available');
  $id = $(this).attr('data-id');
  $article = $(this).attr('data-article');
  $category_id = $(this).attr('data-category_id');

  $modal.find('form').attr('action', '/admin/available-articles/'+$id);
  $modal.find('textarea').text($article);
  $modal.find('select option').each(function() {
    if ($(this).val() == $category_id) {
      $(this).attr('selected', true);
    }
  });
});

$('button.delete').on('click', function() {
  $id = $(this).attr('data-id');
  $title = $(this).attr('data-title');
  $('#delete_modal h6 strong').text($title);
  $('#delete_modal').find('form').attr('action', '/admin/available-articles/'+$id);
});
</script>
@endsection