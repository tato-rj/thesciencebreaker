@extends('app')

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9 col-md-12">
      @component('components/snippets/title')
      Breakers Community
      @endcomponent
      {{-- Sort results bar --}}
      @component('components/snippets/sort_bar')
        showing <strong>{{ $breakers->firstItem() }}-{{ $breakers->lastItem() }}</strong> of {{ $breakers->total() }}<span class="d-none d-sm-inline"> breakers</span>

        @slot('show')
        <option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
        <option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
        <option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
        <option value="{{ $breakers->total() }}" {{ (Request::input('show') == $breakers->total()) ? 'selected' : '' }}>all</option>
        @endslot
      
        @slot('sort')
        <option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>newest</option>
        <option value="articles_count" {{ (Request::input('sort') == 'articles_count') ? 'selected' : '' }}>number of breaks</option>
        <option value="first_name" {{ (Request::input('sort') == 'first_name') ? 'selected' : '' }}>first name (a to z)</option>
        <option value="last_name" {{ (Request::input('sort') == 'last_name') ? 'selected' : '' }}>last name (a to z)</option>
        @endslot
      @endcomponent
      @foreach ($breakers as $member)
      <div class="mt-3">
        <p class="no-indent mb-2">
          <a class="breaker" href="{{ $member->paths()->route() }}"><strong>{{ $member->resources()->fullName() }}</strong></a>
          <small class="text-muted ml-1"><em> joined in {{ $member->created_at->toFormattedDateString() }}</em></small>
        </p>
        <p class="ml-2 mb-0">{{ $member->position }} at {{ $member->research_institute }}.</p>
        <p class="ml-2 mb-0">
          
            <small><strong class="text-muted"><i class="fa fa-book mr-1" aria-hidden="true"></i> {{ $member->resources()->fullName() }} has {{ $member->articles_count }} published {{ str_plural('break', $member->articles_count) }}</strong></small>
          
          </p>
        <p class="ml-2"><small><a href="{{ $member->paths()->route() }}">Click here</a> for more info</small></p>
        <p class="mt-2 ml-4 mb-4"><em><u>{!! html_entity_decode($member->general_comments) !!}</u></em></p>
      </div>
      @endforeach
      {{ $breakers->links() }}

    </div>

    {{-- Side Bar: Suggestion --}}
    @include('components/partials/side_bars/suggestions')

  </div>
</div>

@endsection
