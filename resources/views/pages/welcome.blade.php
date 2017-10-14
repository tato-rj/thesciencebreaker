@extends('_core')

@section('content')

<div class="container">
	{{-- INTRO --}}
	<div class="row mt-5">
		<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
			<div class="box">
				<h4><strong>Why TheScienceBreaker?</strong></h4>
				<p>TheScienceBreaker promotes the dialogue and the dissemination of a scientific culture so that society-relevant opinions can be discussed and decisions may be taken accordingly. Discover our mission.</p>
			</div>
			<div class="box">
				<h4><strong>What is a Break?</strong></h4>
				<p>We publish short lay summaries, called Breaks, where scientific papers are explained by scientists, called Breakers, directly involved in the field of research.</p>
			</div>
		</div>
		<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
			<div class="d-flex align-items-baseline justify-content-between">
				<h4>Latest published Breaks</h4>
				<span class="text-muted"><small>Today, {{ Carbon\Carbon::now()->toFormattedDateString() }}</small></span>
			</div>
			<div class="box">
				<table id="latest-breaks" class="mt-2">
					@foreach ($latest_articles as $break)
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
									{{ $author->fullName() }}
									@endforeach
								</strong></small></p>
								<p><small>Published {{ $break->created_at->diffForHumans() }} in <a href="{{ $break->category->path() }}">{{ $break->category->name }}</a></small></p>
							</td>
						</tr>					
					@endforeach
				</table>
			</div>
		</div>
	</div>

	{{-- BY SUBJECT --}}
	<div class="row mt-5">
		<div class="col-12">
			<h4><strong>Breaks by subject</strong></h4>
		</div>
		<div class="d-flex flex-row justify-content-center align-items-center flex-wrap" id="subject-icons">
			@foreach ($categories as $category)
				<a href="{{ $category->path() }}">
				<div class="icon-wrapper">
					<img src="{{ $category->iconPath() }}">
					<div class="d-flex align-items-center justify-content-center flex-column text-center">
						<h5><strong>{{ $category->name }}</strong></h5>
						<h5><strong>{{ $category->articles_count }} Breaks</strong></h5>
					</div>
				</div>
				</a>
			@endforeach
		</div>
	</div>

	{{-- APP --}}
	<div class="row mt-5">
		<div class="d-flex col-12 justify-content-center align-items-center" id="app-container">
			<div>
				<img src="/images/ios-app/iphone.svg">
			</div>
			<div class="text-center">
				<h4>Check out our new</h4>
				<h3 class="text-orange"><strong>Mobile App!</strong></h3>
				<img src="/images/ios-app/apple-store.svg" class="mt-2" id="apple-store-icon">
			</div>	
		</div>
	</div>

	{{-- DISCUSSION --}}
	<div class="row hidden-sm-down mt-5" id="discussion-container">
		<div class="col-7">
			<h4><strong>Join the discussion!</strong></h4>
			<p>TheScienceBreaker is an open-access environment where everyone, scientists and laypeople, can meet and discuss about the latest scientific discoveries. For each and every Break, you may join the discussion-space below each published Break and help us build a better future with more dialogues and less walls!</p>
		</div>
		<div class="col-4 offset-1">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
		</div>
	</div>

@endsection