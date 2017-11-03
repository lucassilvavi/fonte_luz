@extends('layouts.principal')

@section('title','Home')
@section('title-form','Abas')

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
                <td>sdef</td>
                <td>efef</td>
                <td>efefef</td>
                <td>ef</td>
                <td>efef</td>
                <td>efef</td>
                <td>efefef</td>
            </tr>

        </tbody>
    </table>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/home/dataTableHome.js')}}"></script>
@endsection
