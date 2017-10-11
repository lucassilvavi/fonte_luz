<form action="{{action( $dados['action'])}}" method="POST" id="formModalDesableGrupo">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_grupo_permissoes" value="{{  $dados['co_seq_grupo_permissoes']}}">
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger" id="sair">Sair</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>
        </div>
    </div>
</form>
<script>
    $('#sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/grupoPermissao/submitDesableGrupo.js')}}"></script>