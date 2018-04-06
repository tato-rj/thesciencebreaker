@extends('app')

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9 col-md-12">
      @component('components/snippets/title')
      {{__('menu.presentation.breakers')}}
      @endcomponent
      {{-- Sort results bar --}}
      @component('components/snippets/sort_bar')
        {{__('global.sort_bar.showing')}} <strong>{{ $breakers->firstItem() }}-{{ $breakers->lastItem() }}</strong> {{__('global.sort_bar.of')}} {{ $breakers->total() }}<span class="d-none d-sm-inline"> breakers</span>

        @slot('show')
        <option value="5" {{ (Request::input('show') == '5') ? 'selected' : '' }}>5</option>
        <option value="10" {{ (Request::input('show') == '10') ? 'selected' : '' }}>10</option>
        <option value="15" {{ (Request::input('show') == '15') ? 'selected' : '' }}>15</option>
        <option value="{{ $breakers->total() }}" {{ (Request::input('show') == $breakers->total()) ? 'selected' : '' }}>{{__('global.sort_bar.all')}}</option>
        @endslot
      
        @slot('sort')
        <option value="created_at" {{ (Request::input('sort') == 'created_at') ? 'selected' : '' }}>{{__('global.sort_bar.date')}}</option>
        <option value="articles_count" {{ (Request::input('sort') == 'articles_count') ? 'selected' : '' }}>{{__('global.sort_bar.breaks_num')}}</option>
        <option value="first_name" {{ (Request::input('sort') == 'first_name') ? 'selected' : '' }}>{{__('global.sort_bar.first_name')}}</option>
        <option value="last_name" {{ (Request::input('sort') == 'last_name') ? 'selected' : '' }}>{{__('global.sort_bar.last_name')}}</option>
        @endslot
      @endcomponent

      @include('components/snippets/search')
      
      @foreach ($breakers as $member)
      <div class="mt-3">
        <p class="no-indent mb-2">
          <a class="breaker" href="{{ $member->paths()->route() }}"><strong>{{ $member->resources()->fullName() }}</strong></a>
          <small class="text-muted ml-1"><em> joined in {{ $member->created_at->toFormattedDateString() }}</em></small>
        </p>
        <p class="ml-2 mb-0">{{ $member->position }} at {{ $member->research_institute }}.</p>
        <p class="ml-2 mb-0">
            <small><strong class="text-muted"><i class="fa fa-book mr-1" aria-hidden="true"></i> {{ $member->resources()->fullName() }} has {{ $member->articles_count }} {{ str_plural('break', $member->articles_count) }} published</strong></small>
          </p>
        <p class="ml-2"><small><a href="{{ $member->paths()->route() }}">{{__('global.click_to_read_more')}}</a></small></p>
        <p class="mt-2 ml-4 mb-4"><em><u>{!! html_entity_decode($member->general_comments) !!}</u></em></p>
      </div>
      @endforeach
      {{ $breakers->appends(Request::except('page'))->links() }}

    </div>

    {{-- Side Bar: Suggestion --}}
    @include('components/partials/side_bars/suggestions')

  </div>
</div>

@endsection

@section('scripts')

@include('javascript/search')

<script type="text/javascript">

var search = new AwesomeSearch({
    container: '#search-group',
    call: '/search/breakers',
    fields: ['first_name', 'last_name'],
    redirect: 'url',
    limit: 10
  });

search.init();

</script>

@endsection