$(document).ready(function () {
    $("#pesquisar").click(function () {
        let nt_turma = $('#nt_turma').val();
        let tp_curso = $('#tp_curso').val();

        window.location.replace("/turmas/" + nt_turma + '/' + tp_curso)

    });
});
