<div class="row">
    <table id="tb_permissoes" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Permissões</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $dados['permissoes'] as $permissao)
        <tr>
            <td>{{$permissao->no_permissao}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<script src="{{asset('assets/js/grupoPermissao/dataTableModalPermissoes.js')}}"></script>
