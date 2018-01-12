<style>
    .bordaTable {
        border: 3px solid grey !important;
    }
</style>
<table id="tb_deposito" class="table table-bordered " cellspacing="0" width="100%">
    <thead class="bordaTable">
    <tr>
        <th>Nome</th>
        <th>Mês Referencia</th>
        <th>Ano Referencia</th>
        <th>Valor Contribuição</th>
        <th>Data de Pagamento</th>
        <th>Status</th>
        <th>Tipo Pagamento</th>

    </tr>
    </thead>
    <tbody class="bordaTable">
    @foreach($dados['resultado'] as $contribuicoe)
        <tr>
            <td class="bordaTable">{{$contribuicoe->no_nome}}</td>
            <td class="bordaTable">{{$contribuicoe->nu_mes}}</td>
            <td class="bordaTable">{{$contribuicoe->nu_ano}}</td>
            <td class="bordaTable">{{JansenFelipe\Utils\Utils::moeda($contribuicoe->vl_contribuicao_mes)}}</td>
            <td class="bordaTable">{{date("d/m/Y", strtotime($contribuicoe->dt_contribuicao))}}</td>
            <td class="bordaTable">
                @if(!empty($contribuicoe->dt_confirmacao_financeiro))
                    Pagamentos Validados
                @elseif(!empty($contribuicoe->dt_reprovacao_financeiro))
                    Reprovado
                @elseif(empty($contribuicoe->dt_confirmacao_financeiro) && empty($contribuicoe->dt_reprovacao_financeiro))
                    Pendente de Validação
                @elseif(empty($contribuicoe->dt_confirmacao_financeiro) && $contribuicoe->ds_observacao_financeiro)
                    Pendente com Observação
                @endif
            </td>
            <td class="bordaTable">
                @if($contribuicoe->tp_contribuicao == 1)
                    Deposito Bancario
                @else($contribuicoe->tp_contribuicao)
                    Via Gaveta(Fonte Luz)
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script src="{{asset('assets/js/tipoContribuicao/dataTableDeposito.js')}}"></script>