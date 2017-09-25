$("#formTrabalho").on("submit", function() {
    submit('#formTrabalho', function(validate) {
        console.log(validate);
        if ($.parseJSON(validate).operacao) {

        }
    });
});
