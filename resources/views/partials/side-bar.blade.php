<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
	<div id="side-bar">
{{-- 		<div>
=======
		<div>
>>>>>>> e38ecdd6e378e9b978286ed98cfb584734ffc31b
			<strong><p class="mb-1"><i class="fa fa-envelope-open mr-2" aria-hidden="true"></i>Subscribe now!</p></strong>
			<form method="POST" action="/admin/subscriptions">
				{{csrf_field()}}
				<div class="form-group">
					<input required type="email" class="form-control" name="subscription" id="email" aria-describedby="emailHelp" placeholder="Enter email">
				</div>
				<button type="submit" class="btn btn-sm btn-block btn-theme-green">Submit</button>
			</form>
			
            @component('admin/snippets/error')
              subscription
              @slot('feedback')
              {{ $errors->first('subscription') }}
              @endslot
            @endcomponent
<<<<<<< HEAD
		</div> --}}
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
		</div>
	</div>
</div>