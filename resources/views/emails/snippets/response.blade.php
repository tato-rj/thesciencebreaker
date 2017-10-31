@foreach ($request as $title => $input)
	@if ($input != '')
		@component('mail::field')
			{{ ucwords(str_replace('_', ' ', $title)) }}
			@slot('input')
			{{ $input }}
			@endslot
		@endcomponent
	@endif
@endforeach