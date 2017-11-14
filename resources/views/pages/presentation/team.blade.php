@extends('_core')

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9 col-md-12">
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
      </div>
    </div>
    {{-- Side Bar --}}
    @include('partials.side-bar')
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection