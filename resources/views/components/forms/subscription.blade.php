<p>Subscribe now to our newsletter and stay up-to-date with our latest breaks!</p>
<form method="POST" action="/admin/subscriptions">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="hidden" name="my_name">
		<input type="hidden" name="time" value="{{\Carbon\Carbon::now()}}">
		<input required type="email" class="form-control" name="subscription" placeholder="{{__('footer.subscribe.input')}}">
		<small id="emailHelp" class="form-text text-muted">{{__('footer.subscribe.note')}}</small>
	</div>
	<input type="submit" value="{{__('footer.subscribe.button')}}" class="btn btn-theme-green btn-block">
</form>