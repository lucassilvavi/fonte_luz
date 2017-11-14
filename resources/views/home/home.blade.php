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
            <th>Comprovantes</th>
            <th>Opcões</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>07</td>
                <td>2017</td>
                <td>R$ 100,00</td>
                <td>25/10/2017</td>
                <td>Ativa</td>
                <td style="text-align: center;">
                    <button type="button" class="btn btn-link"><i class="fa fa-file-text fa-lg" aria-hidden="true">
                        </i></button></td>
                <td style="text-align: center;">
                    <button type="button" class="btn btn-warning btn-xs detalhes">Editar</button>
                    <button type="button" class="btn  btn-info btn-xs detalhes">Incluir Comprovante</button>
                    <button type="button" class="btn  btn-danger btn-xs detalhes">Excluir Comprovante</button>
                    <button type="button" class="btn  btn-danger btn-xs detalhes">Excluir Contribuição</button>

                </td>
            </tr>
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
@endsection

