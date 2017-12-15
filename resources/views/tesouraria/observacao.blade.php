<form method="POST" action="{{action($dados['action'])}}" id="formObservacao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_controle_contribuicao" value="{{$dados['contribuicao']->co_seq_controle_contribuicao}}">
    <div class="form-group">
        <label for="comment">Observação:</label>
        <textarea class="form-control" name="observacao" maxlength="250" rows="5">{{$dados['contribuicao']->ds_observacao_financeiro}}</textarea>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger sair" id="sair">Sair</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success salvar">Salvar</button>
        </div>
    </div>
</form>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/tesouraria/submitObservacao.js')}}"></script>


