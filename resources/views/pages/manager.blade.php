@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row" id="author">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="row" id="member-container">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div id="profile" class="text-center">
						<img src="{{ asset("images/avatars/$member->slug.png") }}" class="p-4 img-fluid">
						<h5 class="mb-0">{{ $member->fullName() }}</h5>
						<p class="mb-2"><small>{{ $member->position }}</small></p>
						<div class="d-flex align-items-center justify-content-center">
							<h5>
							<a class="no-a-underline" href="{{ config('app.facebook') }}" target="_blank">
								<i class="fa fa-facebook m-1" aria-hidden="true"></i>
							</a>
							<a class="no-a-underline" href="{{ config('app.twitter') }}" target="_blank">
								<i class="fa fa-twitter m-1" aria-hidden="true"></i>
							</a>
							<a class="no-a-underline" href="mailto:{{ $member->email }}" target="_blank">
								<i class="fa fa-envelope m-1" aria-hidden="true"></i>
							</a>
						</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
					<div class="p-4" id="bio">
						@if (!empty($member->biography))
							<h5><strong>About {{ $member->first_name }}</strong></h5>
							<p>{{ $member->biography }}</p>
						@endif

						@if ($member->editedArticlesCount() > 0)

						<p>{{ $member->first_name }} is the editor of <strong>{{ $member->editedArticlesCount() }}</strong> {{ str_plural('Break', $member->editedArticlesCount()) }}:</p>
						<table id="latest-breaks">
							@foreach ($member->editedArticles() as $break)
							<tr>
								<th>
									<img src="{{ $break->category->iconPath() }}">
								</th>
								<td>
									<p>
										<a href="{{ $break->path() }}">{{ $break->title }}</a>
									</p>
									<p><small><strong>Written by: 
										@foreach ($break->authors as $author)
										{{ $loop->first ? '' : ', ' }}
										<a href="{{ $author->path() }}" class="breaker">{{ $author->fullName() }}</a>
										@endforeach
									</strong></small></p>
									<p><small>Published {{ $break->created_at->diffForHumans() }} in <a href="{{ $break->category->path() }}">{{ $break->category->name }}</a></small></p>
								</td>
							</tr>					
							@endforeach

						</table>
						{{ $member->editedArticles()->links() }}

						@endif
					</div>
				</div>
			</div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
