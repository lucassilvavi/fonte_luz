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
                <form action="/action_page.php" method="post" id="formPessoal">
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
                        <div class="input-group">
                              <span class="input-group-btn">
                                <span class="btn btn-primary"
                                      onclick="$(this).parent().find('input[type=file]').click();">Pesquisar</span>
                                <input name="image"
                                       onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"
                                       style="display: none;" type="file">
                              </span>
                            <span class="form-control"></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-success upload-image" id="btnSalvar" type="button">Salvar Imagem</button>
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
                                @if($foto->ST_ATIVO == 'S')
                                    <button type="button" class="btn btn-success" value="{{$foto->CO_SEQ_FOTO}}">
                                        <span class="fa fa-check-circle"></span> Ativa
                                    </button>
                                @else
                                    <button type="button" class="btn btn-info ativarFoto"
                                            value="{{$foto->CO_SEQ_FOTO}}">
                                        <span class="fa fa-check"></span> Ativar
                                    </button>
                                @endif
                                <button type="button" class="btn btn-danger" value="{{$foto->CO_SEQ_FOTO}}">
                                    <span class="fa fa-times"></span> Excluir
                                </button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/perfil/pessoal/submitImage.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/alterarImagemPerfil.js')}}"></script>
@endsection
