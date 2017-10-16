<form action="{{action($dados['action'])}}" method="POST" id="formVincularPermissao">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="perfil" value="{{ $dados['co_perfil'] }}">
    <div class="row">
        <div class="form-group col-lg-12">
            @foreach( $dados['co_permissoes'] as $permissoes)
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" name="permissoes[]"
                           @if(count($dados['rlPerfilPermissoesRepository']->getPerfilVinculadoAPermissao($permissoes['co_seq_permissoes'], $dados['co_perfil'])) >= 1)
                           checked @endif
                           value="{{$permissoes['co_seq_permissoes']}}"> {{$permissoes['no_permissao']}}
                </label>
            @endforeach
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
<script src="{{asset('assets/js/submit.js')}}"></script>
<script src="{{asset('assets/js/perfilUsuario/submitModalVincularPermissoes.js')}}"></script>
