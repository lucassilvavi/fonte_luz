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
                                    <option @if( $dados['repositoryUsuario']->findBy('co_uf',$uf['CO_SEQ_UF'])) selected
                                            @endif
                                            value="{{$uf['SG_UF']}}">{{$uf['NO_UF']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cidade" class="col-form-label">Cidade</label>
                            <select id="cidade" name="cidade" class="form-control">
                                @if(!empty($dados['cidadeUsuario']) && isset($dados['cidadeUsuario']))
                                    <option selected
                                            value="{{$dados['cidadeUsuario']['CO_SEQ_CIDADE']}}">{{$dados['cidadeUsuario']['NO_CIDADE']}}</option>
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
                                        <option value="{{$cidade['CO_SEQ_CIDADE']}}"
                                                @if(auth::user()->naturalidade === $cidade['CO_SEQ_CIDADE']) SELECTED
                                                @endif>{{$cidade['NO_CIDADE']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputState" class="col-form-label">Nacionalidade</label>
                                <select id="inputState" name="nacionalidade" class="form-control">
                                    <option value=""></option>
                                    @foreach(  $dados['paises'] as $pais)
                                        <option value="{{$pais['CO_SEQ_PAIS']}}"
                                                @if(auth::user()->co_pais == $pais['CO_SEQ_PAIS']) selected
                                                @endif>{{$pais['NO_PAIS']}}</option>
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
                            <div class="form-group col-md-3">
                                <label for="perfil" class="col-form-label">Perfil</label>
                                <input type="text" class="form-control" value="{{ $dados['pessoa']->perfil->NO_PERFIL}}"
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
                <form action="{{$dados['actionTrabalho']}}" method="post" id="formTrabalho">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="form-group col-md-5">
                            <label for="inputState" class="col-form-label">Trabalho Primário</label>
                            <select id="inputState" name="trabPrimeiro" class="form-control">
                                <option value=""></option>
                                @foreach( $dados['profissoes'] as $profissao)
                                    <option value="{{$profissao['CO_SEQ_PROFISSAO']}}">{{$profissao['NO_PROFISSAO']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputState" class="col-form-label">Trabalho Segundário</label>
                            <select id="inputState" name="trabSefundo" class="form-control">
                                <option value=""></option>
                                @foreach( $dados['profissoes'] as $profissao)
                                    <option value="{{$profissao['CO_SEQ_PROFISSAO']}}">{{$profissao['NO_PROFISSAO']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputState" class="col-form-label">Trabalho Terciário</label>
                            <select id="inputState" name="trabTerceiro" class="form-control">
                                <option value=""></option>
                                @foreach( $dados['profissoes'] as $profissao)
                                    <option value="{{$profissao['CO_SEQ_PROFISSAO']}}">{{$profissao['NO_PROFISSAO']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputState" class="col-form-label">Trabalho Quartenário</label>
                            <select id="inputState" name="trabQuartenario" class="form-control">
                                <option value=""></option>
                                @foreach( $dados['profissoes'] as $profissao)
                                    <option value="{{$profissao['CO_SEQ_PROFISSAO']}}">{{$profissao['NO_PROFISSAO']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success btn-sm btn-block">Salvar</button>
                    </div>
                </form>
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
                                    <button type="button" class="btn btn-danger excluirFoto"
                                            value="{{$foto->CO_SEQ_FOTO}}">
                                        <span class="fa fa-times"></span> Excluir
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/perfil/pessoal/getCidadeByUf.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/submitImage.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/alterarImagemPerfil.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/excluirFotoPerfil.js')}}"></script>
    <script src="{{asset('assets/js/submit.js')}}"></script>
    <script src="{{asset('assets/js/perfil/pessoal/submitPessoal.js')}}"></script>
    {{--<script src="{{asset('assets/js/perfil/pessoal/submitTrabalho.js')}}"></script>--}}
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
@endsection
