@extends('auth/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-7 col-xs-9 mx-auto">
            <div class="panel panel-default">
                <h3 class="mb-4">Reset password</h3>
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="Your email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Send Password Reset Link" class="btn btn-block btn-theme-green">
                            <a class="d-block text-muted m-0 mt-3" href="{{ route('home') }}">
                                <small>Return to webpage</small>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
