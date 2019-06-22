<form method="get" id="formExcluirPerfil">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="idUsuario" id="idUsuario" value="{{$idUsuario}}">
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-danger sair">Sair</button>
        </div>
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>

        </div>
    </div>
</form>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    {{ csrf_field() }}
</form>
<script>
    $('.sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/perfil/pessoal/submitExluirPerfil.js')}}"></script>


