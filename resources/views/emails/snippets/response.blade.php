@foreach ($request as $title => $input)
@if ($input != '')
<div style="padding-bottom: 4px; margin-bottom: 4px; border-bottom: 1px solid grey">
<p><strong>{{ ucwords(str_replace('_', ' ', $title)) }}</strong></p>
<p>
{{ $input }}
<p>
</div>
@endif
@endforeach