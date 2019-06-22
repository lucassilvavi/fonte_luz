<style>
    .debito {
        background-color: lightblue !important;
    }


    .credito {
        background-color: lightcoral !important;
    }

</style>
@extends('layouts.principal')

@section('title','Pendete de Contribuição')
@section('title-form','Pendete de Contribuição')

@section('content')
    <div class="row">
        <div class="container">
            <div class="form-group col-md-2">
                <label for="periodeDe" class="control-label">* Periodo De: </label>
                <input type="text" id="periodeDe" class="form-control date" name="periodeDe"
                       value="{{$dados['periodeDe'] ?? ""}}">
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label for="periodeAte" class="control-label">* Até: </label>
                <input type="text" id="periodeAte" class="form-control date" name="periodeAte"
                       value="{{ $dados['periodeAte'] ?? ""}}">
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label for="nt_lancamento" class="control-label">Natureza do Lançamento: </label>
                <select name="nt_lancamento" id="nt_lancamento" class="form-control">
                    <option value=""></option>
                    <option @if($dados['nt_lancamento'] == "D") selected @endif value="D">Debito</option>
                    <option @if($dados['nt_lancamento'] == "C") selected @endif value="C">Crédito</option>
                </select>
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-3">
                <label for="tipo_lancamento" class="control-label">Tipo Lançamento: </label>
                <select name="tipo_lancamento" id="tipo_lancamento" class="form-control">
                    <option value=""></option>
                    @foreach(  $dados['tipoLanc'] as $tipoLanc)
                        <option @if($dados['tipo_lancamento'] == $tipoLanc->co_seq_tipo_lancamento) selected @endif
                                value="{{$tipoLanc->co_seq_tipo_lancamento}}">{{$tipoLanc->no_tipo_lancamento}}</option>
                    @endforeach
                </select>
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label class="control-label"></label>
                <button type="button" id="pesquisar" class="btn btn-info btn-block">Pesquisar</button>
                <button type="button" class="btn btn-primary btn-block inserirLancamento">Inserir Lançamento</button>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-borderless table-condensed" id="tableEntradaSaida">
            <thead>
            <tr>
                <th scope="col">Tipo Lançamento</th>
                <th scope="col">Natureza</th>
                <th scope="col">Dt. Liquidação</th>
                <th scope="col">Mês Referência</th>
                <th scope="col">Ano Referência</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $dados['dadosFinanceiro'] as $dadosFinanceiro)
                <tr>

                    <td>{{$dadosFinanceiro->tipoContribuicao[0]->no_tipo_lancamento}}</td>
                    <td class="tipoLancamento">{{$dadosFinanceiro->tipo_lancamento ==="D"?"Débito":"Crédito"}}</td>
                    <td>{{$dados['dataRepository']->formatarDataBR($dadosFinanceiro->dt_liquidacao)}}</td>
                    <td>{{$dados['dataRepository']->getMesByKey($dadosFinanceiro->mes_referencia)}}</td>
                    <td>{{$dadosFinanceiro->ano_referencia}}</td>
                    <td class="valor">{{JansenFelipe\Utils\Utils::moeda($dadosFinanceiro->valor)}}</td>
                    <td>{{$dadosFinanceiro->descricao}}</td>
                    <td class="bordaTable">
                        <button type="button" class="btn btn-block btn-warning btn-xs editarEntradaSaida"
                                value="{{$dadosFinanceiro->co_seq_financeiro}}">Editar</button>
                        <button type="button" class="btn btn-block btn-danger btn-xs estornarEntradaSaida"
                                value="{{$dadosFinanceiro->co_seq_financeiro}}">Estornar</button>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
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
@endsection
@section('scripts')
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
    <script src="{{asset('assets/js/entradaSaida/dataTable.js')}}"></script>
    <script src="{{asset('assets/js/entradaSaida/pesquisar.js')}}"></script>
    <script src="{{asset('assets/js/entradaSaida/modalCadastro.js')}}"></script>
    <script src="{{asset('assets/js/entradaSaida/layoutDataTable.js')}}"></script>
    <script src="{{asset('assets/js/entradaSaida/modalEditar.js')}}"></script>
    <script src="{{asset('assets/js/entradaSaida/modalEstorno.js')}}"></script>
@endsection
