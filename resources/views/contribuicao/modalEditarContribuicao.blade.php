<form method="POST" action="{{action($dados['action'])}}" id="formEditarContribuicao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_controle_contribuicao" value="{{ $dados['contribuicao']->co_seq_controle_contribuicao}}">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="demes" class="control-label">* Mês Contribuição: </label>
            <select name="demes" class="form-control">
                <option value=""></option>
                @foreach($dados['meses'] as $k=> $mes)
                    <option @if($dados['contribuicao']->nu_mes == $k) selected @endif value="{{($k)}}">{{$mes}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-5">
            <label for="anoMes" class="control-label">* Ano Contribuição: </label>
            <select name="anoMes" class="form-control">
                @foreach(  $dados['anos'] as $anos)
                    <option @if($dados['contribuicao']->nu_ano == $anos) selected
                            @endif value="{{$anos}}">{{$anos}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <label for="dtdepositomes" class="control-label">* Data do Depósito: </label>
            <input type="text" class="form-control date" name="dtdepositomes"
                   value="{{date("d/m/Y", strtotime($dados['contribuicao']->dt_contribuicao))}}">
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-5">
            <label for="vlcontribuicaomes" class="control-label">* Valor da Contribuição
                Mensal: </label>
            <input type="text" class="form-control money" name="vlcontribuicaomes"
                   value="{{JansenFelipe\Utils\Utils::moeda($dados['contribuicao']->vl_contribuicao_mes,"")}}">
            <small class="help-block"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger sair" id="sair">Sair</button>
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
    $('.close').remove();
</script>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/contribuicao/submitEditarContribuicao.js')}}"></script>



