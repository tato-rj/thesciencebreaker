@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('snippets.title')
			<i class="fa fa-upload mr-2" aria-hidden="true"></i>Submit your Break
			@endcomponent
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
					<form method="POST" action="/contact/submit-a-break" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<input required type="text" value="{{ old('first_name') }}" class="form-control" name="first_name" placeholder="First name">
							{{-- Error --}}
							@component('admin/snippets/error')
							first_name
							@slot('feedback')
							{{ $errors->first('first_name') }}
							@endslot
							@endcomponent						
						</div>
						<div class="form-group">
							<input required type="text" value="{{ old('last_name') }}" class="form-control" name="last_name" placeholder="Last name">
							{{-- Error --}}
							@component('admin/snippets/error')
							last_name
							@slot('feedback')
							{{ $errors->first('last_name') }}
							@endslot
							@endcomponent						
						</div>
						<div class="form-group">
							<input required type="email" class="form-control" value="{{ old('institution_email') }}" name="institution_email" placeholder="Institution E-mail">
							<small class="text-muted"><em>Please use the official email provided by your research institute</em></small>
							{{-- Error --}}
							@component('admin/snippets/error')
							institution_email
							@slot('feedback')
							{{ $errors->first('institution_email') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<input required type="text" class="form-control" name="research_institute" value="{{ old('research_institute') }}" placeholder="Research institute, Department, Unit...">
							{{-- Error --}}
							@component('admin/snippets/error')
							research_institute
							@slot('feedback')
							{{ $errors->first('research_institute') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<input required type="text" class="form-control" name="original_article" value="{{ old('original_article') }}" placeholder="Original article title & reference">
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
								<option selected disabled>I am a...</option>
								<option value="PhD student" {{ (old('position') == 'PhD student') ? 'selected' : '' }}>PhD student</option>
								<option value="Postdoctoral Research fellow" {{ (old('position') == 'Postdoctoral Research fellow') ? 'selected' : '' }}>Postdoctoral Research fellow</option>
								<option value="Research assistant" {{ (old('position') == 'Research assistant') ? 'selected' : '' }}>Research assistant</option>
								<option value="Lecturer" {{ (old('position') == "Lecturer") ? 'selected' : '' }}>Lecturer</option>
								<option value="Professor" {{ (old('position') == "Professor") ? 'selected' : '' }}>Professor</option>
								<option id="other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" style="display: none" name="other" value="" placeholder="Your position here">	
						</div>					
						<div class="form-group d-flex flex-column align-items-center" id="upload_container">
							<p class="p-2"><strong>Break manuscript upload</strong></p>
							<p>Please make sure that you read and respected the <a href="#">guidelines for authors</a>! If not, your Break will not be eligible for publication.</p>
							<p><small>Upload only <strong>.doc, .docx, .odt, .txt or .pdf</strong> files. Files exceeding 3 MB will not be uploaded.</small></p>
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
							<textarea required type="text" class="form-control" name="description" rows="4" maxlength="400" placeholder="Short description (max 400 characters)">{{ old('description') }}</textarea>
							{{-- Error --}}
							@component('admin/snippets/error')
							description
							@slot('feedback')
							{{ $errors->first('description') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" value="{{ old('message') }}" rows="5" placeholder="Add your message here and please include full information for additional Breakers, if any. Thank you!"></textarea>
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
							<span class="custom-control-description">Join the newsletter</span>
						</label>
						<input type="submit" value="Send" class="btn btn-theme-green">
					</form>				
				</div>
			</div>
		@include('snippets.headquarters')
	
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>
{{-- Feedback Messages --}}
@if($flash = session('contact'))
@include('admin/snippets/alerts/success')
@endif
@endsection

@section('script')
<script type="text/javascript">

$('select[name="position"]').on('change', function() {
	$option = $(this).children(':selected').attr('id');
	$input = $('input[name="other"]');
	if ($option == 'other') {
		$input.fadeIn();
	} else {
		$input.val('');
		$input.hide();
	}
});
</script>
@endsection