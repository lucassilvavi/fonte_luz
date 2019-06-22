<form method="POST" action="{{$dados['action']}}" id="formReprovarContribuicao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <input type="hidden" name="co_seq_controle_contribuicao" value="{{$dados['co_seq_controle_contribuicao']}}">
        <div class="col-md-12">
            <label for="comment">Motivo da Reprovação:</label>
            <textarea class="form-control" name="motivo" maxlength="250" rows="5"></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger sair" id="sair">Não</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvar">Sim</button>
        </div>
    </div>
</form>
<script>
  $('.sair').on('click', function () {
    $('.modal').modal('hide')
  })
</script>
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/tesouraria/submitReprovaContribuicao.js')}}"></script>
