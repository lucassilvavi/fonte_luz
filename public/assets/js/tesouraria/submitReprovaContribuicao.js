$('#formReprovarContribuicao').on('submit', function (e) {
  $('#salvar').prop('disabled', true)
  submit(e, '#formReprovarContribuicao', function (validate) {

    if (validate.operacao === false) {
      $('#salvar').prop('disabled', false)
      MsgErroEditar()
    }
    else if (validate.operacao === true) {
      MsgSucessoReprovada()
      let tds = document.querySelectorAll('.confirma_contribuicao')
      if (validate.id == 'varios') {
        setTimeout(function () {
          location.reload();
        }, 2499)
      }else
      {
        tds.forEach(function (td) {
          td.value
          if (td.value == validate.id) {
            let tr = td.parentNode.parentNode
            tr.innerHTML = ''
          }
        })
      }

    }
    else {
      $('#salvar').prop('disabled', false)
    }

  })
})

function MsgSucessoReprovada () {
// Override global options
  toastr.success('Contribuição reprovada com sucesso!', '', {
    closeButton: false,
    progressBar: true,
    timeOut: '2500',
    positionClass: 'toast-top-center',
  })
  setTimeout(function () {
    $('.modal').modal('hide')
  }, 2500)
}