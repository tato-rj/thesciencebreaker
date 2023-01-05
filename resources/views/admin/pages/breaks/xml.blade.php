@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breaks
        @slot('comment')
          Use the form below to add a break by <u>uploading</u> an xml file
        @endslot
      @endcomponent

      <div class="bg-light mb-4 p-3">
        <form action="http://tsb.rikvoorhaar.com/" method="POST" enctype="multipart/form-data">
          <input type="file" name="json">
          <button type="submit">Submit</button>
        </form>
      </div>

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <form id="xml-form" action="{{route('xml')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group border p-3 mb-4">
              <label><strong>XML File</strong></label>
              <input type="file" id="xml-input" name="xml" class="form-control-file" required>
            </div>
            
            {{-- Content --}}
            <div class="form-group">
              {{-- <textarea required class="form-control" name="content" id="content" rows="8" placeholder="Break">{{ old('content') }}</textarea> --}}
              <input id="content" value="{{ old('content') }}" type="hidden" name="content">
              <trix-editor placeholder="Break content" input="content" style="min-height: 25em;"></trix-editor>
              {{-- Error --}}
              @component('admin/snippets/error')
                content
                @slot('feedback')
                {{ $errors->first('content') }}
                @endslot
              @endcomponent
            </div>

            {{-- Editor --}}
            <div class="form-group">         
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

            {{-- Reading time --}}
            <div class="form-group">
              <div class="input-group">
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

            {{-- Caption --}}
            <div>
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

          {{-- Date of publication --}}   
          <div class="form-group">         
            <label><strong>Date of publication</strong></label>
            @datepicker(['name' => 'published_at', 'time' => true])
            @component('admin/snippets/error')
            published_at
            @slot('feedback')
            {{ $errors->first('published_at') }}
            @endslot
            @endcomponent
          </div>  

            <button type="submit" class="btn btn-dark">Upload XML</button>
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
@endsection