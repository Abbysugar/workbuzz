@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="has-text-centered" style="margin-top: 100px">
                <h2 class="title"> Set Password </h2>
                </div>
                <div class="box" style="margin-top: 50px">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }} has-text-centered">
                            <label for="email" class="label">E-Mail Address</label>

                            <div class="column is-6 is-offset-3" >
                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-text-centered">
                            <div class="column is-6 is-offset-3">
                                <button type="submit" class="button is-success">
                                    Send Password Reset Link
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
