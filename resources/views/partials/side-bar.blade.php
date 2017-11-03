<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
	<div id="side-bar">
		<div>
			<strong><p class="mb-3">Editor's picks</p></strong>
			@foreach ($editor_picks as $pick)
				<div class="d-flex align-items-center mb-3">
					<img src="{{ $pick->category->iconPath() }}" class="mr-3">
					<div>
						<small class="d-block mb-1">
							<span><a href="{{ $pick->path() }}">{{ $pick->title }}</a></span>
						</small>
						<small class="d-block">
							<em class="text-muted">by 
								@foreach ($pick->authors as $author)
									{{ $loop->first ? '' : ', ' }}
									{{ $author->fullName() }}
								@endforeach
							</em>
						</small>
					</div>
				</div>
			@endforeach
		</div>
		<div>
			<strong><p class="mb-3">Most popular</p></strong>
			@foreach ($popular as $article)
				<div class="d-flex align-items-center mb-3">
					<img src="{{ $article->category->iconPath() }}" class="mr-3">
					<div>
						<small class="d-block mb-1">
							<span><a href="{{ $article->path() }}">{{ $article->title }}</a></span>
						</small>
						<small class="d-block">
							<em class="text-muted">by 
								@foreach ($article->authors as $author)
									{{ $loop->first ? '' : ', ' }}
									{{ $author->fullName() }}
								@endforeach
							</em>
						</small>
					</div>
				</div>
			@endforeach
{{-- 			<a class="btn btn-link btn-sm btn-block p-0 text-muted" href="">show more ></a> --}}
		</div>
	</div>
</div>