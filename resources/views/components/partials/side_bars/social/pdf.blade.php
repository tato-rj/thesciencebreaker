@if(File::exists($article->paths()->pdf()))
	<a href="{{ asset($article->paths()->pdf()) }}" target="_blank">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
	</a>
@endif