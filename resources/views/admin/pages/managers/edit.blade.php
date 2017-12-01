@extends('admin/app')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Managers
        @slot('comment')
          Use the form below to <u>edit</u> the member
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Edit member</strong>
          </h2>
          <div class="form-group">
            <label for="exampleSelect2">Select the Manager to be edited</label>
            <select class="form-control" id="manager_slug" name="manager_slug">
              <option selected disabled>I want to edit...</option>
              @foreach ($managers as $member)
              <option data-slug="{{ $member->slug }}">{{ $member->first_name }} {{ $member->last_name }}</option>
              @endforeach
            </select>
          </div>

          <form method="POST" action="/admin/managers/{{ $manager->slug }}"  enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                {{-- First Name --}}
                <div class="form-group">
                  <label><strong>First Name</strong></label>
                  <input required type="text" value="{{ $manager->first_name }}" name="first_name" class="form-control" id="first_name" aria-describedby="first_name" placeholder="First Name">
                  {{-- Error --}}
                  @component('admin/snippets/error')
                  first_name
                  @slot('feedback')
                  {{ $errors->first('first_name') }}
                  @endslot
                  @endcomponent
                </div>
                {{-- Last Name --}}
                <div class="form-group">
                  <label><strong>Last Name</strong></label>
                  <input required type="text" value="{{ $manager->last_name }}" name="last_name" class="form-control" id="last_name" aria-describedby="last_name" placeholder="Last Name">
                  {{-- Error --}}
                  @component('admin/snippets/error')
                  last_name
                  @slot('feedback')
                  {{ $errors->first('last_name') }}
                  @endslot
                  @endcomponent
                </div>
                {{-- Email --}}
                <div class="form-group">
                  <label><strong>Email</strong></label>
                  <input required type="text" value="{{ $manager->email }}" name="email" class="form-control" id="email" aria-describedby="email" placeholder="E-mail">
                  {{-- Error --}}
                  @component('admin/snippets/error')
                    email
                    @slot('feedback')
                    {{ $errors->first('email') }}
                    @endslot
                  @endcomponent
                </div>
            {{-- Research Institute --}}
            <div class="form-group">
              <label><strong>Research Institute</strong></label>
              <input type="text" value="{{ $manager->research_institute }}" name="research_institute" class="form-control" id="research_institute" aria-describedby="research_institute" placeholder="Research Institute">
              {{-- Error --}}
              @component('admin/snippets/error')
                research_institute
                @slot('feedback')
                {{ $errors->first('research_institute') }}
                @endslot
              @endcomponent
            </div>
            {{-- Division --}}         
            <label class="form-group" style="margin-bottom: .5rem"><strong>Position</strong></label>
            <div class="form-inline form-group">
              <select class="custom-select mb-2 mr-sm-2" id="division_id" name="division_id">
                <option  selected disabled>Division</option>
                @foreach ($divisions as $division)
                  <option value="{{ $division->id }}" {{ ($manager->division_id == $division->id) ? 'selected' : '' }}>{{ $division->name }}</option>
                @endforeach
              </select>
              {{-- Position --}}
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                <input required type="text" value="{{ $manager->position }}" name="position" class="form-control" id="position" placeholder="Position">
              </div>
              <div class="d-block">
                {{-- Errors --}}
                @component('admin/snippets/error')
                  division_id
                  @slot('feedback')
                  {{ $errors->first('division_id') }}
                  @endslot
                @endcomponent
                @component('admin/snippets/error')
                  position
                  @slot('feedback')
                  {{ $errors->first('position') }}
                  @endslot
                @endcomponent
              </div>
            </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                
                <div class="form-group">
                  <label><strong>Avatar</strong></label>
                  <div id="upload-box" class="card">
                    <input type="file" id="avatar" name="avatar" style="display:none;" />
                    <img class="card-img-top" id="avatar-img" src="{{ asset($manager->paths()->avatar()) }}" alt="Not an image">
                    <div class="card-body text-center">
                      <button type="button" id="upload-button" class="btn bg-default text-white"><i class="fa fa-cloud-upload mr-1" aria-hidden="true"></i>Upload</button>
                    </div>

                  </div>
                  {{-- Error --}}
                  @component('admin/snippets/error')
                  avatar
                  @slot('feedback')
                  {{ $errors->first('avatar') }}
                  @endslot
                  @endcomponent
                </div>

              </div>
            </div>

            {{-- Biography --}}
            <div class="form-group">
              <label><strong>Biography</strong></label>
              <textarea class="form-control" name="biography" id="biography" rows="4" placeholder="Biography">{{ $manager->biography }}</textarea>
              {{-- Error --}}
              @component('admin/snippets/error')
                biography
                @slot('feedback')
                {{ $errors->first('biography') }}
                @endslot
              @endcomponent
            </div>
            {{-- Is Editor --}}
            <div class="form-check">
              <label class="form-check-label mb-2">
                <input type="checkbox" value="1" {{ ($manager->is_editor == '1') ? 'checked' : '' }} name="is_editor" class="form-check-input" id="is_editor">
                Is this member also an editor?
              </label>
              {{-- Error --}}
              @component('admin/snippets/error')
                is_editor
                @slot('feedback')
                {{ $errors->first('is_editor') }}
                @endslot
              @endcomponent
            </div>
            <input type="submit" value="Submit" class="btn btn-theme-orange">
          </form>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('select#manager_slug').on('change', function() {
  $title = this.value;
  $slug = $(this).children(':selected').attr('data-slug');
  window.location.href =  '/admin/managers/'+$slug+'/edit';
});

$('#upload-button').on('click', function() {
  $('input#avatar').click();
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#avatar-img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("input#avatar").change(function() {
  readURL(this);
});
</script>
@endsection