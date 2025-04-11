

$(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      $('#submit').html('<i class="fas fa-spinner fa-spin"></i> Loading...');
        $('#submit').attr('disabled',true);
          form.submit();
    }
  });
  $('#login').validate({
    rules: {
      email: {
        required: true,
        minlength: 2,
      },
      password: {
        required: true,
        minlength: 2
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 2 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


