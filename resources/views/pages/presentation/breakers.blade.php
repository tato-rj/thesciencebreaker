@extends('app')

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9 col-md-12">
      @component('components/snippets/title')
      Breakers Community
      @endcomponent

      @foreach ($breakers as $member)
      <div class="mt-3">
        <p class="no-indent mb-2">
          <a class="breaker" href="{{ $member->path() }}"><strong>{{ $member->fullName() }}</strong></a>
          <small class="text-muted ml-1"><em> joined {{ $member->created_at->toFormattedDateString() }}</em></small>
        </p>
        <p class="ml-2">{{ $member->position }} at {{ $member->research_institute }}</p>
        <p class="mt-2 ml-4"><em><u>{!! html_entity_decode($member->general_comments) !!}</u></em></p>
      </div>
      @endforeach
      {{ $breakers->links() }}

    </div>

    {{-- Side Bar: Suggestion --}}
    @include('components/partials/side_bars/suggestions')

  </div>
</div>

@endsection
