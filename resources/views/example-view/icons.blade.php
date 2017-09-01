@extends('layouts.principal')

@section('title','Examplo - Ícones')
@section('title-form','Ícones')

@section('breadcrumb')
    <li><a href="index.html">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Ícones</strong></li>
@endsection

@section('content')

    <h3>A biblioteca completa de ícones está disponível em <a href="fontawesome.io/icons">fontawesome.io/icons</a></h3><hr>

    <h4>Operações</h4>
    <ul class="list-group row no-borders">
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i> Salvar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i> Editar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i> Excluir</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-plus fa-2x" aria-hidden="true"></i> Adicionar </a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-search fa-2x" aria-hidden="true"></i> Pesquisa</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> Visualizar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i> Atualizar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-times fa-2x" aria-hidden="true"></i> Fechar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i> Voltar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i> Avançar</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-scissors fa-2x" aria-hidden="true"></i> Recortar </a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-files-o fa-2x" aria-hidden="true"></i> Copiar </a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-minus fa-2x" aria-hidden="true"></i> Menos </a></li>
    </ul><hr>

    <h4>Files</h4>
    <ul class="list-group row">
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-file fa-2x" aria-hidden="true"></i> Arquivo</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i> PDF</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-file-word-o fa-2x" aria-hidden="true"></i> Word</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i> Excel</a></li>
    </ul><hr>

    <h4>Pessoas</h4>
    <ul class="list-group row">
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-users fa-2x" aria-hidden="true"></i> Usuários </a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-user fa-2x" aria-hidden="true"></i> Usuário </a></li>
    </ul><hr>

    <h4>Extras</h4>
    <ul class="list-group row">
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-bug fa-2x" aria-hidden="true"></i> Bug </a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i> Calendário</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> Gráficos</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-download fa-2x" aria-hidden="true"></i> Download</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i> Logout/Sair</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i> Configurações</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Alerta</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i> E-mail</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i> Ajuda</a></li>
        <li class="list-group-item col-md-2 no-borders"><a href="#"><i class="fa fa-upload fa-2x" aria-hidden="true"></i> Upload</a></li>
    </ul>
@endsection