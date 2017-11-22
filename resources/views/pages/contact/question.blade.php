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
