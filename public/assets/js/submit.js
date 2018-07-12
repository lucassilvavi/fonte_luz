$(document).ready(function() {
    $('input, select, textArea').change(function() {
        $(this).val($.trim($(this).val()));
        limpaError(this);
    });
});

function submit(event, form, callback) {
    $("submit").prop("disabled", true);
    event.preventDefault();
    limpaError(this);
    var action = $(form).attr("action");
    var dataForm = $(form).serialize();


    $.ajax({
        type: "POST",
        url: action,
        data: dataForm,
        beforeSend: function()
        {
            $(":submit").prop("disabled", true);
            $('#load').html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:blue;"></i>');
        },
        success: function(data)
        {

            try {
                $('#load').html('Salvar');
                if (Object.values($.parseJSON(data))[0] !== true) {
                    $("submit").prop("disabled", false);
                    error(data);
                    callback(false);
                } else {
                    callback(data);
                }
            } catch (e) {
                callback(data);
            }

        }
    });


}

function error(data)
{
    try {
        var obj = $.parseJSON(data);
        for (var i in obj) {

            var fieldName = Object.keys($.parseJSON(obj[i]
                .replace(/[' ']/g, '_')));

            var mensageError = Object.values($.parseJSON(obj[i]));
            $('[name="' + fieldName + '"]').parent()
                .addClass('has-error');

            $('[name="' + fieldName + '"]').siblings('.help-block')
                .text(mensageError);
        }
    } catch (e) {
        $("submit").prop("disabled", false);
        console.log('O formato do retorno não é um Json: ' + data, '\n' + e);
    }
    return false;
}
function limpaError(identif) {
    $(identif).parent().removeClass('has-error');
    $(identif).siblings('.help-block').empty();
}