function excluir(co_comprovante) {
    $.ajax({
        type: "get",
        url: "/excluirComprovante/" + co_comprovante,
        beforeSend: function () {
        },
        success: function (data) {
            var inputs = document.getElementsByName("comprovante[]");
            inputs.forEach(function (input) {
                if (input.value == co_comprovante) {
                    var td = input.parentNode;
                    td.parentNode.innerHTML = "";
                }
            })
        }
    });
}