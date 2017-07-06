@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="has-text-centered" style="margin-top: 100px">
                    <h2>Create new Password</h2>
                </div>

                <div class="box" style="margin-top: 50px">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }} has-text-centered">
                            <label for="email" class="col is-4 control-label">E-Mail Address</label>

                            <div class="col is-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }} has-text-centered">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col is-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-text-centered">
                            <label for="password-confirm" class="col is-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-text-centered">
                            <div class="col is-6 is-offset-4">
                                <button type="submit" class="button is-success">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
