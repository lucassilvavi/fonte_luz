@extends('auth.template.template')

@section('content-form')

    <form class="form-horizontal" id="sign_up" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="msg">Register a new membership</div>
        <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <span class="input-group-addon">
                   <i class="material-icons">person</i>
              </span>
            <div class="form-line">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name Surname"
                       required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
                   </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">email</i>
                 </span>
            <div class="form-line">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Email Address" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password" minlength="6" placeholder="Password"
                       required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password_confirmation" minlength="6"
                       placeholder="Confirm Password" required>
            </div>
        </div>
        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Register</button>
        <div class="m-t-25 m-b--5 align-center">
            <a href="login">You already have a membership?</a>
        </div>
    </form>
@endsection
