<style>
    .classificacao-pagamento {
        border-top-style: dotted;
        border-right-style: solid;
        border-bottom-style: dotted;
        border-left-style: solid;
    }
    .bordaTable {
        border: 3px solid grey !important;
    }
</style>
@extends('layouts.principal')
@section('title','Tesouraria')
@section('content')
    <div class="container classificacao-pagamento form-group col-md-4">
        <form>
            <fieldset>
                <legend>Classificação do Pagamento:</legend>
                <label class="checkbox">
                    <input type="radio" name="optradio">Pagamentos Validados
                </label>
                <label class="checkbox">
                    <input type="radio" name="optradio">Pendente de Validação
                </label>
                <label class="checkbox">
                    <input type="radio" name="optradio">Pendente com Observação
                </label>
                <label class="checkbox">
                    <input type="radio" name="optradio">Reprovado
                </label>
            </fieldset>
        </form>
    </div>
    <div class="container">
        <div class="form-group col-md-2">
            <label for="demesperiodo" class="control-label">* De Mês Contribuição: </label>
            <select name="demesperiodo" class="form-control">
                <option value=""></option>
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-2">
            <label for="deanoperiodo" class="control-label">* De Ano Contribuição: </label>
            <select name="deanoperiodo" class="form-control">
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-2">
            <label for="demesperiodo" class="control-label">* Até Mês Contribuição: </label>
            <select name="demesperiodo" class="form-control">
                <option value=""></option>
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-2">
            <label for="deanoperiodo" class="control-label">* Até Ano Contribuição: </label>
            <select name="deanoperiodo" class="form-control">
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-8">
            <button type="button" class="btn btn-info btn-block">Pesquisar</button>
        </div>
    </div>
    <div class="row">
        <table id="tb_tesouraria" class="table table-bordered " cellspacing="0" width="100%">
            <thead  class="bordaTable">
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
            <tbody  class="bordaTable">
            <tr>
                <td class="bordaTable">[ ]</td>
                <td  class="bordaTable">Marcelo da silva Cunha Pinheiro</td>
                <td  class="bordaTable">1</td>
                <td  class="bordaTable">2017</td>
                <td  class="bordaTable">R$100,00</td>
                <td  class="bordaTable">01/02/2017</td>
                <td  class="bordaTable">Enviado Pra Administração</td>
                {{--<td style="text-align: center;">--}}
                    {{--<button type="button" class="btn btn-warning btn-xs editarContribuicao"--}}
                            {{-->Comprovante--}}
                    {{--</button>--}}
                    {{--<button type="button" class="btn btn-info btn-xs edtComprovantes"--}}
                            {{-->Obaservação--}}
                    {{--</button>--}}
                    {{--<button type="button" class="btn btn-success btn-xs excluirContribuicao"--}}
                          {{-->Confirmar Contribuição--}}
                    {{--</button>--}}
                    {{--<button type="button" class="btn btn-danger btn-xs excluirContribuicao"--}}
                    {{-->Reprovar Contribuição--}}
                    {{--</button>--}}
                {{--</td>--}}
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
    <script src="{{asset('assets/js/tesouraria/dataTableTesouraria.js')}}"></script>
@endsection

