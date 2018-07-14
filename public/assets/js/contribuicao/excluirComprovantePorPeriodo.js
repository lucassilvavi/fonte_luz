function excluir(co_comprovante) {
    $.ajax({
        type: "get",
        url: "/excluirComprovante/" + co_comprovante,
        beforeSend: function () {
        },
        success: function (data) {
            let inputs = document.getElementsByName("comprovante[]");
            inputs.forEach(function (input) {
                if (input.value == co_comprovante) {
                    let td = input.parentNode;
                    td.parentNode.innerHTML = "";
                }
            });
        }
    });
}