@extends('admin/app')

@section('content')
  
<div class="container-fluid mb-4">
  
  @include('admin/snippets/page_title', [
    'slot' => 'Managers', 
    'comment' => 'Control the permissions for registered admins'])

  
    @foreach($admins as $admin)
    <div class="d-flex align-items-center justify-content-between mb-2">
    <div class="bg-light w-100 rounded-left px-3 py-2">
      <p class="m-0"><strong>{{$admin->full_name}}</strong> 
        <span class="text-muted"><small>| joined on {{$admin->created_at->toFormattedDateString()}}</span></small></p>
    </div>
    <div>
      <form method="POST" action="/admin/managers/permissions/{{$admin->id}}">
        {{csrf_field()}}
        {{method_field('PATCH')}} 
        @if($admin->is_authorized)
          <button type="submit" class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0">
            Authorized
          </button>
        @else
          <button type="submit" class="btn btn-warning" style="border-top-left-radius: 0; border-bottom-left-radius: 0">
            Unauthorized
          </button>
        @endif
      </form>
    </div>
    </div>
    @endforeach
  
</div>
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@endsection