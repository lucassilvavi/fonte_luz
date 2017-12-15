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
    @foreach(  $dados['contribuicoes'] as $contribuicoe)

        <tr>
            <td class="bordaTable">[ ]</td>
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
                <button type="button" class="btn btn-xs btn-warning btn-block comprovante" value="{{$contribuicoe->co_seq_controle_contribuicao}}">Comprovante</button>
                <button type="button" class="btn btn-xs btn-info btn-block observacao" value="{{$contribuicoe->co_seq_controle_contribuicao}}">Observação</button>
                <button type="button" class="btn btn-xs btn-success btn-block confirma_contribuicao" value="{{$contribuicoe->co_seq_controle_contribuicao}}">Confirmar Contribuição</button>
                <button type="button" class="btn btn-xs btn-danger btn-block reprovar_contribuicao" value="{{$contribuicoe->co_seq_controle_contribuicao}}">Reprovar Contribuição</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script src="{{asset('assets/js/tesouraria/dataTableTesouraria.js')}}"></script>
<script src="{{asset('assets/js/tesouraria/modalContribuicao.js')}}"></script>
<script src="{{asset('assets/js/tesouraria/modalObservacao.js')}}"></script>
<script src="{{asset('assets/js/tesouraria/modalConfirmaContribuicao.js')}}"></script>
<script>
    $("#tb_tesouraria ").on( 'click', '.reprovar_contribuicao', function () {
        var co_seq_controle_contribuicao = $(this).val();
        $.ajax({
            type: "get",
            url: "/tesouraria/formReprovaContribuicao/"+co_seq_controle_contribuicao,
            beforeSend: function() {
                $('#myModal').modal('show');
                $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
            },
            success: function(dados)
            {
                $(".modal-title").html('Deseja reprovar está contribuição ?');
                $("#myModal").modal('show');
                $("#conteudoModal").html(dados);
            }
        });
    });
</script>
