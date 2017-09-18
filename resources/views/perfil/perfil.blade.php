@extends('layouts.principal')

@section('title','Exemplo de Abas')
@section('title-form','Abas')

@section('breadcrumb')
    <li><a href="index.html">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Abas</strong></li>
@endsection

@section('content')
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#pessoal" aria-controls="home" role="tab" data-toggle="tab">Pessoal</a>
            </li>
            <li role="presentation"><a href="#trabalho" aria-controls="profile" role="tab"
                                       data-toggle="tab">Trabalho</a></li>
            <li role="presentation"><a href="#telefones" aria-controls="messages" role="tab"
                                       data-toggle="tab">Telefones</a></li>
            <li role="presentation"><a href="#fotos" aria-controls="settings" role="tab" data-toggle="tab">Fotos</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="pessoal">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_nome" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" name="no_nome" id="no_nome"
                                   value="{{ $dados['pessoa']->no_nome}}"
                                   placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{ $dados['pessoa']->email}}"
                                   placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uf" class="col-form-label">UF</label>
                        <select id="uf" class="form-control">Choose</select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade" class="col-form-label">Cidade</label>
                        <select id="cidade" class="form-control">Choose</select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="logradouro" class="col-form-label">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro"
                               value="{{ $dados['pessoa']->logradouro}}"
                               placeholder="Logradouro">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="bairro" class="col-form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" value="{{ $dados['pessoa']->bairro}}"
                               placeholder="Bairro">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="nu_cep" class="col-form-label">CEP</label>
                            <input type="text" class="form-control" id="nu_cep" value="{{ $dados['pessoa']->nu_cep}}"
                                   placeholder="CEP">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="naturalidade" class="col-form-label">Naturalidade</label>
                            <input type="text" class="form-control" id="naturalidade"
                                   value="{{ $dados['pessoa']->naturalidade}}"
                                   placeholder="Naturalidade">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputState" class="col-form-label">Nacionalidade</label>
                            <select id="inputState" class="form-control">Choose</select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nu_cpf" class="col-form-label">CPF</label>
                            <input type="text" class="form-control" id="nu_cpf" value="{{ $dados['pessoa']->nu_cpf}}"
                                   readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor" class="col-form-label">Valor Contribuição</label>
                            <input type="text" class="form-control" id="valor"
                                   value="{{ $dados['pessoa']->vl_contribuicao}}"
                                   placeholder="00,00">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="perfil" class="col-form-label">Perfil</label>
                            <input type="text" class="form-control" id="perfil" placeholder="Administrador" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="trabalho">
                <h3>Conteúdo da Aba Profile</h3>
            </div>
            <div role="tabpanel" class="tab-pane" id="telefones">
                <h3>Conteúdo da Aba Messages</h3>
            </div>
            <div role="tabpanel" class="tab-pane" id="fotos">
                <form action="{{URL::to('savePhoto')}}" id="salvarImage" enctype="multipart/form-data" method="POST">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="alert alert-success alert-dismissable" hidden>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Foto inserida com sucesso!</strong>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="title" class="form-control"
                               placeholder="Escreva um nome para a imagem">
                    </div>

                    <div class="form-group">
                        <label>Imagem:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success upload-image" id="btnSalvar" type="button">Upload Image</button>
                    </div>
                </form>
                <div class="row">
                    @foreach($dados['fotos'] as $foto)
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <a href="{{'fotos/'.$foto->DS_ENDERECO_FOTO}}" target="_blank">
                                    <img src="{{'fotos/'.$foto->DS_ENDERECO_FOTO}}" alt="{{$foto->NO_FOTO}}"
                                         style="width:100%">
                                    <div class="caption">
                                        <p>{{$foto->NO_FOTO}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#btnSalvar").click(function () {
            $.ajax({
                url: '/savePhoto',
                data: new FormData($("#salvarImage")[0]),
                async: false,
                type: 'post',
                processData: false,
                contentType: false,
                success: function (response) {

                    if (response == 'true') {
                        sucessoFoto();
                    }
                    else if (response == 'image and title') {
                        faltaAnexar();
                    }
                    else if (response == 'image') {
                        faltaImage();

                    }
                    else if (response == 'title') {
                        faltaTitulo();
                    }
                },
            });
        });

        function sucessoFoto() {
// Override global options
            toastr.success('Foto Anexada com Sucesso!', '', {
                closeButton: false,
                progressBar: true,
                timeOut: "2500",
                positionClass: 'toast-top-center'
            });
            setTimeout(function () {
                location.reload();
            }, 2500);
        }

        function faltaAnexar() {
// Override global options
            toastr.warning('Por favor Anexe um Imagem e insira um Titulo para ela!', '', {
                closeButton: false,
                progressBar: true,
                positionClass: 'toast-top-center'
            });
        }

        function faltaImage() {
// Override global options
            toastr.warning('Por favor Anexe um Imagem!', '', {
                closeButton: false,
                progressBar: true,
                positionClass: 'toast-top-center'
            });

        }

        function faltaTitulo() {
// Override global options
            toastr.warning('Por favor Anexe um Titulo para a Imagem!', '', {
                closeButton: false,
                progressBar: true,
                positionClass: 'toast-top-center'
            });
        }

    </script>
@endsection
