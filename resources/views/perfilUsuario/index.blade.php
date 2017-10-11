@extends('layouts.principal')

@section('title','Exemplo de Abas')
@section('title-form','Abas')

@section('content')
    <h3>Lista de Perfis</h3>
    <table id="tb_perfil" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ativo</th>
            <th>Opcões</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dados['perfil'] as $perfil)
            <tr>
                <td>{{$perfil['no_perfil']}}</td>
                <td>{{$perfil['ds_perfil']}}</td>
                <td>{{($perfil['st_ativo'] == 'S') ? 'Sim': 'Não'}}</td>
                <td>
                    <button type="button" class="btn btn-block btn-info btn-xs detalhes" value="{{$perfil['co_seq_perfil']}}">Detalhes</button>
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
    <script src="{{asset('assets/js/perfilUsuario/dataTablePerfil.js')}}"></script>
    <script src="{{asset('assets/js/perfilUsuario/modalCadastroPerfil.js')}}"></script>
    <script src="{{asset('assets/js/perfilUsuario/modalDetalhesPerfil.js')}}"></script>
@endsection
