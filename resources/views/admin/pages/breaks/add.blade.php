@extends('admin/_core')

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
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-file-text mr-1" aria-hidden="true"></i> <strong>New Break</strong>
          </h2>
          <form method="POST" action="/admin/breaks" enctype="multipart/form-data">
            {{csrf_field()}}
            {{-- Title --}}
            <div class="form-group">
              <input required type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Title">
              {{-- Error --}}
              @component('admin/snippets/error')
                title
                @slot('feedback')
                {{ $errors->first('title') }}
                @endslot
              @endcomponent
            </div>
            {{-- Description --}}
            <div class="form-group">
              <textarea class="form-control" name="description" id="description" rows="2" maxlength="255" placeholder="Description (max 255 characters)">{{ old('descritpion') }}</textarea>
              {{-- Error --}}
              @component('admin/snippets/error')
                description
                @slot('feedback')
                {{ $errors->first('description') }}
                @endslot
              @endcomponent
            </div>
            {{-- Content --}}
            <div class="form-group">
              <textarea required class="form-control" name="content" id="content" rows="8" placeholder="Break">{{ old('content') }}</textarea>
              {{-- Error --}}
              @component('admin/snippets/error')
                content
                @slot('feedback')
                {{ $errors->first('content') }}
                @endslot
              @endcomponent
            </div>
            <div class="form-group">
              <label><strong>Breakers</strong> <small>(you can select have as many as you need)</small></label>
              <select required multiple class="form-control" size="12" id="authors" name="authors[]">
                @foreach ($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
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
            <hr>
            <div class="form-inline form-group">
              {{-- Reading Time --}}
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-addon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
                <input required type="text" value="{{ old('reading_time') }}" name="reading_time" size="10" class="form-control" id="reading_time" placeholder="Reading time">
              </div>
              {{-- Category --}}
              <select class="custom-select mb-2 mr-sm-2" id="category_id" name="category_id">
                <option  selected disabled>Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
              {{-- Editor --}}
              <select class="custom-select mb-2 mr-sm-2" id="editor_id" name="editor_id">
                <option  selected disabled>Editor</option>
                @foreach ($editors as $editor)
                  <option value="{{ $editor->id }}" {{ (old('editor_id') == $editor->id) ? 'selected' : '' }}>{{ $editor->fullName() }}</option>
                @endforeach
              </select>
              <div class="d-block">
                {{-- Errors --}}
                @component('admin/snippets/error')
                  reading_time
                  @slot('feedback')
                  {{ $errors->first('reading_time') }}
                  @endslot
                @endcomponent
                @component('admin/snippets/error')
                  category_id
                  @slot('feedback')
                  {{ $errors->first('category_id') }}
                  @endslot
                @endcomponent
                @component('admin/snippets/error')
                  editor_id
                  @slot('feedback')
                  {{ $errors->first('editor_id') }}
                  @endslot
                @endcomponent
              </div>
            </div>
            {{-- PDF --}}

            <div class="form-group">
              <input type="file" class="form-control-file" id="file" name="file">
              <small class="form-text text-muted">Upload a PDF file for this break</small>
              {{-- Error --}}
              @component('admin/snippets/error')
                file
                @slot('feedback')
                {{ $errors->first('file') }}
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
          </form>
        </div>
      </div>
    </div>
@endsection