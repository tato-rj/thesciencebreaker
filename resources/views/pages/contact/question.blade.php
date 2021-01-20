@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('components/snippets/title')
			{{__('menu.contact.question')}}
			@endcomponent
			<div class="row">
				<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
					<form id="recaptcha-form" method="POST" action="/contact/ask-a-question">
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
							<input required type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
							{{-- Error --}}
							@component('admin/snippets/error')
							email
							@slot('feedback')
							{{ $errors->first('email') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<textarea required class="form-control" id="message" name="message" rows="5" placeholder="{{__('contact.form.your_message')}}">
								{{ old('message') }}
							</textarea>
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
							<span class="custom-control-input"></span>
							<span class="custom-control-label">{{__('contact.form.newsletter')}}</span>
						</label>
						<input type="submit" value="{{__('contact.form.send')}}" class="btn btn-theme-green">

						@include('auth.components.recaptcha')

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
