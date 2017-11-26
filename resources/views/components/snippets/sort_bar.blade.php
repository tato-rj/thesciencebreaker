<small class="d-flex justify-content-between align-items-end mt-4">
	<div>
		{{$slot}}
	</div>
	<div class="form-inline">
		<label class="mb-0 mr-2 d-none d-sm-inline">show</label>
		<form>
			<input type="hidden" name="sort" value="{{ Request::input('sort') }}">
			<select class="mr-2" name="show" onchange="this.form.submit()" id="show">
			{{$show}}
			</select>
		</form>
		<label class="mb-0 mr-2 d-none d-sm-inline">sort by</label>
		<form>
			<input type="hidden" name="show" value="{{ Request::input('show') }}">
			<select name="sort" onchange="this.form.submit()" id="sort">
			{{$sort}}
			</select>
		</form>
	</div>
</small>
<hr class="mb-4 mt-2">