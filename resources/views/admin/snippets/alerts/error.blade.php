@component('admin/snippets/alerts/alert')
	@slot('type')
		alert-danger
	@endslot
	@slot('message')
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Ops, something went wrong...</strong>
		<ul class="m-0 p-1 pl-3">
			@foreach ($errors->all() as $error)
				<li><small>{{ $error }}</small></li>
			@endforeach
		</ul>
	@endslot
@endcomponent