/**
 * Convert error message object
 * to html list
 *
 * @param messages
 * @returns {string}
 */
function convertToHtmlList(messages) {
    var htmlErrorMess;
    htmlErrorMess = '<div class="alert alert-danger">';
    htmlErrorMess += '<ul>';

    for (var prop in messages) {
        htmlErrorMess += '<li>' + messages[prop] + '</li>';
    }
    htmlErrorMess += '</ul></div>';

    return htmlErrorMess;
}

/**
 * Display alert with validation errors
 *
 * @param message
 */
function displayErrors(message) {
    swal({
        title: 'Validation Errors',
        text: message,
        type: 'error',
        confirmButtonText: 'Okay',
        html: true
    });
}

function deleteWindow() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover product data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            $("#form-products").submit();
            swal("Deleted!", "Your product data has been deleted.", "success");
        } else {
            swal("Cancelled", "Your product data is safe :)", "error");
            $("#clear-action").click();
        }
    });
}

jQuery(document).ready(function ($) {

    // clear form and redirect to home
    $("#clear-action").on('click', function () {
        $('#form-products').find('input:text').val('');
        window.location = "/";
    });

    // delete button with confirmation
    $("#delete-action").on('click', function () {
      deleteWindow();
    });

    $("#form-products").on('submit', function (ev) {
        //prevent the form from actually submitting in browser
        ev.preventDefault();

        var data = {
            "_token": $(this).find('input[name=_token]').val(),
            "name": $("#name").val(),
            "quantity": $("#quantity").val(),
            "price": $("#price").val()
        };

        var method = $(this).attr('method');
        var url = $(this).attr('action'); 
        $.ajax(
            {
                url: url,
                dataType: "html",
                type: method,
                data: data,
                success: function (result) {
                    $("#products-list").html(result);
                    $("#clear-action").click();
                },
                error: function (request, status, error) {
                    var messages = JSON.parse(request.responseText);
                    var htmlMessages = convertToHtmlList(messages);
                    displayErrors(htmlMessages);
                }
            });


    });
});
