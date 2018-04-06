<script type="text/javascript" src="{{ asset('js/disqus.js') }}"></script>

<script type="text/javascript">
function onMobile () {
	return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

document.getElementById('shareFacebook').onclick = function() {
	FB.ui({
		method: 'share',
		display: 'popup',
		href: window.location.href,
	}, function(response){});
}
$('#author-bar .author').on('click', function() {
	$url = $(this).attr('data-url');
	if(onMobile()) {
		window.location.href = $url;
	}
});

if (!onMobile()) {
	$('[data-role="popover"]').popover();
}

$('#twitter').on('click', function() {
	popitup($(this).attr('data-link'), 300);
});

$('#google-plus').on('click', function() {
	popitup($(this).attr('data-link'), 500);
});

function popitup(url, height) {
	newwindow=window.open(url ,'Share','height='+height+',width=450');
	if (window.focus) {newwindow.focus()}
		return false;
}
</script>

<script type="text/javascript">
// Add _BLANK to links
$('#break-text a').attr('target', '_blank');
</script>