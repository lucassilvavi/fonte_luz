$("#reprovarSelecionados").on('click', function () {

  let form = new Array();

  $("input[name='controle_contribuicao[]']:checked").each(function () {
    form.push($(this).val());
  });
  if (form == "") {
    MsgFaltaSelecionarContribuicao()
  }else{
    $.ajax({
      type: "get",
      url: "/tesouraria/formReprovaContribuicaoSelecionados/" + JSON.stringify(form),
      beforeSend: function () {
        $('#myModal').modal('show');
        $('#conteudoModal').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>').show();
      },
      success: function (dados) {
        $(".modal-title").html('Deseja reprovar estas contribuição ?');
        $("#myModal").modal('show');
        $("#conteudoModal").html(dados);
      }
    });
  }

});