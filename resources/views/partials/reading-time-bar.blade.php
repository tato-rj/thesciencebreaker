{{-- Reading time and date --}}
<div class="d-flex justify-content-between align-items-center reading-time">
	<div>
		<i class="fa fa-eye" aria-hidden="true"></i>
		<small>Views {{ $article->views }}</small>
	</div>
	<div class="flex-grow ml-2">
		<i class="fa fa-clock-o" aria-hidden="true"></i>
		<small>Reading time {{ $article->reading_time }} min</small>
	</div>
	<div>
		<small>published on {{ $article->created_at->toFormattedDateString() }}</small>
	</div>
</div>