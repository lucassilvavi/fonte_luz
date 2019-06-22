<form method="POST" action="{{action($dados['action'])}}" id="formVincularAluno">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="co_seq_turma" value="{{ $dados['co_seq_turma']}}">

    <div class="row">
        <div class="col-md-6 form-group">
            <button type="button" class="btn btn-block btn-danger" id="sair">Sair</button>
        </div>
        <div class="col-md-6 form-group">
            <button type="submit" class="btn btn-block btn-success" id="salvar">Salvar</button>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped" id="tableVincularAluno" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th style="text-align: center" scope="col">Selecionar</th>
                <th scope="col">Usuario</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dados['alunos'] as  $aluno)
                <tr>
                    <td style="text-align: center"><input type="checkbox" name="usuarios[]" value="{{$aluno->id}}"></td>
                    <td>{{$aluno->no_nome}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</form>

<script>
    $('#sair').on('click', function () {
        $('.modal').modal('hide');
    });
</script>
<script src="{{asset('assets/js/turma/dataTableVincularAluno.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/submit.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/turma/submitVincularAluno.js')}}"></script>