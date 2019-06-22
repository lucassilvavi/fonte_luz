<form method="get" id="formDesativarCurso">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" id="co_seq_curso" name="co_seq_curso"
           value="{{$dados['co_seq_curso']}}">
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
<script src="{{asset('assets/js/curso/submitAtivarCurso.js')}}"></script>


