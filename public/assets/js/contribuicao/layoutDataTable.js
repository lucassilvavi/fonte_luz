$(document).ready(function () {

    let confirmacao = document.querySelectorAll(".confirmacao");
    confirmacao.forEach(function (confirm) {
        let tr = confirm.parentNode;
        if (confirm.textContent == "Enviado Pra Administração") {
            tr.classList.add("confirmaPagamento");
        } else {
            tr.classList.add("confirmadoPagamento");
        }
    });
});