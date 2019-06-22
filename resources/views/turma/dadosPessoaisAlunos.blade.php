<form >
    <input type="hidden" id="co_seq_turma" value="{{ $dados['co_seq_turma']}}">
    <div class="form-group col-md-12">
        <label for="vagas" class="control-label">Nome: </label>
        <input type="text"  class="form-control" disabled
               value="{{$dados['usuaro'][0]->no_nome}}">
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-12">
        <label  class="control-label">E-mail: </label>
        <input type="text" class="form-control " disabled
               value="{{$dados['usuaro'][0]->email}}">
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label">Telefone: </label>
        <input type="text"  class="form-control phones" disabled
               value="{{$dados['usuaro'][0]->nu_telefone}}">
        <small class="help-block"></small>
    </div>
    <div class="form-group col-md-6">
        <label  class="control-label">Dt. Nascimento: </label>
        <input type="text"  class="form-control" disabled
               value="{{$dados['data']->formatarDataBR($dados['usuaro'][0]->dt_nascimento)}}">
        <small class="help-block"></small>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 form-group">
            <button type="button" class="btn btn-block btn-warning voltar">Voltar</button>
        </div>
    </div>
</form>
<script src="{{asset('assets/js/mascaras/mascaras.js')}}"></script>
<script>
  $(".voltar").click(function () {
    let co_seq_turma = $("#co_seq_turma").val();
    $.ajax({
      type: "get",
      url: "/modalMatriculados/"+co_seq_turma,
      beforeSend: function () {
        $('#myModal').modal('show');
        $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
      },
      success: function (dados) {
        $(".modal-title").html('Alunos Matrículados');
        $("#myModal").modal('show');
        $("#conteudoModal").html(dados);
      }
    });
  });


</script>