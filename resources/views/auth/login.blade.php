@extends('auth/_core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-7 col-xs-9 mx-auto">
            <div class="panel panel-default">
                <img id="brand" class="mb-3" src="{{ asset('images/logo-small.svg') }}">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Your email" value="{{ old('email') }}" required autofocus>
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
                            <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Keep me signed in</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-block btn-theme-green">
                                Login
                            </button>
                            <a class="d-block text-muted m-0 mt-3" href="{{ route('password.request') }}">
                                <small>Forgot Your Password?</small>
                            </a>
                            <a class="d-block text-muted m-0 mt-1" href="{{ route('home') }}">
                                <small>Return to main page</small>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
