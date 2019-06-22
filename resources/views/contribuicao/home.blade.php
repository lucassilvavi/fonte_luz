<style>
    .confirmaPagamento {
        background-color: #DCDCDC !important;
    }
    

    .confirmadoPagamento {
        background-color: #90EE90 !important;
    }

    .bordaTable {
        border: 3px solid grey !important;
    }
</style>
@extends('layouts.principal')
@section('title','Contribuição')
@section('content')
    <table id="tb_home" class="table table-bordered " cellspacing="0" width="100%">
        <thead class="bordaTable">
        <tr>
            <th>Mês de Referência</th>
            <th>Ano de Referência</th>
            <th>Valor Contribuição</th>
            <th>Data de Pagamento</th>
            <th>Status</th>
            <th>Opcões</th>
        </tr>
        </thead>
        <tbody class="bordaTable">

        @foreach( $dados['contribuicoes']  as $contribuicoe)
            <tr>
                <td>{{$contribuicoe->nu_mes}}</td>
                <td>{{$contribuicoe->nu_ano}}</td>
                <td>{{JansenFelipe\Utils\Utils::moeda($contribuicoe->vl_contribuicao_mes)}}</td>
                <td>{{date("d/m/Y", strtotime($contribuicoe->dt_contribuicao))}}</td>
                <td class="confirmacao">{{empty($contribuicoe->dt_confirmacao_financeiro)  ? "Enviado Pra Administração":"Pago"}}</td>
                <td style="text-align: center;">
                    <button type="button" class="btn btn-info btn-xs editarContribuicao"
                            value="{{$contribuicoe->co_seq_controle_contribuicao}}">Editar
                    </button>
                    <button type="button" class="btn btn-warning btn-xs edtComprovantes"
                            value="{{$contribuicoe->co_seq_controle_contribuicao}}">Comprovantes
                    </button>
                    <button type="button" class="btn btn-danger btn-xs excluirContribuicao"
                            value="{{$contribuicoe->co_seq_controle_contribuicao}}">Excluir Contribuição
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

    <script src="{{asset('assets/js/contribuicao/dataTableHome.js')}}"></script>
    <script src="{{asset('assets/js/contribuicao/layoutDataTable.js')}}"></script>
    <script src="{{asset('assets/js/contribuicao/modalCadastroContribuicao.js')}}"></script>
    <script src="{{asset('assets/js/contribuicao/editarContribuicao.js')}}"></script>
    <script src="{{asset('assets/js/contribuicao/editarComprovante.js')}}"></script>
    <script>
        $("#tb_home ").on('click', '.excluirContribuicao', function () {
            let co_seq_controle_contribuicao = $(this).val();
            $.ajax({
                type: "get",
                url: "/formExcluirContribuicao/"+co_seq_controle_contribuicao,
                beforeSend: function() {
                    $('#myModal').modal('show');
                    $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
                },
                success: function(dados)
                {
                    $(".modal-title").html('Deseja realmente excluir está contribuição ?');
                    $("#myModal").modal('show');
                    $("#conteudoModal").html(dados);
                }
            });
        });

    </script>
@endsection

