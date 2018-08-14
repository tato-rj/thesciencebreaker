@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('components/snippets/title')
			{{__('menu.contact.submit')}}
			@endcomponent
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
					<form method="POST" action="/contact/submit-a-break" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="my_name">
						<input type="hidden" name="time" value="{{\Carbon\Carbon::now()}}">
						<div class="form-group">
							<input required type="text" value="{{ old('first_name') }}" class="form-control" name="first_name" placeholder="{{__('contact.form.first_name')}}">
							{{-- Error --}}
							@component('admin/snippets/error')
							first_name
							@slot('feedback')
							{{ $errors->first('first_name') }}
							@endslot
							@endcomponent						
						</div>
						<div class="form-group">
							<input required type="text" value="{{ old('last_name') }}" class="form-control" name="last_name" placeholder="{{__('contact.form.last_name')}}">
							{{-- Error --}}
							@component('admin/snippets/error')
							last_name
							@slot('feedback')
							{{ $errors->first('last_name') }}
							@endslot
							@endcomponent						
						</div>
						<div class="form-group">
							<input required type="email" class="form-control" value="{{ old('institution_email') }}" name="institution_email" placeholder="{{__('contact.form.institution_email.label')}}">
							<small class="text-muted"><em>{{__('contact.form.institution_email.note')}}</em></small>
							{{-- Error --}}
							@component('admin/snippets/error')
							institution_email
							@slot('feedback')
							{{ $errors->first('institution_email') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<input required type="text" class="form-control" name="research_institute" value="{{ old('research_institute') }}" placeholder="{{__('contact.form.institute')}}">
							{{-- Error --}}
							@component('admin/snippets/error')
							research_institute
							@slot('feedback')
							{{ $errors->first('research_institute') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<input required type="text" class="form-control" name="original_article" value="{{ old('original_article') }}" placeholder="{{__('contact.form.original_article')}}">
							{{-- Error --}}
							@component('admin/snippets/error')
							original_article
							@slot('feedback')
							{{ $errors->first('original_article') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<select class="form-control" name="position">
								<option selected disabled>{{__('contact.form.i_am_a.label')}}...</option>
								<option value="PhD student" {{ (old('position') == 'PhD student') ? 'selected' : '' }}>{{__('contact.form.i_am_a.student')}}</option>
								<option value="Postdoctoral Research fellow" {{ (old('position') == 'Postdoctoral Research fellow') ? 'selected' : '' }}>{{__('contact.form.i_am_a.post_doc')}}</option>
								<option value="Research assistant" {{ (old('position') == 'Research assistant') ? 'selected' : '' }}>{{__('contact.form.i_am_a.assistant')}}</option>
								<option value="Lecturer" {{ (old('position') == "Lecturer") ? 'selected' : '' }}>{{__('contact.form.i_am_a.lecturer')}}</option>
								<option value="Professor" {{ (old('position') == "Professor") ? 'selected' : '' }}>{{__('contact.form.i_am_a.professor')}}</option>
								<option id="other">{{__('contact.form.i_am_a.other')}}</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" style="display: none" name="other" value="" placeholder="{{__('contact.form.i_am_a.your_position')}}">	
						</div>					
						<div class="form-group d-flex flex-column align-items-center" id="upload_container">
							<p class="p-2"><strong>{{__('contact.form.upload.title')}}</strong></p>
							<p>{{__('contact.form.upload.note.p1')}} <a href="#">{{__('contact.form.upload.note.link')}}</a>{{__('contact.form.upload.note.p2')}}</p>
							<p><small>{!!__('contact.form.upload.file_types')!!}</small></p>
							<input type="file" class="form-control-file" id="file" name="file">
							{{-- Error --}}
							@component('admin/snippets/error')
							file
							@slot('feedback')
							{{ $errors->first('file') }}
							@endslot
							@endcomponent
						</div>
						<div class="form-group">
							<textarea required type="text" class="form-control" name="description" rows="4" maxlength="400" placeholder="{{__('contact.form.description')}}">{{ old('description') }}</textarea>
							{{-- Error --}}
							@component('admin/snippets/error')
							description
							@slot('feedback')
							{{ $errors->first('description') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" value="{{ old('message') }}" rows="5" placeholder="{{__('contact.form.add_message')}}"></textarea>
							{{-- Error --}}
							@component('admin/snippets/error')
							message
							@slot('feedback')
							{{ $errors->first('message') }}
							@endslot
							@endcomponent		
						</div>
						<label class="custom-control d-block custom-checkbox mb-4">
							<input type="checkbox" checked="true" name="subscribe_me" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">{{__('contact.form.newsletter')}}</span>
						</label>
						<input type="submit" value="{{__('contact.form.send')}}" class="btn btn-theme-green">
					</form>				
				</div>
			</div>

			{{-- Headquarters map --}}
			@include('components/snippets/map')
	
		</div>
		
		{{-- Side Bar: Suggestion --}}
		@include('components/partials/side_bars/suggestions')

	</div>
</div>

@endsection

@section('scripts')
	@include('javascript/submit')
@endsection