"use strict";

$('button[type="submit"]').click(function(event) {
    event.preventDefault();

    $.post("/email", {
        'email': $('#email').val()
    }, function() {
        Swal.fire({
            text: "You have successfully logged in!",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });

    }).fail(function() {
        Swal.fire({
            text: "You have successfully logged in!",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    });
});
