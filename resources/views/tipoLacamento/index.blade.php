@extends('layouts.principal')
@section('title','Contribuição')
@section('content')
    <table id="tb_tipo_contribuicao" class="table table-bordered " cellspacing="0" width="100%">
        <thead class="bordaTable">
        <tr>
            <th>Nome Lançamento</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Editar</th>

        </tr>
        </thead>
        <tbody class="bordaTable">

        @foreach($dados['lancamentos']  as $lancamentos)
            <tr>
                <td>{{$lancamentos->no_tipo_lancamento}}</td>
                <td>{{$lancamentos->ds_tipo_lancamento}}</td>
                <td>{{$lancamentos->st_ativo}}</td>
                <td>
                    <button type="button" class="btn btn-xs btn-info btn-block editTipoContribuicao"
                            value="{{$lancamentos->co_seq_tipo_lancamento}}">Editar
                    </button>
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

    <script src="{{asset('assets/js/tipoLancamento/dataTable.js')}}"></script>
    <script src="{{asset('assets/js/tipoLancamento/modalCadLancamento.js')}}"></script>
    <script src="{{asset('assets/js/tipoLancamento/modalEditar.js')}}"></script>
@endsection

