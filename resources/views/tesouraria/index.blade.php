<style>
    .bordaTable {
        border: 3px solid grey !important;
    }
</style>
@extends('layouts.principal')
@section('title','Tesouraria')
@section('content')
    <form method="get" id="formContribuicao">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="container form-group col-md-4">
            <fieldset>
                <legend>Classificação do Pagamento:</legend>
                <div class="radio">
                    <label><input type="radio" name="classificacaoPagamento" checked value="Pagamentos Validados">
                        Pagamentos Validados</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="classificacaoPagamento" value="Pendente de Validação">
                        Pendente de Validação</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="classificacaoPagamento" value="Pendente com Observação">
                        Pendente com Observação</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="classificacaoPagamento" value="Reprovado"> Reprovado</label>
                </div>
            </fieldset>
        </div>
        <div class="container">
            <div class="form-group col-md-2">
                <label for="periodeDe" class="control-label">* Periodo De: </label>
                <input type="text" id="periodeDe" class="form-control date" name="periodeDe" value="">
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label for="periodeAte" class="control-label">* Até: </label>
                <input type="text" id="periodeAte" class="form-control date" name="periodeAte" value="">
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-3">
                <label for="membro" class="control-label">Membros: </label>
                <select name="membro" id="membro" class="form-control">
                    <option value=""></option>
                    @foreach( $dados['usuarios'] as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->no_nome}}</option>
                    @endforeach
                </select>
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-7">
                <button type="button" id="pesquisar" class="btn btn-info btn-block">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div id="boxTable">

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
@endsection
@section('scripts')
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
    <script src="{{asset('assets/js/tesouraria/dataTableTesouraria.js')}}"></script>
    <script src="{{asset('assets/js/tesouraria/tableContribuicao.js')}}"></script>
@endsection

