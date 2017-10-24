<div class="mt-3">
  <p class="no-indent mb-2">
  	<strong>{{ $member->fullName() }}</strong> 
  	<small class="text-muted ml-1"><em> joined {{ $member->created_at->diffForHumans() }}</em></small>
  </p>
  <p>{{ $member->position }} at {{ $member->research_institute }}</p>
  <p class="mt-2 ml-4"><em><u>{!! html_entity_decode($member->general_comments) !!}</u></em></p>
</div>