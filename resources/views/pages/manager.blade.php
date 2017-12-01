@extends('app')

@section('content')

<div class="container mt-4">
	<ol class="breadcrumb jumbotron py-3 mb-2">
		<li class="breadcrumb-item"><a href="/the-team">The Team</a></li>
		<li class="breadcrumb-item active">{{ $member->resources()->fullName() }}</li>
	</ol>

	<div class="row" id="member-container">
		<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
			@include('components/snippets/avatars/profile')
		</div>
		<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
			<div class="p-4" id="bio">
				@if (!empty($member->biography))
				<h5><strong>About {{ $member->first_name }}</strong></h5>
				<p>{{ $member->biography }}</p>
				@endif

				@if ($member->resources()->editedArticlesCount() > 0)

				<p>{{ $member->first_name }} is the editor of <strong>{{ $member->resources()->editedArticlesCount() }}</strong> {{ str_plural('Break', $member->resources()->editedArticlesCount()) }}:</p>
				<div class="row no-gutters">
					@foreach ($member->resources()->editedArticles() as $article)
					@include('components/partials/grids/columns')				
					@endforeach
				</div>

				{{ $member->resources()->editedArticles()->links() }}

				@endif
			</div>
		</div>
	</div>
</div>

@endsection
