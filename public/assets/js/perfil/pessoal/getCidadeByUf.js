$(document).ready(function () {
    var estado = $("#uf");
    var selecionado = $('#cidade :selected').text();
    if(selecionado == ''){
        $('#cidade').attr('disabled', true);
    }
    estado.change(function () {
        if(estado.val() == ''){
            $('#cidade').empty();
            $('#cidade').attr('disabled', true);
        }else {
            $('#cidade').empty();
            $.ajax({
                type: "get",
                url: "/getCidade/" + estado.val(),
                beforeSend: function () {
                },
                success: function (data) {
                    $('#cidade').attr('disabled', false);
                    for (var i = 0, len = data.length; i < len; ++i) {
                        $('#cidade').append('<option value="' + data[i]['co_seq_cidade'] + '">' + data[i]['no_cidade'] + '</option>');
                    }
                }
            });
        }
    });
});