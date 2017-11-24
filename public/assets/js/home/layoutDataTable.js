$(document).ready(function () {

    var confirmacao = document.querySelectorAll(".confirmacao");
    confirmacao.forEach(function (confirm) {
        var tr = confirm.parentNode;
        if (confirm.textContent == "Enviado Pra Administração") {
            tr.classList.add("confirmaPagamento");
        } else {
            tr.classList.add("confirmadoPagamento");
        }
    });
});