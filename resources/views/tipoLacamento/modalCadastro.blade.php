<form method="POST" action="{{action($dados['action'])}}" id="formCadTipoLancamento">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_tipo_lancamento"
           value="{{$dados['tipoLancamento']->co_seq_tipo_lancamento ?? ""}}">
    <div class="form-group">
        <label for="no_tipo_lancamento" class="control-label">* Tipo Lançamento: </label>
        <input type="text" class="form-control" name="no_tipo_lancamento"
               value="{{$dados['tipoLancamento']->no_tipo_lancamento ?? ""}}">
        <small class="help-block"></small>
    </div>
    <div class="form-group">
        <label for="ds_tipo_lancamento" class="control-label">* Descrição:</label><span class=""></span>
        <textarea type="text" class="form-control"
                  name="ds_tipo_lancamento">{{trim($dados['tipoLancamento']->ds_tipo_lancamento ?? "")}}</textarea>
        <small class="help-block"></small>
    </div>
    <div class="form-group">
        <label for="st_ativo" class="control-label">* Ativo: </label>
        <select name="st_ativo" class="form-control">
            <option {{isset($dados['tipoLancamento']->st_ativo) && $dados['tipoLancamento']->st_ativo === "S" ? 'selected': ""}}  value="S">
                Sim
            </option>
            <option {{isset($dados['tipoLancamento']->st_ativo) && $dados['tipoLancamento']->st_ativo === "N" ? 'selected': ""}} value="N">
                Não
            </option>
        </select>
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

<script src="{{asset('assets/js/tipoLancamento/submitCadastrar.js')}}"></script>


