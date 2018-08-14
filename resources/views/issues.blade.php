<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@foreach($issues as $year => $issue)
<ul style="margin-bottom: 1em">
	<li>Year: {{$year}}</li>
	@foreach($issue as $publication)
		<ul>
		<li>Volume: {{$publication->volume}}</li>
		<li>Issue: {{$publication->issue}}</li>
		<li>Number of Breaks: {{$publication->count}}</li>
	</ul>
	@endforeach
</ul>
@endforeach
</body>
</html>