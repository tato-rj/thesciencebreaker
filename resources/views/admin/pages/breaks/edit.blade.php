@extends('admin/app')

@section('content')

<div class="container-fluid mb-4">

  @component('admin/snippets/page_title')
  Breaks
  @slot('comment')
  Use the form below to <u>edit</u> the Break
  @endslot
  @endcomponent

  <div class="row mt-4">
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
      <div class="d-flex justify-content-between align-items-start">
        <h2 class="text-muted op-5 mb-3">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Edit Break</strong>
        </h2>
        @if($article)
        <button class="btn-sm btn btn-theme-orange" data-toggle="modal" data-target="#french">French</button>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleSelect2">Select the Break to be edited</label>
        <select class="form-control" id="break_id" name="break_id">
          <option selected disabled>I want to edit...</option>
          @foreach ($categories as $category)
          <optgroup label="{{ $category->name }}">
            @foreach ($category->articles as $break)
            <option data-slug="{{ $break->slug }}">{{ $break->title }}</option>
            @endforeach
          </optgroup>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        @include('components/snippets/search')
      </div>
    
      @if($article)
      <div class="mt-5">
        <small class="text-muted pull-right d-none d-sm-block"><em>This break was last updated on {{ $article->updated_at->toDayDateTimeString() }}</em></small>
        <form method="POST" action="/admin/breaks/{{ $article->slug }}" enctype="multipart/form-data">
          {{csrf_field()}}
          {{method_field('PATCH')}}
          {{-- Title --}}
          <div class="form-group">
            <label><strong>Title</strong></label>
            <div class="d-flex align-items-center">
              <input required type="text" value="{{ $article->title }}" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Title">
              <button type="button" class="btn btn-theme-green ml-2" data-toggle="modal" data-target="#tags">Tags</button>               
            </div>

            {{-- Error --}}
            @component('admin/snippets/error')
            title
            @slot('feedback')
            {{ $errors->first('title') }}
            @endslot
            @endcomponent

          </div>
            <div class="form-check">
              <label class="form-check-label mb-2">
                <input type="checkbox" value="1" name="update_url" class="form-check-input" id="update_url">
                I also want to update the <strong>url</strong> for this break
              </label>
            </div>
          <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
              {{-- Description --}}
              <div class="form-group">
                <label><strong>Description</strong></label>
                <textarea class="form-control" name="description" id="description" rows="6" maxlength="500" placeholder="Description (max 500 characters)">{{ $article->description }}</textarea>
                {{-- Error --}}
                @component('admin/snippets/error')
                description
                @slot('feedback')
                {{ $errors->first('description') }}
                @endslot
                @endcomponent
              </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">

              <div class="form-group">
                {{-- Category --}}
                <label><strong>Category</strong></label>
                <select class="custom-select form-control" id="category_id" name="category_id">
                  <option  selected disabled>Category</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ ($article->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                </select>
                @component('admin/snippets/error')
                category_id
                @slot('feedback')
                {{ $errors->first('category_id') }}
                @endslot
                @endcomponent
              </div> 
              <div class="form-group">
                {{-- Editor --}}
                <label><strong>Editor</strong></label>
                <select class="custom-select form-control mb-2 mr-sm-2" id="editor_id" name="editor_id">
                  <option  selected disabled>Editor</option>
                  @foreach ($editors as $editor)
                  <option value="{{ $editor->id }}" {{ ($article->editor_id == $editor->id) ? 'selected' : '' }}>{{ $editor->resources()->fullName() }}</option>
                  @endforeach
                </select>
                @component('admin/snippets/error')
                editor_id
                @slot('feedback')
                {{ $errors->first('editor_id') }}
                @endslot
                @endcomponent
              </div>   

            </div>
          </div>

          <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
              {{-- Caption --}}
              <div class="form-group">
                <label><strong>Image caption</strong></label>
                <div class="d-flex align-items-center">
                  <textarea name="image_caption" class="form-control" id="caption" maxlength="255" rows="4" aria-describedby="caption" placeholder="Caption (max 255 characters)">{{ $article->image_caption }}</textarea>       
                </div>

                {{-- Error --}}
                @component('admin/snippets/error')
                image_caption
                @slot('feedback')
                {{ $errors->first('image_caption') }}
                @endslot
                @endcomponent
              </div> 
              {{-- Credits --}}
              <div class="form-group">
                <label><strong>Image credits</strong></label>
                <div class="d-flex align-items-center">
                  <input type="text" value="{{ $article->image_credits }}" name="image_credits" class="form-control" id="caption" aria-describedby="credits" placeholder="Credits">         
                </div>

                {{-- Error --}}
                @component('admin/snippets/error')
                image_credits
                @slot('feedback')
                {{ $errors->first('image_credits') }}
                @endslot
                @endcomponent
              </div>  
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">

              <div class="form-group">
                {{-- Image --}}
                <label><strong>Cover Image</strong></label>
                <div id="upload-box" class="card">
                  <input type="file" id="image" name="image" style="display:none;" />
                  <img class="card-img-top" id="cover-img" src="{{ asset($article->paths()->image()) }}" alt="Not an image">
                  <div class="card-body text-center">
                    <button type="button" id="upload-button" class="btn bg-default text-white my-1"><i class="fa fa-cloud-upload mr-1" aria-hidden="true"></i>Upload</button>
                    @if ($article->paths()->image() != 'images/no-image.png')
                    <button type="button" id="remove-image" class="btn btn-danger my-1" data-title="{{ $article->paths()->image() }}" data-slug="{{ $article->slug }}" data-toggle="modal" data-target="#delete_modal">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    @endif
                  </div>

                </div>
                {{-- Error --}}
                @component('admin/snippets/error')
                image
                @slot('feedback')
                {{ $errors->first('image') }}
                @endslot
                @endcomponent
              </div>             
            </div>
          </div>
          {{-- Content --}}
          <div class="form-group">
            <label><strong>Content</strong></label>
            <textarea required class="form-control" name="content" id="content" rows="22" placeholder="Break">{{ $article->content }}</textarea>
            {{-- Error --}}
            @component('admin/snippets/error')
            content
            @slot('feedback')
            {{ $errors->first('content') }}
            @endslot
            @endcomponent
          </div>
          {{-- Authors --}}
          <div class="form-group">
            <div class=" mb-1 d-flex align-items-center justify-content-between">
              <label><strong>Breakers</strong><span class="badge badge-warning ml-1">{{ count($article->authors) }}</span> <small>(you can select have as many as you need)</small></label>
              <button type="button" id="sort_breakers" class="btn btn-sm btn-theme-orange" data-toggle="modal" data-target="#order_breakers">Order</button>
            </div>
            @include('admin/snippets/order_breakers')
            <select required multiple class="form-control" size="12" id="authors" data-break-slug="{{ $article->slug }}" name="authors[]">
              @foreach ($authors as $author)
              <option value="{{ $author->id }}" data-position="{{ $author->position }}" data-sort="{{ $author->resources()->orderIn($article) }}" {{ in_array($author->id, $article->resources()->authorsIds()) ? 'selected' : '' }}>{{ $author->resources()->fullName() }}
              </option>
              @endforeach
            </select>
          </div>
          {{-- Original Article --}}
          <div class="form-group">
            <label><strong>Original Article</strong></label>
            <input required type="text" value="{{ $article->original_article }}" name="original_article" class="form-control" id="original_article" aria-describedby="original_article" placeholder="Original article">
            {{-- Error --}}
            @component('admin/snippets/error')
            original_article
            @slot('feedback')
            {{ $errors->first('original_article') }}
            @endslot
            @endcomponent
          </div>
          <div class="form-group">
            {{-- Reading time --}}            
            <label><strong>Reading time</strong></label>
            <div class="input-group col-3 pl-0">
              <div class="input-group-addon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
              <input required type="text" value="{{ $article->reading_time }}" name="reading_time" size="4" class="form-control" id="reading_time" placeholder="Reading time">
            </div>
            @component('admin/snippets/error')
            reading_time
            @slot('feedback')
            {{ $errors->first('reading_time') }}
            @endslot
            @endcomponent
          </div> 
          <div class="form-group">
            {{-- Date created --}}            
            <label><strong>Date created</strong></label>
            <div class="input-group col-3 pl-0">
              <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
              <input required type="text" value="{{ $article->created_at->format('m/d/Y') }}" name="created_at" class="form-control datepicker" data-provide="datepicker" id="created_at" placeholder="Month/Day/Year">
            </div>
            @component('admin/snippets/error')
            created_at
            @slot('feedback')
            {{ $errors->first('created_at') }}
            @endslot
            @endcomponent
          </div>  
          {{-- PDF --}}
          <div class="form-group">
            <label><strong>PDF</strong></label>
            <input type="file" class="form-control-file" id="pdf" name="pdf">
            <small class="form-text text-muted">
              @if(File::exists($article->paths()->pdf()))
              A PDF already exists. <strong><a class="text-success" href="{{ asset($article->paths()->pdf()) }}">Click here</a></strong> to view it.
              @else
              This break is <u class="text-danger">missing</u> the PDF
              @endif
            </small>
            {{-- Error --}}
            @component('admin/snippets/error')
            pdf
            @slot('feedback')
            {{ $errors->first('pdf') }}
            @endslot
            @endcomponent
          </div>
          {{-- Editor's Pick --}}
          <div class="form-check">
            <label class="form-check-label mb-2">
              <input type="checkbox" value="1" {{ ($article->editor_pick == '1') ? 'checked' : '' }} name="editor_pick" class="form-check-input" id="editor_pick">
              Editor's Pick
            </label>
            {{-- Error --}}
            @component('admin/snippets/error')
            editor_pick
            @slot('feedback')
            {{ $errors->first('editor_pick') }}
            @endslot
            @endcomponent
          </div>
          <input type="submit" value="Submit" class="btn btn-theme-orange">
          @include('admin/snippets/languages/edit_french')
        </form>
        @include('admin/snippets/tags')
        @include('admin/snippets/confirm_delete')
      </div>
      @endif

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@include('javascript/search')

<script type="text/javascript">
var search = new AwesomeSearch({
    container: '#search-group',
    call: '/search/breaks',
    fields: ['title'],
    redirect: 'admin',
    limit: 10
  });

search.init();
</script>

<script type="text/javascript">
    $('select#break_id').on('change', function() {
    $slug = $(this).find(':selected').attr('data-slug');
    window.location.href = '/admin/breaks/'+$slug+'/edit';
  });
</script>

@if($article)

<script type="text/javascript">
$('.datepicker').datepicker();  

  $('#remove-image').on('click', function() {
    $slug = $(this).attr('data-slug');
    $title = $(this).attr('data-title');
    $('#delete_modal h6 strong').text($title);
    $('#delete_modal form').attr('action', '/admin/breaks/images/'+$slug);
  });
</script>

<script type="text/javascript">

  var list = document.getElementById('breakers_list');
  var sortable = Sortable.create(list);

  $('#sort_breakers').on('click', function() {
// Reset list and array
$('#breakers_list').html('');
$html = [];

// Get selected authors and put them into an array
$('#authors option:selected').each(function() {
  $html.push('<li id="'+$(this).val()+'" class="list-none m-1 p-1 px-2" data-sort="'+$(this).attr('data-sort')+'">'+$(this).text()+'<small>- '+$(this).attr('data-position')+'</small></li>');
});
// Put the array inside a temp hidden div
$('#temp_list').append($html);

// Sort the div based on the data-sort value and put the list on the final div
$('#temp_list li').sort(function(a,b) {
  return +a.dataset.sort - +b.dataset.sort;
}).appendTo('#breakers_list');

// Reset temp div
$('#temp_list').html('');

});

  $('#setOrder').on('click', function() {
    var $break_slug = $('#authors').attr('data-break-slug');
    var array = [];
    $('#breakers_list li').each(function() {
      array.push($(this).attr('id'));
    });

    $.post('/admin/breaks/'+$break_slug+'/breakers-order', {'order': array})
    .done(function(msg){
      $('.modal #success small span').text('Order updated!');
      $('.modal #success').fadeIn().delay(1000).fadeOut('fast');
      $('#breakers_list li').each(function(index) {
        $('#authors option[value='+$(this).attr('id')+']').attr('data-sort', index);
      });

    })
    .fail(function(xhr, status, error) {
      $('.modal #fail small span').text('Something went wrong...');
      $('.modal #fail').fadeIn().delay(1000).fadeOut('fast');
    });

  })



  $(document).on('click', '.tags span a', function() {
    $(this).parent().toggleClass('selected');
  });

  $('#setTags').on('click', function() {
    var tags = [];
    $break_slug = $(this).attr('data-break-slug');

    $('.tags .selected').each(function() {
      tags.push($(this).attr('data-id'));
    });

    $.post('/admin/breaks/'+$break_slug+'/tags', {'tags[]': tags})
    .done(function(msg){
      $('.modal #success small span').text('The tags were updated!');
      $('.modal #success').fadeIn().delay(1000).fadeOut('fast');
    })
    .fail(function(xhr, status, error) {
      $('.modal #fail small span').text('Something went wrong...');
      $('.modal #fail').fadeIn().delay(1000).fadeOut('fast');
    });
  });

  $('#addTag').on('click', function() {
    $tag = $('input[name="tag"]').val();

    $.post('/admin/tags', {'tag': $tag})
    .done(function(id){
      $('.modal #success small span').text('The tags was created!');
      $('.modal #success').fadeIn().delay(1000).fadeOut('fast');
      $new_tag = $('.tags span').first().clone().removeClass('selected').attr('data-id', id).children('a').text($tag).parent();
      $new_tag.appendTo('.tags');
    })
    .fail(function(xhr, status, error) {
      $('.modal #fail small span').text('Something went wrong...');
      $('.modal #fail').fadeIn().delay(1000).fadeOut('fast');
    });
  });
</script>
<script type="text/javascript">
  $('#upload-button').on('click', function() {
    $('input#image').click();
  });

  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#cover-img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("input#image").change(function() {
    readURL(this);
  });
</script>
@endif
@endsection