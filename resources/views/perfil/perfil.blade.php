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
                                       data-toggle="tab">Habilidades</a></li>
            <li role="presentation"><a href="#telefones" aria-controls="messages" role="tab"
                                       data-toggle="tab">Telefones</a></li>
            <li role="presentation"><a href="#fotos" aria-controls="settings" role="tab" data-toggle="tab">Fotos</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="pessoal">
                <form action="{{$dados['actionPessoal']}}" method="post" id="formPessoal">
                    <div class="row">
                        {{ csrf_field() }}
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
                            <select id="uf" name="uf" class="form-control">
                                <option value=""></option>
                                @foreach( $dados['ufs'] as $uf)
                                    <option @if( $dados['repositoryUsuario']->findBy('co_uf',$uf['co_seq_uf'])) selected
                                            @endif
                                            value="{{$uf['sg_uf']}}">{{$uf['no_uf']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade" class="col-form-label">Cidade</label>
                            <select id="cidade" name="cidade" class="form-control">
                                @if(!empty($dados['cidadeUsuario']) && isset($dados['cidadeUsuario']))
                                    <option selected
                                            value="{{$dados['cidadeUsuario']['co_seq_cidade']}}">{{$dados['cidadeUsuario']['no_cidade']}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="logradouro" class="col-form-label">Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="logradouro"
                                   value="{{ $dados['pessoa']->logradouro}}"
                                   placeholder="Logradouro">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="bairro" class="col-form-label">Bairro</label>
                            <input type="text" class="form-control" name="bairro"
                                   id="bairro" value="{{ $dados['pessoa']->bairro}}"
                                   placeholder="Bairro">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="nu_cep" class="col-form-label">CEP</label>
                                <input type="text" class="form-control" name="cep" id="nu_cep"
                                       value="{{ $dados['pessoa']->nu_cep}}"
                                       placeholder="CEP">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="naturalidade" class="col-form-label">Naturalidade</label>
                                <select id="inputState" name="naturalidade" class="form-control">
                                    <option value=""></option>
                                    @foreach(  $dados['cidades'] as $cidade)
                                        <option value="{{$cidade['co_seq_cidade']}}"
                                                @if(auth::user()->naturalidade === $cidade['co_seq_cidade']) SELECTED
                                                @endif>{{$cidade['no_cidade']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputState" class="col-form-label">Nacionalidade</label>
                                <select id="inputState" name="nacionalidade" class="form-control">
                                    <option value=""></option>
                                    @foreach(  $dados['paises'] as $pais)
                                        <option value="{{$pais['co_seq_pais']}}"
                                                @if(auth::user()->co_pais == $pais['co_seq_pais']) selected
                                                @endif>{{$pais['no_pais']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nu_cpf" class="col-form-label">CPF</label>
                                <input type="text" class="form-control" name="cpf"
                                       id="nu_cpf" value="{{ $dados['pessoa']->nu_cpf}}"
                                       readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="valor" class="col-form-label">Valor Contribuição</label>
                                <input type="text" class="form-control money" id="valor" name="valor"
                                       value="{{number_format($dados['pessoa']->vl_contribuicao, 2, ',', '.')}}"
                                       placeholder="00,00">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputState" class="col-form-label">Profissão</label>
                                <select id="inputState" name="profissao" class="form-control">
                                    <option value=""></option>
                                    @foreach( $dados['profissoes'] as $profissao)
                                        <option @if(count($dados['trabalho']) >=1 &&  $dados['trabalho'][0]->co_seq_profissao == $profissao['co_seq_profissao'])
                                                selected
                                                @endif value="{{$profissao['co_seq_profissao']}}">{{$profissao['no_profissao']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="perfil" class="col-form-label">Perfil</label>
                                <input type="text" class="form-control" value="{{ $dados['pessoa']->perfil->no_perfil}}"
                                       name="perfil" id="perfil"
                                       placeholder="Administrador" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success btn-sm btn-block" id="btnSalvarPessoal">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="trabalho">
                <div class="row">
                    <form action="{{$dados['actionTrabalho']}}" method="post" id="formTrabalho">
                        <div class="row" id="adicionarTrabalho">
                            {{ csrf_field() }}
                            <div class="form-group col-md-5">
                                <label for="inputState" class="col-form-label">Habilidades</label>
                                <select id="inputState" name="habilidade" class="form-control">
                                    <option value=""></option>
                                    @foreach( $dados['profissoes'] as $profissao)
                                        <option value="{{$profissao['co_seq_profissao']}}">{{$profissao['no_profissao']}}</option>
                                    @endforeach
                                </select>
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" id="btnSubmitHabilidade" class="btn btn-success btn-sm btn-block">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <table id="tb_habilidade" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Habilidade</th>
                            <th>Opcão</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados['habilidades'] as $habilidade)
                            <tr>
                                <td>
                                    {{$habilidade->no_profissao}}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-block btnExcluirHabilidade"
                                            value="{{$habilidade->co_seq_usuario_profissao}}">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="telefones">
                <form action="{{$dados['actionTelefone']}}" method="post" id="formTelefone">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="nu_telefone">Tipo Telefone:</label>
                            <select class="form-control" name="tipoTelefone">
                                <option value="1">Celular</option>
                                <option value="2">Residencial</option>
                                <option value="3">Recado</option>
                                <option value="4">Empresarial</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="nu_telefone">Número:</label>
                            <input type="text" value=""
                                   class="form-control phones"
                                   name="telefone">
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success btn-sm btn-block"
                                id="submitTelefone">Salvar
                        </button>
                    </div>
                </form>
                <div class="row">
                    <table id="tb_telefones" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Tipo Telefone</th>
                            <th>Telefones</th>
                            <th>Opcão</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $dados['telefones'] as $telefone)
                            <tr>
                                <td>
                                    <?php
                                    switch ($telefone->tp_telefone){

                                        case (1):
                                            echo 'Celular';
                                            break;
                                        case (2):
                                            echo 'Residencial';
                                            break;
                                        case (3):
                                            echo 'Recado';
                                            break;
                                        case (4):
                                            echo 'Empresarial';
                                            break;
                                    }
                                        ?>
                                </td>
                                <td>
                                    <p class="phones">{{$telefone->nu_telefone}}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-block btnExcluirTelefone"
                                            value="{{$telefone->co_seq_telefone}}">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
                                       style="display: none;" type="file" accept=".png, .jpg, .jpeg">
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
                                <a href="{{'fotos/'.$foto->ds_endereco_foto}}" target="_blank">
                                    <img src="{{'fotos/'.$foto->ds_endereco_foto}}" alt="{{$foto->no_foto}}"
                                         style="width:100%">
                                    <div class="caption">
                                        <p>{{$foto->no_foto}}</p>
                                    </div>
                                </a>
                                @if($foto->ST_ATIVO == 'S')
                                    <button type="button" class="btn btn-success" value="{{$foto->co_seq_foto}}">
                                        <span class="fa fa-check-circle"></span> Ativa
                                    </button>
                                @else
                                    <button type="button" class="btn btn-info ativarFoto"
                                            value="{{$foto->co_seq_foto}}">
                                        <span class="fa fa-check"></span> Ativar
                                    </button>
                                    <button type="button" class="btn btn-danger excluirFoto"
                                            value="{{$foto->co_seq_foto}}">
                                        <span class="fa fa-times"></span> Excluir
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title"></h3>
                    </div>
                    <div class="modal-body" id="conteudoModal"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
    <script src="{{asset('assets/js/submit.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/getCidadeByUf.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/submitImage.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/alterarImagemPerfil.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/excluirFotoPerfil.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/submitPessoal.js')}}"></script>
    <script src="{{asset('assets/js/perfil/habilidade/dataTableHabilidades.js')}}"></script>
    <script src="{{asset('assets/js/perfil/habilidade/submitHabilidade.js')}}"></script>
    <script src="{{asset('assets/js/perfil/habilidade/modalDesableHabilidade.js')}}"></script>
    <script src="{{asset('assets/js/perfil/telefone/submitTelefone.js')}}"></script>
@endsection

