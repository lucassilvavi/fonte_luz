<div class="row">
    <input type="hidden" id="co_seq_controle_contribuicao" value="{{$dados}}">
    <div class="col-md-6 col-md-offset-0 form-group">
        <button type="button" class="btn btn-block btn-danger sair" id="sair">Não</button>
    </div>
    <div class="col-md-6 col-md-offset-0 form-group">
        <button type="submit" class="btn btn-block btn-success sim">Sim</button>
    </div>
</div>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/tesouraria/submitConfirmaContribuicao.js')}}"></script>
