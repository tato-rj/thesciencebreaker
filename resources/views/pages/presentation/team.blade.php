@extends('app')

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9 col-md-12">
      @component('components/snippets/title')
      {{__('menu.presentation.team')}}
      @endcomponent

      {{-- Nav tabs --}}
      <ul class="nav nav-tabs mt-4" id="tab-bar" role="tablist">
        <li class="nav-item">
          <a class="nav-link {{ ($paginated) ? : 'active' }}" data-toggle="tab" href="#core" role="tab">{{__('team.categories.core')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#advisors" role="tab">{{__('team.categories.board')}}</a>
        </li>
      </ul>

      {{-- Content panels --}}
      <div class="tab-content">
        <div class="tab-pane {{ ($paginated) ? : 'active' }}" id="core" role="tabpanel">
          <div class="avatars">
            <div>
              <h5>{{__('team.roles.chief')}}</h5>
              @foreach ($founders as $member)
                @include('components/snippets/avatars/manager')
              @endforeach
            </div>
            @if (count($managing_editors))
            <div>
              <h5>{{__('team.roles.managing_editor')}}</h5>
              @foreach ($managing_editors as $member)
                @include('components/snippets/avatars/manager')
              @endforeach
            </div>
            @endif
            <div>
              <h5>{{__('team.roles.scientific_editors')}}</h5>
              @foreach ($editors as $member)
                @include('components/snippets/avatars/manager')
              @endforeach
            </div>
            <div>
              <h5>{{__('team.roles.comm_officer')}}</h5>
              @foreach ($comm_officers as $member)
                @include('components/snippets/avatars/manager')
              @endforeach
            </div>
          </div>
        </div>
        <div class="tab-pane" id="advisors" role="tabpanel">
          @foreach ($advisors as $member)
            <div class="mt-3">
              <p class="no-indent mb-2">
                <a class="breaker" href="{{ $member->paths()->route() }}"><strong>{{ $member->resources()->fullName() }}</strong></a>
              </p>
              <p>{{ $member->position }} at {{ $member->research_institute }}</p>
              <p class="mt-2 ml-4"><em><u>{!! html_entity_decode($member->general_comments) !!}</u></em></p>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Side Bar: Suggestion --}}
    @include('components/partials/side_bars/suggestions')

  </div>
</div>

@endsection
