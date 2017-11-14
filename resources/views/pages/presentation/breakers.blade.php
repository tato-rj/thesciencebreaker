@extends('_core')

@section('content')

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9 col-md-12">
      @component('snippets.title')
      Breakers Community
      @endcomponent

        @foreach ($breakers as $member)
          @include('snippets.breakers')
        @endforeach
        {{ $breakers->links() }}

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