@if(File::exists($article->paths()->pdf()))
	<a href="{{ asset($article->paths()->pdf()) }}" target="_blank">
		<i class="far fa-file-pdf"></i>
	</a>
@endif