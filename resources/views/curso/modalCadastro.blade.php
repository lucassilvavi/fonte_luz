<form method="POST" action="{{action($dados['action'])}}" id="formCadCurso">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_curso" value="{{$dados['curso']->co_seq_curso or ""}}">

    <div class="form-group">
        <label for="notipolancamento" class="control-label">* Nome Curso: </label>
        <input type="text" class="form-control" name="notipolancamento"
               value="{{$dados['curso']->no_curso or ""}}">
        <small class="help-block"></small>
    </div>
    <div class="form-group">
        <label for="dstipolancamento" class="control-label">* Ementa Curso:</label><span class=""></span>
        <textarea type="text" class="form-control"
                  name="dstipolancamento">{{$dados['curso']->ds_ementa_curso or ""}}</textarea>
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
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/curso/submitCad.js')}}"></script>



