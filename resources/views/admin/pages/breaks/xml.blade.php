@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breaks
        @slot('comment')
          Use the form below to add a break by <u>uploading</u> an xml file
        @endslot
      @endcomponent

      <div class="mt-4">
          <form id="xml-form" action="{{route('xml')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <input type="file" id="xml-input" name="xml" class="form-control-file" required>
            </div>
            
            {{-- Content --}}
            <div class="form-group">
              {{-- <textarea required class="form-control" name="content" id="content" rows="8" placeholder="Break">{{ old('content') }}</textarea> --}}
              <input id="content" value="{{ old('content') }}" type="hidden" name="content">
              <trix-editor placeholder="Break content" input="content"></trix-editor>
              {{-- Error --}}
              @component('admin/snippets/error')
                content
                @slot('feedback')
                {{ $errors->first('content') }}
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

            <button type="submit" class="btn btn-dark">Upload XML</button>
          </form>
      </div>
    </div>
@endsection