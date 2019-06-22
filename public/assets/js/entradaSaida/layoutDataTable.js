$(document).ready(function () {

    let tipoLancamento = document.querySelectorAll(".tipoLancamento");
    tipoLancamento.forEach(function (confirm) {
        let tr = confirm.parentNode;
        if (confirm.textContent == "Débito") {
            tr.classList.add("debito");
        } else {
            tr.classList.add("credito");
        }
    });
});