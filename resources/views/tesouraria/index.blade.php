<style>
    .bordaTable {
        border: 3px solid grey !important;
    }
</style>
@extends('layouts.principal')
@section('title','Tesouraria')
@section('content')
    <form method="POST" id="formContribuicao" action="{{action($dados['action'])}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="container form-group col-md-4">
            <fieldset>
                <legend>Classificação do Pagamento:</legend>
                <div class="checkbox">
                    <label><input type="checkbox" name="classificacaoPagamento[]" value="Pagamentos Validados">
                        Pagamentos Validados</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="classificacaoPagamento[]" value="Pendente de Validação">
                        Pendente de Validação</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="classificacaoPagamento[]" value="Pendente com Observação">
                        Pendente com Observação</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="classificacaoPagamento[]" value="Reprovado"> Reprovado</label>
                </div>
            </fieldset>
        </div>
        <div class="container">
            <div class="form-group col-md-2">
                <label for="periodeDe" class="control-label">* Periodo De: </label>
                <input type="text" class="form-control date" name="periodeDe" value="">
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-2">
                <label for="periodeAte" class="control-label">* Até: </label>
                <input type="text" class="form-control date" name="periodeAte" value="">
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-4">
                <label for="membro" class="control-label">Membros: </label>
                <select name="membro" class="form-control">
                    <option value=""></option>
                    @foreach( $dados['usuarios'] as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->no_nome}}</option>
                    @endforeach
                </select>
                <small class="help-block"></small>
            </div>
            <div class="form-group col-md-8">
                <button type="submit" class="btn btn-info btn-block">Pesquisar</button>
            </div>
        </div>
    </form>

    <div class="row resultadoBusca">
        <table id="tb_tesouraria" class="table table-bordered " cellspacing="0" width="100%">
            <thead class="bordaTable">
            <tr>
                <th>Ckeck</th>
                <th>Nome</th>
                <th>Mês Referencia</th>
                <th>Ano Referencia</th>
                <th>Valor Contribuição</th>
                <th>Data de Pagamento</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody class="bordaTable">
            <tr>
                <td class="bordaTable">[ ]</td>
                <td class="bordaTable">Marcelo da silva Cunha Pinheiro</td>
                <td class="bordaTable">1</td>
                <td class="bordaTable">2017</td>
                <td class="bordaTable">R$100,00</td>
                <td class="bordaTable">01/02/2017</td>
                <td class="bordaTable">Enviado Pra Administração</td>
                <td>
                    <button type="button" class="btn btn-xs btn-warning btn-block">Comprovante</button>
                    <button type="button" class="btn btn-xs btn-info btn-block">Obaservação</button>
                    <button type="button" class="btn btn-xs btn-success btn-block">Confirmar Contribuição</button>
                    <button type="button" class="btn btn-xs btn-danger btn-block">Reprovar Contribuição</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
    <script src="{{asset('assets/js/tesouraria/dataTableTesouraria.js')}}"></script>
    {{--<script src="{{asset('assets/js/submit.js')}}"></script>--}}

    {{--<script>--}}
        {{--$("#formContribuicao").on("submit", function () {--}}
            {{--submit('#formContribuicao', function (validate) {--}}
                {{--console.log(validate);--}}
            {{--});--}}
        {{--});--}}
    {{--// </script>--}}
@endsection

