<form action="{{action($dados['action'])}}" method="POST" id="formEditIsencaoContribuicao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_isencao_contribuicao" value="{{$dados['co_seq_isencao_contribuicao'] }}">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="deMes" class="control-label">* De Mês: </label>
            <select name="deMes" class="form-control">
                @foreach($dados['meses'] as $k=> $mes)
                    <option @if($dados['demes'] === $k) selected @endif value="{{($k)}}">{{$mes}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-5">
            <label for="deAno" class="control-label">* De Ano: </label>
            <select name="deAno" class="form-control">
                @foreach(  $dados['anos'] as $anos)
                    <option @if($dados['deano'] === $anos) selected @endif value="{{$anos}}">{{$anos}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-5">
            <label for="ateMes" class="control-label">Até Mês: </label>
            <select name="ateMes" class="form-control">
                <option value=""></option>
                @foreach($dados['meses'] as $k=> $mes)
                    <option @if($dados['atemes'] == $k) selected @endif value="{{($k)}}">{{$mes}}</option>
                @endforeach

            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-md-5">
            <label for="ateAno" class="control-label">Até Ano: </label>
            <select name="ateAno" class="form-control">
                <option value=""></option>
                @foreach(  $dados['anos'] as $anos)
                    <option @if($dados['ateano'] === $anos) selected @endif value="{{$anos}}">{{$anos}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>

        <div class="form-group col-md-10">
            <label for="membro" class="control-label">* Membro: </label>
            <select name="membro" class="form-control">
                <option value=""></option>
                @foreach($dados['usuario'] as $usuario)
                    <option @if($dados['isencao']->id_usuario == $usuario->id) selected @endif value="{{$usuario->id}}">{{$usuario->no_nome}}</option>
                @endforeach
            </select>
            <small class="help-block"></small>
        </div>
        <div class="form-group col-xs-12">
            <label for="motivo" >Motivo:</label>
            <textarea class="form-control" name="motivo"  maxlength="150" >{{trim($dados['isencao']->ds_observacao)}}</textarea>
            <small class="help-block"></small>
        </div>
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
<script src="{{asset('assets/js/isencaoContribuicao/submitEditarIsencaoContribuicao.js')}}"></script>
