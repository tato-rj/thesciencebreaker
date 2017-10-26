@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Available Articles
        @slot('comment')
          In this page you can <u>create</u>,<u>edit</u> and <u>delete</u> available articles
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
          <form class="jumbotron" method="POST" accept="/admin/available-articles">
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
          <p class="text-muted"><i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>You currently have a total of <strong>{{ $available_count }}</strong> available articles</p>
                                    {{-- Error --}}
              @component('admin/snippets/error')
                article
                @slot('feedback')
                {{ $errors->first('article') }}
                @endslot
              @endcomponent
          @foreach ($articles as $article)
          <div class="d-flex align-items-center mt-4 mb-2 pb-2">
            <div class="flex-grow mr-2">
              <p class="mb-1 lh-1"><small><i class="fa fa-newspaper-o mr-2" aria-hidden="true"></i>{!! html_entity_decode($article->article) !!}</small></p>
              <p class="m-0"><span class="badge badge-info btn-theme-green">in {{ $article->category->name }}</span></p>
            </div>
            <div>
              <button type="button" class="edit btn btn-sm btn-block btn-warning" data-id="{{ $article->id }}" data-article="{{ $article->article }}" data-category_id="{{ $article->category->id }}" data-toggle="modal" data-target="#edit_available">Edit</button>
              <button type="button" class="delete btn btn-sm btn-block btn-danger" data-id="{{ $article->id }}" data-toggle="modal" data-target="#delete_available">Delete</button>
            </div>
          </div>
          @if (!$loop->last)
          <hr>
          @endif
          @endforeach
          {{ $articles->links() }}
        </div>
      </div>
        <!-- Delete Modal -->
        <div class="modal fade" id="delete_available" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex flex-column align-items-center ">
                <h5 class="text-muted mb-4">This action cannot be undone!</h5>
                <form method="POST" action="">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn  btn-danger">Yes, I am sure</button>
                </form>
                <button type="button" class="btn btn-link " data-dismiss="modal">Never mind</button>
              </div>
            </div>
          </div>
        </div>

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
  $modal = $('#delete_available');
  $id = $(this).attr('data-id');

  $modal.find('form').attr('action', '/admin/available-articles/'+$id);
});
</script>
@endsection