@extends('auth/_core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-7 col-xs-9 mx-auto">
            <div class="panel panel-default">
                <img id="brand" class="mb-3" src="{{ asset('images/logo-small.svg') }}">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">                   
                            <input id="first_name" type="text" class="form-control" placeholder="First name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="last_name" type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-block btn-theme-green">
                                Register
                            </button>
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
