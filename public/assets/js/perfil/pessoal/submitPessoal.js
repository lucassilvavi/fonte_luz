 $("#formPessoal").on("submit", function() {
        submit('#formPessoal', function(validate) {
            if ($.parseJSON(validate).operacao) {
                location.reload();
            }
        });
    });
