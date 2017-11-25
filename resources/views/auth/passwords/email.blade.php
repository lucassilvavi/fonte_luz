@extends('auth.template.template')

@section('content-form')

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="forgot_password" class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="msg">
                            Digite seu endereço de e-mail que você usou para se registrar.
                            Nós lhe enviaremos um e-mail com seu nome de usuário e um link para redefinir sua senha.
                        </div>
                        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                       placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Enviar</button>
                        <div class="row m-t-20 m-b--5 align-center">
                            <a href="/login">Login</a>
                        </div>
                    </form>
                </div>

@endsection
