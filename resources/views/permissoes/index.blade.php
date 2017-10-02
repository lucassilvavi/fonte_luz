@extends('layouts.principal')

@section('title','Exemplo de Abas')
@section('title-form','Abas')

@section('content')
    <h3>Lista de Permissões</h3>
    <table id="tb_permissao" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Opcões</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $dados['permissoes'] as $permissao)
            <tr>
                <td>{{$permissao['NO_PERMISSAO']}}</td>
                <td>{{$permissao['DS_PERMISSAO']}}</td>
                <td>
                    <button type="button" class="btn btn-block btn-info btn-xs detalhes"
                            value="{{$permissao['CO_SEQ_PERMISSOES']}}">Detalhes</button>
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
    <script src="{{asset('assets/js/permissao/dataTablePermissao.js')}}"></script>
    <script src="{{asset('assets/js/permissao/modalCadastroPermissao.js')}}"></script>
    <script src="{{asset('assets/js/permissao/modalDetalhesPermissao.js')}}"></script>
@endsection
