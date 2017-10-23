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
          <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Core Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Advisory Board</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Breakers Community</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel">
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
        <div class="tab-pane" id="profile" role="tabpanel">SECOND</div>
        <div class="tab-pane" id="messages" role="tabpanel">THIRD</div>
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
})

</script>
@endsection