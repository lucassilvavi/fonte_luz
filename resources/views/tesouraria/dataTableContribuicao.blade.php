<div class="row">
    <div class="form-group col-md-6">
        <button type="button" id="aprovarSelecionados" class="btn btn-success btn-sm btn-block">Aprovar Selecionados
        </button>
    </div>
    <div class="form-group col-md-6">
        <button type="button" id="reprovarSelecionados" class="btn btn-danger btn-sm btn-block">Reprovar Selecionados
        </button>
    </div>
</div>
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
            <td class="bordaTable">
                <input type="checkbox" class="caixa" name="controle_contribuicao[]"
                       value="{{$contribuicoe->co_seq_controle_contribuicao}}">
            </td>
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
                <button type="button" class="btn btn-xs btn-warning btn-block comprovante"
                        value="{{$contribuicoe->co_seq_controle_contribuicao}}">Comprovante
                </button>
                <button type="button" class="btn btn-xs btn-info btn-block observacao"
                        value="{{$contribuicoe->co_seq_controle_contribuicao}}">Observação
                </button>
                <button type="button" class="btn btn-xs btn-success btn-block confirma_contribuicao"
                        value="{{$contribuicoe->co_seq_controle_contribuicao}}">Confirmar Contribuição
                </button>
                <button type="button" class="btn btn-xs btn-danger btn-block reprovar_contribuicao"
                        value="{{$contribuicoe->co_seq_controle_contribuicao}}">Reprovar Contribuição
                </button>
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
<script src="{{asset('assets/js/tesouraria/modalReprovacao.js')}}"></script>
<script>
    $("#aprovarSelecionados").on('click', function () {
        var form = new Array();
        $("input[name='controle_contribuicao[]']:checked").each(function () {
            form.push($(this).val());
        });
        if (form == "") {
            MsgFaltaSelecionarContribuicao()
        } else {
            $.ajax({
                type: "post",
                data: {"form": form, "_token": "{{ csrf_token() }}"},
                url: "/tesouraria/saveAprovarSelecionados",

                success: function (dados) {
                    if (dados.operacao = true) {
                        MsgSucessoAprovacaoSelecionados();
                    } else {
                        MsgErroAprovacaoSelecionados();
                    }
                }
            });
        }
    });

    function MsgFaltaSelecionarContribuicao() {
        //// Override global options
        toastr.warning('Por favor selecione uma ou mais contribuições!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "3500",
            positionClass: 'toast-top-center'
        });
    }

    function MsgErroAprovacaoSelecionados() {
        //// Override global options
        toastr.error('Aconteceu um erro ao salvar a aprovação, por favor entre em contato com a equipe técnica!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "3500",
            positionClass: 'toast-top-center'
        });
    }

    function MsgSucessoAprovacaoSelecionados() {
// Override global options
        toastr.success('Contribuições Aprovadas com sucesso!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "2500",
            positionClass: 'toast-top-center'
        });
        setTimeout(function () {
            location.reload();
        }, 2500);
    }
</script>
<script>
    $("#reprovarSelecionados").on('click', function () {
        var form = new Array();
        $("input[name='controle_contribuicao[]']:checked").each(function () {
            form.push($(this).val());
        });
        if (form == "") {
            MsgFaltaSelecionarContribuicao()
        } else {
            $.ajax({
                type: "post",
                data: {"form": form, "_token": "{{ csrf_token() }}"},
                url: "/tesouraria/saveReprovacaoSelecionados",

                success: function (dados) {
                    if (dados.operacao = true) {
                        MsgSucessoReprovacaoSelecionados();
                    } else {
                        MsgErroReprovacaoSelecionados();
                    }
                }
            });
        }
    });

    function MsgFaltaSelecionarContribuicao() {
        //// Override global options
        toastr.warning('Por favor selecione uma ou mais contribuições!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "3500",
            positionClass: 'toast-top-center'
        });
    }

    function MsgErroReprovacaoSelecionados() {
        //// Override global options
        toastr.error('Aconteceu um erro ao salvar a reprovação, por favor entre em contato com a equipe técnica!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "3500",
            positionClass: 'toast-top-center'
        });
    }

    function MsgSucessoReprovacaoSelecionados() {
// Override global options
        toastr.success('Contribuições Reprovada com sucesso!', '', {
            closeButton: false,
            progressBar: true,
            timeOut: "3000",
            positionClass: 'toast-top-center'
        });
        setTimeout(function () {
            location.reload();
        }, 3000);
    }
</script>

