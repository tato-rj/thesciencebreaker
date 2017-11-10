@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('snippets.title')
			<i class="fa fa-question-circle-o mr-2" aria-hidden="true"></i>Ask a Question
			@endcomponent
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
					<form method="POST" action="/contact/ask-a-question">
						{{csrf_field()}}
						<div class="form-group">
							<input required type="full_name" class="form-control" id="full_name" name="full_name" aria-describedby="full_nameHelp" placeholder="Full name">
							{{-- Error --}}
							@component('admin/snippets/error')
							full_name
							@slot('feedback')
							{{ $errors->first('full_name') }}
							@endslot
							@endcomponent						
						</div>
						<div class="form-group">
							<input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
							{{-- Error --}}
							@component('admin/snippets/error')
							email
							@slot('feedback')
							{{ $errors->first('email') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<textarea required class="form-control" id="message" name="message" rows="5" placeholder="Your message"></textarea>
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
						<button type="submit" class="btn btn-theme-green">Send</button>
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
