@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row" id="author">
		<div class="col-lg-9 col-md-12">
			<div class="row" id="member-container">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
					@include('snippets/profile/main')
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
