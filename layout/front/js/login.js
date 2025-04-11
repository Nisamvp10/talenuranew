$("#loginForm").validate({
    rules: {
        username: {
            required: true,
           
        },
        password: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address."
        },
        password: {
            required: "Please enter your password.",
            minlength: "Your password must be at least 6 characters long."
        }
    },
    submitHandler: function(form,e) {
        e.preventDefault(); // Prevent the default form submission
        var formData = new FormData(form); // Create FormData from the form
        $.ajax({
            method: 'POST',
            url: form.action,
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
              
                if (response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "SUCCESS...",
                        text: response.message,
                        timer: 2000,
                        // footer: '<a href="mailto:ary@teen-biz.com">ary@teen-biz.com</a>'
                      }).then(() => {
                        window.location.href =response.redirect;
                    })
                    $(".success-message").text(response.message).show();
                    $(".error-message").hide();
                    form.reset();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message,
                      });
                    $(".error-message").text(response.message).show();
                    $(".success-message").hide();
                }
            },
            error: function(xhr) {
                // $(".error-message").text("An error occurred. Please try again.").show();
                // $(".success-message").hide();
                // console.error('Error:', xhr.responseText);
            }
        });
        return false;
    }
});