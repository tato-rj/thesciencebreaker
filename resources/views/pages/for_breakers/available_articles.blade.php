@extends('_core')

@section('content')

<div class="container mt-4">
	<div class="row">
		<div class="col-lg-9 col-md-12">
			@component('snippets.title')
			Available Articles
			@endcomponent
			<p>Here below, a list of articles that were object of a Break-request. Don’t hesitate to <a href="/contact/submit-your-break">get in touch</a> if you wish to draft a Break-manuscript!</p>
			<div id="available_articles" class="mt-5" role="tablist" aria-multiselectable="true">
    		@foreach ($categories as $category)
    		<div class="card mb-1">
    			<a class="collapsed" data-toggle="collapse" data-parent="#available_articles" href="#collapse{{$loop->iteration}}" aria-expanded="false" aria-controls="collapse{{$loop->iteration}}">
    				<div class="card-header d-flex align-items-center justify-content-between" role="tab" id="heading{{$loop->iteration}}">
    					<div class="d-flex align-items-center">
                <img src="{{ $category->iconPath() }}" class="mr-2"><strong>{{$category->name}}</strong>
              </div>
              <div>
                <span class="badge btn-theme-green">{{ count($category->available_articles) }} articles</span>
                
              </div>
    				</div>
    			</a>
    			<div id="collapse{{$loop->iteration}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$loop->iteration}}">
          <div class="card-block">
            <ul>
        			@foreach ($category->available_articles as $article)
          			<li class="mb-3">{!! html_entity_decode($article->article) !!}</li>  
        			@endforeach
            </ul>
          </div>   
				</div>
    		</div>
    		@endforeach
			</div>
          <div class="text-center mt-5">
        <a href="/contact/submit-your-break" class="btn bg-default text-white" id="breaker-btn"><img src="/images/logo-small.svg"><strong>SUBMIT YOUR BREAK</strong></a>
      </div>
		</div>
		{{-- Side Bar --}}
		@include('partials.side-bar')
	</div>
</div>

@endsection
