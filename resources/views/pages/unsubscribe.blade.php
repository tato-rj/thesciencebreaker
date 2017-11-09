@extends('_core')

@section('content')

<div class="container mt-4">
	<h3>We're sorry to see you go!</h3>
	<p>If you are sure you wish to stop receiving our emails, just provide your email below.</p>
	<form method="POST" action="/unsubscribe" class="row my-4">
	    {{ method_field('DELETE') }}
        {{ csrf_field() }}
		<div class=" col-4 mx-auto">
			<div class="form-group">
				<input required type="email" class="form-control" name="email" placeholder="name@example.com">				
			</div>
			<button type="submit" class="btn btn-block btn-danger">Unsubscribe me</button>
		</div>
	</form>
</div>
{{-- Feedback Messages --}}
@if($flash = session('success'))
@include('admin/snippets/alerts/success')
@endif

@if($flash = session('error'))
@include('admin/snippets/alerts/error')
@endif
@endsection
