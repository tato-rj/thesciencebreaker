<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
	<div class="d-flex flex-column justify-content-center" id="side-social">
		<a href="mailto:{{ config('app.email') }}">
			<i class="fa fa-envelope-open" aria-hidden="true"></i>
		</a>
		<a href="{{ config('app.facebook') }}">
			<i class="fa fa-facebook" aria-hidden="true"></i>
		</a>
		<a href="{{ config('app.twitter') }}">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
		<a href="{{ config('app.googleplus') }}">
			<i class="fa fa-google" aria-hidden="true"></i>
		</a>
		<a href="{{ $article->pdf() }}">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		</a>
	</div>
</div>
