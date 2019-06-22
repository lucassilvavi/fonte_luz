<div class="row">
    <input type="hidden" class="co_seq_turma_usuario" value="{{$dados['usuarios'][0]->co_seq_turma_usuario or ""}}">
    <input type="hidden" class="co_seq_turma" value="{{ $dados['co_seq_turma'] or ""}}">

    <table class="table table-striped" style="text-align: center" id="tableMatriculados" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th scope="col" style="text-align: center">Número</th>
            <th scope="col" style="text-align: center">Usuario</th>
            <th scope="col" style="text-align: center">Opções</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dados['usuarios'] as $k=> $usuario)
            <tr>
                <td>{{$k + 1}}</td>
                <td>{{$usuario->no_nome}}</td>
                <td>
                    <button type="button" class="btn btn-block btn-danger btn-xs desmatricular"
                            value="{{$usuario->id}}">Desmatricular
                    </button>
                    <button type="button" class="btn btn-block btn-info btn-xs dadosAluno"
                            value="{{$usuario->id}}">Dados do Aluno
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="{{asset('assets/js/turma/dataTableMatriculados.js')}}"></script>
<script src="{{asset('assets/js/turma/submitDesmatricular.js')}}"></script>
<script>
  $('.dadosAluno').on('click', function () {

    let idUsuario = $(this).val();
    let co_seq_turma = $(".co_seq_turma").val();

    $.ajax({
      type: 'get',
      url: '/getDadosUsuarioImportante/' + idUsuario+'/'+co_seq_turma,
      beforeSend: function () {
      },
      success: function (dados) {

        $('.modal-title').html('Dados pessoais do aluno')
        $('#myModal').modal('show')
        $('#conteudoModal').html(dados)
      },
    })
  })
</script>