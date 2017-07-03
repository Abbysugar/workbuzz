@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="has-text-centered" style="margin-top: 100px">
                    <h1 class="title"> Login</h1>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="box" style="margin-top: 100px;">
                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="label">Email</label>
                          <p class="control has-icons-left">
                            <input class="input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <span class="icon is-small is-left">
                              <i class="fa fa-envelope"></i>
                            </span>
                          </p>
                          @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                          @endif
                        </div>

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="label">Password</label>
                          <p class="control has-icons-left">
                            <input class="input" id="password" type="password" name="password" required>
                            <span class="icon is-small is-left">
                              <i class="fa fa-lock"></i>
                            </span>
                          </p>
                          @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                          @endif
                        </div>

                        <div class="field is-grouped">
                          <p class="control">
                            <button class="button is-primary">Login</button>
                          </p>
                          <p class="forgot">
                            <a href="{{ route('password.request') }}" class="button is-success">Set Password</a>
                          </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
