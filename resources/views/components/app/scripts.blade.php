{{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> --}}
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/stickyMenu.js?10') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/jquery-popover-0.0.3.js') }}"></script>

<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-88447873-1', 'auto');
    ga('send', 'pageview');
</script>

<script type="text/javascript">
$('[data-action="subscription"]').click(function() {
	let $btn = $(this);
	let $modal = $($btn.data('target'));
	let url = $btn.data('url');

	$btn.prop('disabled', true);

	axios.get(url)
		 .then(function(response) {
		 	$modal.find('.modal-body').html(response.data);
		 	$modal.modal('show');
		 })
		 .catch(function(error) {
		 	console.log(error);
		 })
		 .then(function() {
			$btn.prop('disabled', false);
		 });
});
</script>

@yield('scripts')