@component('admin/snippets/alerts/alert')
	@slot('type')
		alert-success
	@endslot
	@slot('message')
		<strong>Great!</i></strong> {{ $flash }}
	@endslot
@endcomponent