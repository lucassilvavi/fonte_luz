$(document).ready(function () {
    $('#cidade').attr('disabled', true);
    var estado = $("#uf");
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
                        $('#cidade').append('<option value="' + data[i]['CO_SEQ_CIDADE'] + '">' + data[i]['NO_CIDADE'] + '</option>');
                    }
                }
            });
        }
    });
});