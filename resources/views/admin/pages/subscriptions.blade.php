@extends('admin/_core')

@section('content')
  
    <div class="container-fluid mb-4">
      
      @component('admin/snippets/page_title')
          Subscriptions
        @slot('comment')
          In this page you can <u>add</u> or <u>delete</u> subscribers
        @endslot
      @endcomponent

      <div class="row mt-4">
        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
          <h2 class="text-muted op-5 mb-3">
            <i class="fa fa-database mr-1" aria-hidden="true"></i> <strong>Subscriptions</strong>
          </h2>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <form class="jumbotron" method="POST" action="">
          {{csrf_field()}}
          <div class="form-inline">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon">@</div>
              <input required type="email" class="form-control" name="subscription" placeholder="New subscription">
            </div>
            <button type="submit" class="btn btn-theme-orange">Add e-mail</button>
          </div>
            {{-- Error --}}
            @component('admin/snippets/error')
              subscription
              @slot('feedback')
              {{ $errors->first('subscription') }}
              @endslot
            @endcomponent
        </form>          
      </div>

      <div class="row">
        <div class="col-12 text-center">
          <p class="text-muted">
            <i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>
            You currently have <strong>{{ $subscriptions_count }}</strong> subscriptions
          </p>
        </div>
        <div class="col-lg-10 col-md-12 mx-auto d-flex align-items-center justify-content-center flex-wrap">
          @foreach ($subscriptions as $subscription)
          <h5 class="m-1">
            <span class="subscription badge badge-default">{{ $subscription->email }}
              <i data-toggle="modal" data-target="#delete_modal" data-id="{{ $subscription->id }}" class="ml-2 fa fa-times-circle align-middle" aria-hidden="true"></i>
            </span>
          </h5>
          @endforeach
        </div>
        <div class="col-12 d-flex justify-content-center">
          {{ $subscriptions->links() }}
        </div>
      </div>

      @include('admin/snippets/confirm_delete')

    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$('.subscription .fa').on('click', function() {
  $id = $(this).attr('data-id');
  $email = $(this).parent().text();
  $('#delete_modal form').attr('action', '/admin/subscriptions/'+$id);
  $('#delete_modal h6 strong').text($email);
});
</script>
@endsection