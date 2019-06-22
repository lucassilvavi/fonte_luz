<form method="POST" action="{{action($dados['action'])}}" id="formCadEntradaSaida">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_financeiro" value="{{$dados['financeiro']->co_seq_financeiro ?? ""}}">
    <div class="form-group">
        <label for="tpLancamento" class="control-label">* Tipo do Lançamento: </label>
        <select name="tpLancamento" class="form-control">
            @foreach( $dados['tipoLanc'] as $tipoLanc)
                <option @if(isset($dados['financeiro']->co_tipo_lancamento) && $dados['financeiro']->co_tipo_lancamento == $tipoLanc->co_seq_tipo_lancamento) selected
                        @endif value="{{$tipoLanc->co_seq_tipo_lancamento}}">{{$tipoLanc->no_tipo_lancamento}}</option>
            @endforeach
        </select>
        <small class="help-block"></small>
    </div>
    <div class="form-group">
        <label for="ntLancamento" class="control-label">* Natureza do Lançamento: </label>
        <select name="ntLancamento" class="form-control">
            <option @if(isset($dados['financeiro']->tipo_lancamento) && $dados['financeiro']->tipo_lancamento== "C") selected
                    @endif value="C">Crédito
            </option>
            <option @if(isset($dados['financeiro']->tipo_lancamento) && $dados['financeiro']->tipo_lancamento == "D") selected
                    @endif  value="D">Débito
            </option>
        </select>
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-6">
        <label for="dtLiquidacao" class="control-label">* Data de Liquidação: </label>
        <input type="text" id="dt_liquidacao" class="form-control date" name="dtLiquidacao"
               value="{{isset($dados['financeiro']->dt_liquidacao) ? $dados['data']->formatarDataBR($dados['financeiro']->dt_liquidacao) :""}}">
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-6">
        <label for="mes" class="control-label">* Mês de referência: </label>
        <select name="mes" class="form-control">
            @foreach( $dados['meses'] as $k=>$mes)
                <option @if(isset($dados['financeiro']->mes_referencia) && $dados['financeiro']->mes_referencia == $k) selected
                        @endif value="{{$k}}">{{$mes}}</option>
            @endforeach
        </select>
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-6">
        <label for="ano" class="control-label">* Ano de referência: </label>
        <select name="ano" class="form-control">
            @foreach( $dados['anos'] as $ano)
                <option @if(isset($dados['financeiro']->ano_referencia) && $dados['financeiro']->ano_referencia == $ano)
                        selected
                        @else
                        @if($ano == date('Y'))
                        selected
                        @endif
                        @endif value="{{$ano}}">{{$ano}}</option>
            @endforeach
        </select>
        <small class="help-block"></small>
    </div>

    <div class="form-group col-md-6">
        <label for="valor" class="control-label">* Valor do Lançamento: </label>
        <input type="text" class="form-control money" name="valor"
               value="{{$dados['financeiro']->valor ?? "" }}">
        <small class="help-block"></small>
    </div>
    <div class="form-group">
        <label for="descricao" class="control-label">* Descrição:</label><span class=""></span>
        <textarea type="text" class="form-control" rows="4" cols="50" maxlength="2000"
                  name="descricao">{{trim($dados['financeiro']->descricao ?? "")}}</textarea>
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

<script src="{{asset('assets/js/entradaSaida/submitCadastro.js')}}"></script>


