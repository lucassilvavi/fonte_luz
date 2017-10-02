 $('#formPessoal').on("submit", function() {
        submit('#formPessoal', function(validate) {
            $('#btnSalvarPessoal').attr('disabled', true);
            if ($.parseJSON(validate).operacao) {
                MsgSucessoPessoal();
            }else {
                MsgErroPessoal();
            }
        });
    });
 function MsgSucessoPessoal() {
// Override global options
     toastr.success('Dados alterados com sucesso!', '', {
         closeButton: false,
         progressBar: true,
         timeOut: "2500",
         positionClass: 'toast-top-center'
     });
     setTimeout(function () {
         location.reload();
     }, 2500);
 }
 function MsgErroPessoal() {
// Override global options
     toastr.warning('Erro ao alterar dados pessoais, por favor entre em contato a equipe técnica!', '', {
         closeButton: false,
         progressBar: true,
         timeOut: "2500",
         positionClass: 'toast-top-center'
     });
     setTimeout(function () {
         location.reload();
     }, 2500);
 }