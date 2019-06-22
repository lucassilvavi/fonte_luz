<form method="POST" action="{{action($dados['action'])}}" id="formDesmatricular">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" id="co_seq_turma_usuario" name="co_seq_turma_usuario" value="{{ $dados['co_seq_turma_usuario']}}">
    <input type="hidden" name="id" value="{{ $dados['id']}}">
    <div class="form-group">
        <label for="motivo" class="control-label">* Motivo:</label><span class=""></span>
        <textarea type="text" class="form-control" name="motivo"></textarea>
        <small class="help-block"></small>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger sair">Sair</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>
        </div>
    </div>
</form>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/turma/submitDesmatricularHome.js')}}"></script>


