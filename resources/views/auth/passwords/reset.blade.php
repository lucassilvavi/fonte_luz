@extends('auth.template.template')

@section('content-form')
    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">email</i>
                 </span>
            <div class="form-line">
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}"
                       placeholder="Endereço de E-mail" required autofocus>
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
                <input type="password" class="form-control" name="password" minlength="6" placeholder="Digite a nova senha"
                       required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="input-group {{$errors->has('password_confirmation') ? ' has-error' : '' }}">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirme a nova senha"
                       required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Alterar senha</button>


    </form>
@endsection
