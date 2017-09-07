@extends('auth.template.template')

@section('content-form')

    <form id="sign_in" class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="msg">Bem-vindo</div>

        <div class="input-group {{ $errors->has('nu_cpf') ? ' has-error' : '' }}">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line">
                <input id="nu_cpf" type="text" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="form-control" name="nu_cpf" value="{{ old('nu_cpf') }}"
                       placeholder="CPF" required autofocus>
                @if ($errors->has('nu_cpf'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nu_cpf') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
       <span class="input-group-addon">
       <i class="material-icons">lock</i>
        </span>
            <div class="form-line">
                <input type="password" id="password" class="form-control" name="password" placeholder="Senha"
                       required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col-xs-8 p-t-5">
                <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink">
                <label for="rememberme" {{ old('remember') ? 'checked' : '' }}>Lembre Me</label>
            </div>
            <div class="col-xs-4">
                <button class="btn btn-block bg-pink waves-effect" type="submit">Logar</button>
            </div>
        </div>


        <div class="row m-t-15 m-b--20">
            <div class="col-xs-6">
                <a href="register">Cadastre-se!</a>
            </div>
            <div class="col-xs-6 align-right">
                <a href="{{ route('password.request') }}">
                    Esqueceu a senha?</a>
            </div>
        </div>
    </form>

@endsection
