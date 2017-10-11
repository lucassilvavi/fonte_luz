@extends('layouts.principal')

@section('title','Grupo de Permissões')
@section('title-form','Grupo de Permissões')

@section('content')
    <h3>Lista de Grupos de Permissões</h3>
    <table id="tb_grupo_permissao" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Opcões</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $dados['grupoPermissoes'] as $grupo)
            <tr>
                <td>{{$grupo['no_grupo']}}</td>
                <td>{{$grupo['ds_grupo']}}</td>
                <td>
                    <button type="button" class="btn btn-block btn-info btn-xs detalhes" value="{{$grupo['co_seq_grupo_permissoes']}}">Detalhes</button>
                    <button type="button" class="btn btn-block btn-danger btn-xs excluir" value="{{$grupo['co_seq_grupo_permissoes']}}">Excluir</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
@endsection
@section('scripts')
    <script src="{{asset('assets/js/grupoPermissao/dataTableGrupoPermissao.js')}}"></script>
    <script src="{{asset('assets/js/grupoPermissao/modalCadastroGrupoPermissao.js')}}"></script>
    <script src="{{asset('assets/js/grupoPermissao/modalDetalhesGrupo.js')}}"></script>
    <script src="{{asset('assets/js/grupoPermissao/modalDesableGrupoPermissao.js')}}"></script>
@endsection
