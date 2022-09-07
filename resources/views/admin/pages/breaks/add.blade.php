@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breaks
        @slot('comment')
          Use the form below to <u>add</u> a new break
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <div class="d-flex justify-content-between align-items-start">
            <h2 class="text-muted op-5 mb-3">
              <i class="fa fa-file-text mr-1" aria-hidden="true"></i> <strong>New Break</strong>
            </h2>
            <button class="btn-sm btn btn-theme-orange" data-toggle="modal" data-target="#french">French</button>
          </div>
          <form id="break-form" method="POST" action="/admin/breaks" enctype="multipart/form-data" data-fromXml="{{$publication['title'] ?? ''}}" data-keywords="{{json_encode($keywords ?? [])}}">
            {{csrf_field()}}
            {{-- Title --}}
            <div class="form-group">
              <div class="d-flex align-items-center">
                <input required type="text" value="{{ $publication['title'] ?? old('title') }}" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Title">
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
            <div class="row">
              <div class="col-12 ml-2">
                <p class="mb-0"><small id="url-preview"></small></p>
                <p><small id="doi-preview"></small></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                {{-- Description --}}
                <div class="form-group">
                  <textarea class="form-control" name="description" id="description" rows="6" maxlength="400" placeholder="Description (max 500 characters)">{{ $publication['description'] ?? old('description') }}</textarea>
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
                  <select class="custom-select form-control" id="category_id" name="category_id">
                    <option  selected disabled>Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
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
                  <select class="custom-select form-control mb-2 mr-sm-2" id="editor_id" name="editor_id">
                    <option  selected disabled>Editor</option>
                    @foreach ($editors as $editor)
                      <option value="{{ $editor->id }}" {{ (old('editor_id') == $editor->id) ? 'selected' : '' }}>{{ $editor->resources()->fullName() }}</option>
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

                  <div class="d-flex align-items-center">
                    <textarea name="image_caption" class="form-control" id="caption" maxlength="255" rows="4" aria-describedby="caption" placeholder="Image caption (max 255 characters)">{{ old('image_caption') }}</textarea>
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
                  <div class="d-flex align-items-center">
                    <input type="text" value="{{ old('image_credits') }}" name="image_credits" class="form-control" id="caption" aria-describedby="credits" placeholder="Image credits">         
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
                  <div id="upload-box" class="card">
                    <input type="file" id="image" name="image" style="display:none;" />
                    <img class="card-img-top" id="cover-img" src="{{ asset('images/no-image.png') }}" alt="Not an image">
                    <div class="card-body text-center">
                      <button type="button" id="upload-button" class="btn bg-default text-white"><i class="fa fa-cloud-upload mr-1" aria-hidden="true"></i>Upload</button>
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
              <textarea required class="form-control" name="content" id="content" rows="8" placeholder="Break">{{ old('content') }}</textarea>
{{--               <input id="content" value="{{ old('content') }}" type="hidden" name="content">
              <trix-editor placeholder="Break content" input="content"></trix-editor> --}}
              {{-- Error --}}
              @component('admin/snippets/error')
                content
                @slot('feedback')
                {{ $errors->first('content') }}
                @endslot
              @endcomponent
            </div>
            <div class="form-group">
              <label><strong>Breakers</strong> <small>(hold down <code>ctrl</code> to select more than one)</small></label>
              <select required multiple class="form-control" size="12" id="authors" name="authors[]">
                @foreach ($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->resources()->fullName() }}</option>
                @endforeach
              </select>
            </div>
            {{-- Original Article --}}
            <div class="form-group">
              <input required type="text" {{ old('original_article') }} name="original_article" class="form-control" id="original_article" aria-describedby="original_article" placeholder="Original article">
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
               
                  <div class="input-group col-3 pl-0">
                    <div class="input-group-addon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
                    <input required type="text" value="{{ old('reading_time') }}" name="reading_time" size="4" class="form-control" id="reading_time" placeholder="Reading time">
                  </div>
                  @component('admin/snippets/error')
                  reading_time
                  @slot('feedback')
                  {{ $errors->first('reading_time') }}
                  @endslot
                  @endcomponent
                </div>   

          <div class="form-group">
            {{-- Date of publication --}}            
            <label><strong>Date of publication</strong></label>
            @datepicker(['name' => 'published_at', 'time' => true])
            @component('admin/snippets/error')
            published_at
            @slot('feedback')
            {{ $errors->first('published_at') }}
            @endslot
            @endcomponent
          </div>  

            {{-- PDF --}}

            <div class="form-group">
              <input type="file" class="form-control-file" id="pdf" name="pdf">
              <small class="form-text text-muted">Upload a PDF file for this break</small>
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
                <input type="checkbox" value="1" {{ (old('editor_pick') == '1') ? 'checked' : '' }} name="editor_pick" class="form-check-input" id="editor_pick">
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
            @include('admin/snippets/languages/add_french')
            @include('admin/snippets/tags')
          </form>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$('.datepicker').datepicker();  
</script>
<script type="text/javascript">
$(document).on('click', '.tags span a', function() {
  $container = $(this).parent();
  $checkbox = $container.find('input[type="checkbox"]');

  $container.toggleClass('selected');
  $checkbox.prop("checked", !$checkbox.prop("checked"));
});

  $('#addTag').on('click', function() {
    $tag = $('input[name="tag"]').val();

    $.post('/admin/tags', {'tag': $tag})
    .done(function(id){
      $('.modal #success small span').text('The tags was created!');
      $('.modal #success').fadeIn().delay(1000).fadeOut('fast');
      $new_tag = $('.tags span').first().clone().removeClass('selected').attr('data-id', id).children('a').text($tag).parent();
      $new_tag.find('input').val(id);
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
<script type="text/javascript">
$('input[name="title"], select[name="category_id"]').on('keyup change', function() {
  $title = $('input[name="title"]').val();
  $category = $('#category_id option:selected').text();
  $url = $('#url-preview');
  $doi = $('#doi-preview');
  
  $category_slug = slugify($category);
  $title_slug = slugify($title);

  if ($title != '') {
    if ($category_slug != 'category') {
      $url.html('<strong>URL</strong> https://www.thesciencebreaker.org/breaks/'+$category_slug+'/'+$title_slug);
    } else {
      $url.html('<strong>URL</strong> select the category to display a preview');
    }
    $.get("/admin/preview-doi", function(data, status){
      $doi.html('<strong>DOI</strong> '+data);
    });
  } else {
    $url.html('');
    $doi.html('');
  }
});

function removeSpecialCharacters ($string) {
  return $string.replace(/[^a-zA-Z 0-9]+/g, '');
}
function createSlug ($string) {
  return $string.replace(/\s+/g, '-').toLowerCase()
}

function slugify(text)
{
  return text.toString().toLowerCase()
    .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Remove all accents
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}
</script>

<script type="text/javascript">
let fromXml = $('#break-form').data('fromXml').length > 0;
let keywords = $('#break-form').data('keywords');

for (var i=0; i<keywords.length; i++) {
  $('div.tags').find('span[data-name="'+keywords[i].toLowerCase()+'"]').addClass('selected');
  $('div.tags').find('input[data-name="'+keywords[i].toLowerCase()+'"]').prop('checked', true);
}

let authors = $('#break-form').data('authors');

if (fromXml) {
  $('#authors > option').each(function() {
    $(this).prop('selected', true);
  });
}
</script>
@endsection