@if(File::exists($article->pdf()))
	<a href="{{ asset($article->pdf()) }}" target="_blank">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
	</a>
@endif