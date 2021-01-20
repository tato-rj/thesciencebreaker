@extends('app')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('components/snippets/title')
			{{__('menu.contact.inquiry')}}
			@endcomponent
			<div class="row">
				<div class="col-10 mx-auto">
					<p class="text-center">{{__('contact.inquiry.description')}}</p>
				</div>
				<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-2">
					<form id="recaptcha-form" method="POST" action="/contact/break-inquiry">
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
							<input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
							<small class="text-muted"><em>{{__('contact.inquiry.notify')}}</em></small>
							{{-- Error --}}
							@component('admin/snippets/error')
							email
							@slot('feedback')
							{{ $errors->first('email') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<p>{{__('contact.form.where_did_you_hear.title')}}</p>	
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" required type="radio" name="news_from" id="internet" value="On the internet">
							    {{__('contact.form.where_did_you_hear.internet')}}
							  </label>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" required type="radio" name="news_from" id="newspaper" value="In a newspaper/magazine">
							    {{__('contact.form.where_did_you_hear.journal')}}
							  </label>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" required type="radio" name="news_from" id="tv" value="TV / Radio / Other">
							    {{__('contact.form.where_did_you_hear.tv')}}
							  </label>
							</div>
						</div>
						
						<div id="options">
							<div>
								<div class="form-group">
									<input class="form-control internet" type="text" name="article_title" placeholder="{{__('contact.form.where_did_you_hear.article_title')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									article_title
									@slot('feedback')
									{{ $errors->first('article_title') }}
									@endslot
									@endcomponent	
								</div>
								<div class="form-group">
									<input class="form-control internet" type="text" name="author_name" placeholder="{{__('contact.form.where_did_you_hear.author_name')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									author_name
									@slot('feedback')
									{{ $errors->first('author_name') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control internet" type="text" name="article_url" placeholder="{{__('contact.form.where_did_you_hear.url')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									article_url
									@slot('feedback')
									{{ $errors->first('article_url') }}
									@endslot
									@endcomponent
								</div>
							</div>
							<div class="newspaper">
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="news_title" placeholder="{{__('contact.form.where_did_you_hear.article_title')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									article_title
									@slot('feedback')
									{{ $errors->first('article_title') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="writer_name" placeholder="{{__('contact.form.where_did_you_hear.author_name')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									author_name
									@slot('feedback')
									{{ $errors->first('author_name') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="newspaper_title" placeholder="{{__('contact.form.where_did_you_hear.mag_title')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									newspaper_title
									@slot('feedback')
									{{ $errors->first('newspaper_title') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="newspaper_number" placeholder="{{__('contact.form.where_did_you_hear.mag_number')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									newspaper_number
									@slot('feedback')
									{{ $errors->first('newspaper_number') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="publication_date" placeholder="{{__('contact.form.where_did_you_hear.date')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									publication_date
									@slot('feedback')
									{{ $errors->first('publication_date') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="on_page" placeholder="{{__('contact.form.where_did_you_hear.page')}}">
									{{-- Error --}}
									@component('admin/snippets/error')
									publication_date
									@slot('feedback')
									{{ $errors->first('publication_date') }}
									@endslot
									@endcomponent
								</div>
							</div>
							<div class="tv">
								<div class="form-group">
									<textarea class="form-control tv" name="description" placeholder="{{__('contact.form.where_did_you_hear.describe')}}" rows="3"></textarea>
									{{-- Error --}}
									@component('admin/snippets/error')
									description
									@slot('feedback')
									{{ $errors->first('description') }}
									@endslot
									@endcomponent
								</div>
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="message" placeholder="{{__('contact.form.where_did_you_hear.message')}}" rows="4"></textarea>
						</div>
						<label class="custom-control d-block custom-checkbox mb-4">
							<input type="checkbox" checked="true" name="subscribe_me" class="custom-control-input">
							<span class="custom-control-input"></span>
							<span class="custom-control-label">{{__('contact.form.newsletter')}}</span>
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
