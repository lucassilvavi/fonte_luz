<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nome do Sistema</title>

    <link href="{{asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/Font-Awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/animate.css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <style>
        @media screen and (min-width: 300px){
            .footer-version{
                display: none;
            }
            .mds{
                float:none;
                text-align: center;
            }
            .rodape{
                text-align: center;
            }
        }

        @media screen and (min-width: 760px){
            .footer-version{
                text-align: left;
                display: inline-block
            }

            .mds{
                float:right;
            }

            .rodape{
                text-align:left;
            }
        }

        .navbar{
            background-color: #2F4050 !important;
        }

        .navbar-brand{
            background-color: #2F4050 !important;
        }

        .btn-primary{
            background-color: #2F4050;
            border-color: #2F4050;
        }

        .btn-primary:hover{
            background-color: #293543;
            border-color: #293543;
        }

        .navbar-toggle.collapsed {
            background-color:inherit !important;
        }
    </style>
</head>

<body class="top-navigation">
<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <span class="navbar-toggle collapsed">
                        Versão {{env('APP_VERSION')}}
                    </span>
                    <a href="{{url('')}}" class="navbar-brand"><b>SIGLA</b></a>
                </div>
            </nav>
        </div>

        <div class="text-center animated fadeInDown">
            <div class="row">
                <div class="col-sm-12" style="margin-top: 30px">
                    <img src="http://template.app/assets/img/mds.png">
                    <h2>Nome do Sistema</h2>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    @if ($errors->has('login-errors'))
                        @if ($errors->first('login-errors') === 'error')
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <b>O usuário MDS deve possuir login e senha cadastrados no SAA (Sistema de Autenticação de Usuários)</b>
                        </div>
                        @else
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <b>{{ $errors->first('login-errors') }}</b>
                        </div>
                        @endif
                    @endif
                </div>
                <div class="col-sm-4">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <form class="m-t" role="form" method="post" action="login">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <input name="cpf" type="cpf" class="form-control" placeholder="CPF (Autenticação SAA)" value="{{ old('cpf') }}">
                            @if ($errors->has('cpf'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                            <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                                <input name="senha" type="password" class="form-control" placeholder="Senha">
                                @if ($errors->has('senha'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                        <a class="btn btn-block" target="_blank" href="http://homologacao.mds.net/saa-web/recuperarSenhaRedirect.action?url=">Esqueci minha senha!</a>
                    </form>
                </div>
                <div class="col-sm-5">
                </div>
            </div>
        </div>

        <div class="footer fixed rodape">
            <span class="footer-version">
                <strong>Versão {{env('APP_VERSION')}}</strong>
            </span>
            <span class="mds">
                Ministério do Desenvolvimento Social e Agrário
            </span>
        </div>
    </div>

    <!-- scripts -->
    <script src="http://siasc.app/assets/js/jquery-2.1.1.js"></script>
    <script src="http://siasc.app/assets/js/bootstrap.min.js"></script>

</body>
</html>
