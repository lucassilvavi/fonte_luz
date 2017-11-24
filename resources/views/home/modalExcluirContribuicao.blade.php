<form method="get" id="formExcluirContribuicao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" id="co_seq_controle_contribuicao" name="co_seq_controle_contribuicao"
           value="{{$dados['co_seq_controle_contribuicao']}}">
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
<script src="{{asset('assets/js/home/submitExcluirContribuicao.js')}}"></script>


