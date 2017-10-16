<div class="row">
    <table id="tb_permissoes" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Perfis</th>
        </tr>
        </thead>
        <tbody>

        @foreach( $dados['perfis'] as $perfis)
            <tr>
                <td>{{$perfis->no_perfil}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="{{asset('assets/js/grupoPermissao/dataTableModalPermissoes.js')}}"></script>
