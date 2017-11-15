@extends('auth/_core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-7 col-xs-9 mx-auto">
            <div class="panel panel-default">
                <h3 class="mb-4">Save new Password</h3>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Your email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            
                                <input id="password" type="password" class="form-control" name="password" placeholder="New password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            
                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-block btn-theme-green">
                                    Save new Password
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
