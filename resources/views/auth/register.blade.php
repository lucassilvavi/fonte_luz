@extends('auth.template.template')

@section('content-form')

    <form class="form-horizontal" id="sign_up" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="msg">Register a new membership</div>
        <div class="input-group {{ $errors->has('nome') ? ' has-error' : '' }}">
              <span class="input-group-addon">
                   <i class="material-icons">person</i>
              </span>
            <div class="form-line">
                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome Completo"
                       required autofocus>
                @if ($errors->has('nome'))
                    <span class="help-block">
                   <strong>{{ $errors->first('nome') }}</strong>
                   </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('cpf') ? ' has-error' : '' }}">
              <span class="input-group-addon">
                   <i class="material-icons">border_color</i>
              </span>
            <div class="form-line">
                <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="CPF"
                       required autofocus>
                @if ($errors->has('cpf'))
                    <span class="help-block">
                   <strong>{{ $errors->first('cpf') }}</strong>
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
                       placeholder="Endereço de E-mail" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('dt_nascimento') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                 </span>
            <div class="form-line date" id="datepicker-exemplo" data-provide="datepicker">
                <input type="text" class="form-control" name="dt_nascimento" placeholder="Data de Nascimento">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                @if ($errors->has('dt_nascimento'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dt_nascimento') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('logradouro') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">home</i>
                 </span>
            <div class="form-line">
                <input type="logradouro" class="form-control" name="logradouro" value="{{ old('logradouro') }}"
                       placeholder="Logradouro" required>
                @if ($errors->has('logradouro'))
                    <span class="help-block">
                        <strong>{{ $errors->first('logradouro') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('bairro') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">home</i>
                 </span>
            <div class="form-line">
                <input type="bairro" class="form-control" name="bairro" value="{{ old('bairro') }}"
                       placeholder="Bairro" required>
                @if ($errors->has('bairro'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bairro') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('uf') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">map</i>
                 </span>
            <div class="form-line">
                <input type="uf" class="form-control" name="uf" value="{{ old('uf') }}"
                       placeholder="UF" required>
                @if ($errors->has('uf'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uf') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('valor') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">attach_money</i>
                 </span>
            <div class="form-line">
                <input type="valor" class="form-control" id="money" name="valor" value="{{ old('valor') }}"
                       placeholder="Valor Contribuição" required>
                @if ($errors->has('valor'))
                    <span class="help-block">
                        <strong>{{ $errors->first('valor') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('cidade') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">location_city</i>
                 </span>
            <div class="form-line">
                <input type="cidade" class="form-control" name="cidade" value="{{ old('cidade') }}"
                       placeholder="Cidade" required>
                @if ($errors->has('cidade'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cidade') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="input-group-addon">
                <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password" minlength="6" placeholder="Senha"
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
                       placeholder="Confirmação de Senha" required>
            </div>
        </div>
        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Cadastrar</button>
        <div class="m-t-25 m-b--5 align-center">
            <a href="login">Você já é Membro?</a>
        </div>
    </form>

@endsection
