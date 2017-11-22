@extends('layouts.principal')
@section('title','Home')
@section('content')
    <table id="tb_home" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Mês de Referência</th>
            <th>Ano de Referência</th>
            <th>Valor Contribuição</th>
            <th>Data de Pagamento</th>
            <th>Status</th>

            <th>Opcões</th>
        </tr>
        </thead>
        <tbody>

        @foreach( $dados['contribuicoes']  as $contribuicoe)
            <tr>
                <td>{{$contribuicoe->nu_mes}}</td>
                <td>{{$contribuicoe->nu_ano}}</td>
                <td>{{JansenFelipe\Utils\Utils::moeda($contribuicoe->vl_contribuicao_mes)}}</td>
                <td>{{date("d/m/Y", strtotime($contribuicoe->dt_contribuicao))}}</td>
                <td>{{empty($contribuicoe->dt_confirmacao_financeiro)  ? "Enviado Pra Administração":"Pago"}}</td>
                <td style="text-align: center;">
                    <button type="button"  class="btn btn-info btn-xs editarContribuicao" value="{{$contribuicoe->co_seq_controle_contribuicao}}">Editar</button>
                    <button type="button"  class="btn btn-warning btn-xs incluir">Comprovantes</button>
                    <button type="button"  class="btn btn-danger btn-xs incluir">Excluir Contribuição</button>
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
    @push('scripts')
    @endpush
    <script src="{{asset('assets/js/home/dataTableHome.js')}}"></script>
    <script src="{{asset('assets/js/home/modalCadastroContribuicao.js')}}"></script>
    <script>
        $(".editarContribuicao").click(function () {
            var co_seq_controle_contribuicao = $(this).val();
            $.ajax({
                type: "get",
                url: "/formEditarContribuicao/"+co_seq_controle_contribuicao,
                beforeSend: function() {
                    $('#myModal').modal('show');
                    $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
                },
                success: function(dados)
                {
                    $(".modal-title").html('Editar Contribuição');
                    $("#myModal").modal('show');
                    $("#conteudoModal").html(dados);
                }
            });


        });
    </script>
@endsection

