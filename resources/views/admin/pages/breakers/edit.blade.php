@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Breakers
        @slot('comment')
          Use the form below to <u>edit</u> the breaker
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Edit Breaker</strong>
          </h2>
          <div class="form-group">
            <label for="exampleSelect2">Select the Breaker to be edited</label>
            <select class="form-control" id="breaker_id" name="breaker_slug">
              <option selected disabled>I want to edit...</option>
              @foreach ($breakers as $breaker)
              <option data-slug="{{ $breaker->slug }}">{{ $breaker->first_name }} {{ $breaker->last_name }}</option>
              @endforeach
            </select>
          </div>
          <form method="POST" action="/admin/breakers/{{ $author->slug }}">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            {{-- First Name --}}
            <div class="form-group">
              <label><strong>First Name</strong></label>
              <input required type="text" value="{{ $author->first_name }}" name="first_name" class="form-control" id="first_name" aria-describedby="first_name" placeholder="First Name">
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
              <input required type="text" value="{{ $author->last_name }}" name="last_name" class="form-control" id="last_name" aria-describedby="last_name" placeholder="Last Name">
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
              <input type="text" value="{{ $author->email }}" name="email" class="form-control" id="email" aria-describedby="email" placeholder="E-mail">
              {{-- Error --}}
              @component('admin/snippets/error')
                email
                @slot('feedback')
                {{ $errors->first('email') }}
                @endslot
              @endcomponent
            </div>
            {{-- Position --}}
            <div class="form-group">
              <label><strong>Position</strong></label>
              <input required type="text" value="{{ $author->position }}" name="position" class="form-control" id="position" aria-describedby="position" placeholder="Position">
              {{-- Error --}}
              @component('admin/snippets/error')
                position
                @slot('feedback')
                {{ $errors->first('position') }}
                @endslot
              @endcomponent
            </div>
            {{-- Research Institute --}}
            <div class="form-group">
              <label><strong>Research Institute</strong></label>
              <input required type="text" value="{{ $author->research_institute }}" name="research_institute" class="form-control" id="research_institute" aria-describedby="research_institute" placeholder="Research Institute">
              {{-- Error --}}
              @component('admin/snippets/error')
                research_institute
                @slot('feedback')
                {{ $errors->first('research_institute') }}
                @endslot
              @endcomponent
            </div>
            {{-- General Comments --}}
            <div class="form-group">
              <label><strong>General Comments</strong></label>
              <textarea class="form-control" name="general_comments" id="general_comments" rows="4" placeholder="General Comments">{{ $author->general_comments }}</textarea>
              {{-- Error --}}
              @component('admin/snippets/error')
                general_comments
                @slot('feedback')
                {{ $errors->first('general_comments') }}
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
$('select#breaker_id').on('change', function() {
  $title = this.value;
  $slug = $(this).children(':selected').attr('data-slug');
  window.location.href =  '/admin/breakers/'+$slug+'/edit';
});
</script>
@endsection