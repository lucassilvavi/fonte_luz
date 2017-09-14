// $(document).ready(function () {
//
//     $("body").on("click", ".upload-image", function (e) {
//         $(this).parents("form").ajaxForm(options);
//     });
//     var options = {
//         complete: function (response) {
//             if ($.isEmptyObject(response.responseJSON.error)) {
//                 console.log(response);
//                 $("input[name='title']").val('');
//                 $(".alert-success").show();
//             } else {
//                 console.log(response);
//                 printErrorMsg(response.responseJSON.error);
//             }
//         }
//     };
//
//     function printErrorMsg(msg) {
//         $(".print-error-msg").find("ul").html('');
//         $(".print-error-msg").css('display', 'block');
//         $.each(msg, function (key, value) {
//             $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
//         });
//     }
// });