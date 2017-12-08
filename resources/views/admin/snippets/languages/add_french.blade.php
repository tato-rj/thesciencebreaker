<div class="modal fade" id="french" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="mr-2" aria-hidden="true"></i>French</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{-- Title in French --}}
            <div class="form-group">
              <input type="text" value="{{ old('title') }}" name="title_fr" class="form-control" id="title_fr" aria-describedby="title_fr" placeholder="Title in French">
              {{-- Error --}}
              @component('admin/snippets/error')
                title_fr
                @slot('feedback')
                {{ $errors->first('title_fr') }}
                @endslot
              @endcomponent
            </div>
            {{-- Description in French --}}
            <div class="form-group">
              <textarea class="form-control" name="description_fr" id="description_fr" rows="3" maxlength="400" placeholder="Description in French (max 500 characters)"">{{ old('description_fr') }}</textarea>
              {{-- Error --}}
              @component('admin/snippets/error')
                description_fr
                @slot('feedback')
                {{ $errors->first('description_fr') }}
                @endslot
              @endcomponent
            </div> 
              {{-- Content in French --}}
            <div class="form-group">
              <textarea class="form-control" name="content_fr" id="content_fr" rows="6" placeholder="Break in French">{{ old('content_fr') }}</textarea>
              {{-- Error --}}
              @component('admin/snippets/error')
                content_fr
                @slot('feedback')
                {{ $errors->first('content_fr') }}
                @endslot
              @endcomponent
            </div>
      </div>
      <div class="modal-footer d-flex text-right">
        <button type="button" data-dismiss="modal" class="btn btn-theme-green">Continue</button>
      </div>
    </div>
  </div>
</div>