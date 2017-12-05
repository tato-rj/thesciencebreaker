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
      <div id="search-group">
        <input type="text" name="search" autocomplete="off" class="simple-box p-1 pl-2" placeholder="Type here to search...">
        <div id="search-results">
          <div class="d-none">
            <a href="" class="breaker no-a-underline">
              <div></div>
            </a>
          </div>
        </div>
      </div>
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
        <p class="ml-2"><small><a href="{{ $member->paths()->route() }}">Click here</a> for more info</small></p>
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
<script type="text/javascript">
$(document).click(function(event) {
    $('#search-group > div').fadeOut('fast');
    $('#search-results > div').not('.d-none').remove();
    $container.find('> p').remove();
});

$('#search-group input[name="search"]').on('keyup', function() {
  $search_container = $('#search-group > div');
  $input = $(this).val();
    $.post('/search/breakers',
    {
      name: $input
    },
    function(data, status){
        $container = $('#search-results');
        $container.find('> div').not('.d-none').remove();
        $container.find('> p').remove();
        $.each(data, function(index, author) {
          $result_box = $container.find('.d-none').clone().removeClass('d-none');
          $breaker = $result_box.find('.breaker');
          $breaker.find('> div').text(author['first_name']+' '+author['last_name']);
          $breaker.attr('href', author['url']);
          $container.append($result_box);
        });
        if (data.length == 10) {
          $container.append('<p><small>Too many results! Narrow your search a bit more...</small></p>');
        }
        $container.fadeIn('fast');
    });
  
});
</script>
@endsection