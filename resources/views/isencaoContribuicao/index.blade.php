@extends('layouts.principal')
@section('title','Isenção de Contribuição')
@section('content')
    <style>
        .bordaTable {
            border: 3px solid grey !important;
        }
    </style>
    <table id="tb_Insencao_contribuicao" class="table table-bordered " cellspacing="0" width="100%">
        <thead class="bordaTable">
        <tr>
            <th>Periodo De</th>
            <th>Periodo Até</th>
            <th>Usuário</th>
            <th>Motivo</th>
            <th>Editar</th>
        </tr>
        </thead>
        <tbody class="bordaTable">
        @foreach( $dados['isencoes'] as $isencoe)
            <tr>
                <td class="bordaTable">{{$dados['data']->formatarDataBR($isencoe->dt_inicio_vigencia)}}</td>
                <td class="bordaTable">{{!empty($isencoe->dt_fim_vigencia) ? $dados['data']->formatarDataBR($isencoe->dt_fim_vigencia) : "Em Aberto" }}</td>
                <td class="bordaTable">{{$isencoe->usuario->no_nome}}</td>
                <td class="bordaTable">{{$isencoe->ds_observacao}}</td>
                <td class="bordaTable">
                    <button type="button" class="btn btn-block btn-info btn-xs editarIsencao"
                            value="{{$isencoe->co_seq_isencao_contribuicao}}">Editar</button>
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
    <script src="{{asset('assets/js/isencaoContribuicao/modalCadIsencaoContribuicao.js')}}"></script>
    <script src="{{asset('assets/js/isencaoContribuicao/dataTableIsencaoControbuicao.js')}}"></script>
    <script src="{{asset('assets/js/isencaoContribuicao/modalEditarIsencaoContribuicao.js')}}"></script>

@endsection

