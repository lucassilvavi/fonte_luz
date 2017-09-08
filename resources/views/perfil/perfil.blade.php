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
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pessoal</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Trabalho</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Telefones</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Fotos</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_nome" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" name="no_nome" id="no_nome" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
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
                        <input type="text" class="form-control" id="logradouro" placeholder="Logradouro">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="bairro" class="col-form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="nu_cep" class="col-form-label">CEP</label>
                            <input type="text" class="form-control" id="nu_cep" placeholder="CEP">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="naturalidade" class="col-form-label">Naturalidade</label>
                            <input type="text" class="form-control" id="naturalidade" placeholder="Naturalidade">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputState" class="col-form-label">Nacionalidade</label>
                            <select id="inputState" class="form-control">Choose</select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nu_cpf" class="col-form-label">CPF</label>
                            <input type="text" class="form-control" id="nu_cpf">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor" class="col-form-label">Valor Contribuição</label>
                            <input type="text" class="form-control" id="valor" placeholder="00,00">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="perfil" class="col-form-label">Perfil</label>
                            <input type="text" class="form-control" id="perfil" placeholder="Administrador">
                        </div>
                    </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <h3>Conteúdo da Aba Profile</h3>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
                <h3>Conteúdo da Aba Messages</h3>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <h3>Conteúdo da Aba Settings</h3>
            </div>
        </div>

    </div>
@endsection