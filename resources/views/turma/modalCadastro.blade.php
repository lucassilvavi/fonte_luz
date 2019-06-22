<form method="POST" action="{{action($dados['action'])}}" id="formCadTurma">
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group col-md-12">
        <label for="curso" class="control-label">* Nome curso: </label>
        <select name="curso" class="form-control">
            @foreach($dados['cursos'] as $curso)
                <option value="{{$curso->co_seq_curso}}">{{$curso->no_curso}}</option>
            @endforeach
        </select>
        <small class="help-block"></small>
    </div>

    <div class="form-group col-md-6">
        <label for="vagas" class="control-label">* Nº Vagas: </label>
        <input type="number" id="vagas" class="form-control" name="vagas"
               value="">
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-6">
        <label for="fechamento" class="control-label">* Dt. Fechamento: </label>
        <input type="text" id="fechamento" class="form-control date" name="fechamento"
               value="">
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

<script src="{{asset('assets/js/turma/submitCadastro.js')}}"></script>



