@extends('_core')

@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
      @component('snippets.title')
      The Team
      @endcomponent

      <!-- Nav tabs -->
      <ul class="nav nav-tabs mt-4" id="tab-bar" role="tablist">
        <li class="nav-item">
          <a class="nav-link {{ ($paginated) ? : 'active' }}" data-toggle="tab" href="#core" role="tab">Core Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#advisors" role="tab">Advisory Board</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($paginated) ? 'active' : ''}}" data-toggle="tab" href="#breakers" role="tab">Breakers Community</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane {{ ($paginated) ? : 'active' }}" id="core" role="tabpanel">
          <div class="avatars">
            <div>
              <h5>Editor in Chief</h5>
              @foreach ($founders as $member)
                @include('snippets.avatar')
              @endforeach
            </div>
            <div>
              <h5>Scientific Editors</h5>
              @foreach ($editors as $member)
                @include('snippets.avatar')
              @endforeach
            </div>
            <div>
              <h5>Comm Officer</h5>
              @foreach ($comm_officers as $member)
                @include('snippets.avatar')
              @endforeach
            </div>
          </div>
        </div>
        <div class="tab-pane" id="advisors" role="tabpanel">
          @foreach ($advisors as $member)
            @include('snippets.breakers')
          @endforeach
        </div>
        <div class="tab-pane {{ ($paginated) ? 'active' : ''}}" id="breakers" role="tabpanel">
          @foreach ($breakers as $member)
            @include('snippets.breakers')
          @endforeach
          {{ $breakers->links() }}
        </div>
      </div>
    </div>
    {{-- Side Bar --}}
    @include('partials.side-bar')
  </div>
</div>

@endsection

@section('script')
<script>

$('#tab-bar a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('.avatar').on('click', function(event) {
  event.stopPropagation();
  resetAvatars();
  $(this).toggleClass('border-color-green').children('.about').toggle();
});

$(window).click(function() {
  resetAvatars();
});

function resetAvatars ($elements) {
  $('.avatars .avatar').removeClass('border-color-green').children('.about').hide();
}

</script>
@endsection