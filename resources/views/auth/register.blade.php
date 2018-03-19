@extends('auth.template.template')

@section('content-form')

    <form class="form-horizontal" id="sign_up" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="idUsuario"></div>
        <div class="msg">Cadastro</div>
        <div class="input-group {{ $errors->has('nu_cpf') ? ' has-error' : '' }}">
              <span class="input-group-addon">
                   <i class="material-icons">border_color</i>
              </span>
            <div class="form-line">
                <input type="text" class="form-control" name="nu_cpf" value="{{ old('nu_cpf') }}" placeholder="CPF"
                       maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="cpf"
                       required autofocus>
                @if ($errors->has('nu_cpf'))
                    <span class="help-block">
                   <strong>{{ $errors->first('nu_cpf') }}</strong>
                   </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('no_nome') ? ' has-error' : '' }}">
              <span class="input-group-addon">
                   <i class="material-icons">person</i>
              </span>
            <div class="form-line">
                <input type="text" class="form-control" name="no_nome" value="{{ old('no_nome') }}"
                       placeholder="Nome Completo" id="no_nome"
                       required autofocus>
                @if ($errors->has('no_nome'))
                    <span class="help-block">
                   <strong>{{ $errors->first('no_nome') }}</strong>
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
                       placeholder="Endereço de E-mail" id="email" required>
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
            <div class="form-line">
                <input type="text" class="form-control date" name="dt_nascimento" value="{{ old('dt_nascimento') }}"
                       placeholder="Data de Nascimento" id="dt_nascimento">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                @if ($errors->has('dt_nascimento'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dt_nascimento') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('co_uf') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">map</i>
                 </span>
            <div class="form-line">
                <select type="co_uf" name="co_uf" id="uf" class="form-control" required>
                    @foreach(\App\Http\Controllers\Facade\UFAtivo::getUf() as $uf)
                        <option value="{{$uf->sg_uf}}">{{$uf->no_uf}}</option>
                    @endforeach
                </select>
                {{--<input type="uf" class="form-control" name="uf" value="{{ old('uf') }}"--}}
                {{--placeholder="UF" required>--}}
                @if ($errors->has('co_uf'))
                    <span class="help-block">
                        <strong>{{ $errors->first('co_uf') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('co_cidade') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">location_city</i>
                 </span>
            <div class="form-line">
                <select type="co_cidade" name="co_cidade" id="cidade" class="form-control" required>
                    <option value="">Cidade</option>
                </select>
                {{--<input type="cidade" class="form-control" name="cidade" value="{{ old('cidade') }}"--}}
                {{--placeholder="Cidade" required>--}}
                @if ($errors->has('co_cidade'))
                    <span class="help-block">
                        <strong>{{ $errors->first('co_cidade') }}</strong>
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
                       placeholder="Logradouro" id="logradouro" required>
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
                       placeholder="Bairro" id="bairro" required>
                @if ($errors->has('bairro'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bairro') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="input-group {{ $errors->has('vl_contribuicao') ? ' has-error' : '' }}">
                <span class="input-group-addon">
                    <i class="material-icons">attach_money</i>
                 </span>
            <div class="form-line">
                <input type="vl_contribuicao" class="form-control" id="money" name="vl_contribuicao"
                       value="{{ old('vl_contribuicao') }}"
                       placeholder="Valor Contribuição" required>
                @if ($errors->has('vl_contribuicao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('vl_contribuicao') }}</strong>
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#cpf').keyup(function () {
                var cpf = $(this).val();
                if (cpf.length == 11) {
                    $.ajax({
                        type: "get",
                        url: "/getDadosUsuarios/" + cpf,
                        success: function (dados) {
                            console.log(dados);
                            if (dados != 'naoPossui') {
                                $('#no_nome').val(dados.no_nome);
                                $('#email').val(dados.email);
                                $('#dt_nascimento').val(dados.dt_nascimento);
                                $('#logradouro').val(dados.logradouro);
                                $('#bairro').val(dados.bairro);
                                $('#money').val(dados.vl_contribuicao);
                                $('.idUsuario').append('<input type="hidden" name="idUsuario" value=' + dados.id + ' />');
                                $('#sign_up').attr('action', '/register/update');
                            } else {
                                $('#no_nome').val("");
                                $('#email').val('');
                                $('#dt_nascimento').val('');
                                $('#logradouro').val('');
                                $('#bairro').val('');
                                $('#money').val('');
                                $('#sign_up').attr('action', '/register');
                            }

                        }
                    });
                }
            });
        });
    </script>

@endsection
