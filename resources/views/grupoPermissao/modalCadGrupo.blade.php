<form action="{{action($dados['action'])}}" method="POST" id="formGrupoPermissao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="nome" class="control-label">* Nome Grupo: </label>
        <input type="text" class="form-control" name="nome" value="">
        <small class="help-block"></small>
    </div>
    <div class="form-group">
        <label for="nome" class="control-label">* Descrição Grupo: </label>
        <input type="text" class="form-control" name="descricao_grupo" value="">
        <small class="help-block"></small>
    </div>
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
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/grupoPermissao/submitFormCadastroGrupo.js')}}"></script>