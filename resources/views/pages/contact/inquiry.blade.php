@extends('_core')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			@component('snippets.title')
			Break Inquiry
			@endcomponent
			<div class="row">
				<div class="col-10 mx-auto">
					<p class="text-center">If a scientific news attracted your attention and you wish to know more about it, directly from the scientists involved - let us know: we'll Break about it!</p>
				</div>
				<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-2">

					<form method="POST" action="/contact/break-inquiry">
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
							<small class="text-muted"><em>We will notify you when the Break will be published</em></small>
							{{-- Error --}}
							@component('admin/snippets/error')
							email
							@slot('feedback')
							{{ $errors->first('email') }}
							@endslot
							@endcomponent		
						</div>
						<div class="form-group">
							<p>Where did you hear about this scientific news?</p>	
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" required type="radio" name="news_from" id="internet" value="On the internet">
							    On the internet
							  </label>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" required type="radio" name="news_from" id="newspaper" value="In a newspaper/magazine">
							    In a newspaper/magazine
							  </label>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" required type="radio" name="news_from" id="tv" value="TV / Radio / Other">
							    TV / Radio / Other
							  </label>
							</div>
						</div>
						
						<div id="options">
							<div>
								<div class="form-group">
									<input class="form-control internet" type="text" name="article_title" placeholder="Article title">
									{{-- Error --}}
									@component('admin/snippets/error')
									article_title
									@slot('feedback')
									{{ $errors->first('article_title') }}
									@endslot
									@endcomponent	
								</div>
								<div class="form-group">
									<input class="form-control internet" type="text" name="author_name" placeholder="Author name">
									{{-- Error --}}
									@component('admin/snippets/error')
									author_name
									@slot('feedback')
									{{ $errors->first('author_name') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control internet" type="text" name="article_url" placeholder="Article URL">
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
									<input class="form-control newspaper" type="text" name="news_title" placeholder="Article title">
									{{-- Error --}}
									@component('admin/snippets/error')
									article_title
									@slot('feedback')
									{{ $errors->first('article_title') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="writer_name" placeholder="Author name">
									{{-- Error --}}
									@component('admin/snippets/error')
									author_name
									@slot('feedback')
									{{ $errors->first('author_name') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="newspaper_title" placeholder="Newspaper/Magazine title">
									{{-- Error --}}
									@component('admin/snippets/error')
									newspaper_title
									@slot('feedback')
									{{ $errors->first('newspaper_title') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="newspaper_number" placeholder="Newspaper/Magazine number">
									{{-- Error --}}
									@component('admin/snippets/error')
									newspaper_number
									@slot('feedback')
									{{ $errors->first('newspaper_number') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="publication_date" placeholder="Publication date">
									{{-- Error --}}
									@component('admin/snippets/error')
									publication_date
									@slot('feedback')
									{{ $errors->first('publication_date') }}
									@endslot
									@endcomponent
								</div>
								<div class="form-group">
									<input class="form-control newspaper" type="text" name="on_page" placeholder="The article is on page">
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
									<textarea class="form-control tv" name="description" placeholder="Describe the news/subject" rows="3"></textarea>
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
							<textarea class="form-control" name="message" placeholder="Message (optional)" rows="4"></textarea>
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

@section('script')
<script type="text/javascript">
$('input[type="radio"]').on('change', function() {
	$section = $(this).attr('id');
	$('#options').find('input, textarea').hide();
	$('.'+$section).fadeIn();
});
</script>
@endsection