<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?render=6LdiRe8mAAAAAKzJaKyy_1E2-tgiCAjiR6-gOTXV"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script>
    
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdiRe8mAAAAAKzJaKyy_1E2-tgiCAjiR6-gOTXV', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
                document.getElementById('token').value = token;
          });
        });
      
  </script>
  <script>
    $(document).ready(function() {
      // Form submission handler
      $('#registerForm').on('submit', function(event) {
        // Prevent form submission
        event.preventDefault();
        
        // Clear previous errors
        $('.error').text('');

        // Get form values
        const name = $('#name').val();
        const email = $('#email').val();
        const contact = $('#contact').val();
        const dob = $('#dob').val();
        const rating = $('#rating').val();

        let isValid = true;

        // Name validation (minimum 3 characters)
        if (name.length < 3) {
          $('#name-error').text('Name must be at least 3 characters.');
          isValid = false;
        }

        // Email validation (simple email format check)
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!email.match(emailPattern)) {
          $('#email-error').text('Please enter a valid email.');
          isValid = false;
        }

        // Contact number validation (10 digits)
        const contactPattern = /^[0-9]{10}$/;
        if (!contact.match(contactPattern)) {
          $('#contact-error').text('Please enter a valid 10-digit contact number.');
          isValid = false;
        }

        // Date of Birth validation (required)
        if (dob === '') {
          $('#dob-error').text('Please enter your date of birth.');
          isValid = false;
        }

        // Rating validation (between 1 and 5)
        if (rating < 1 || rating > 5) {
          $('#rating-error').text('Rating must be between 1 and 5.');
          isValid = false;
        }

        // If all validations pass, submit the form
       if (isValid) {
        $('#quickFormBtn').attr('disabled', true); // Disable the button

        // Use the form element to get action and method
        var $form = $('#registerForm');
        var formData = $form.serialize(); // Serialize the form data
        $.ajax({
          url: $form.attr('action'), // Get action from form
          type: $form.attr('method'), // Get method from form
          data: formData,
          dataType: 'json',
          success: function(response) {
            if (response.status === 200) {
              swal({
                title: "Thank you. We will get back soon!",
                text: response.msg,
                icon: "success",
              });
              $("#registerForm")[0].reset(); // Reset the form
            } else {
              $('#quickFormBtn').attr('disabled', false); // Re-enable button if error
              swal({
                title: "Oops!",
                text: response.msg,
                icon: "error",
              });
            }
          },
          error: function(xhr, status, error) {
            $('#quickFormBtn').attr('disabled', false); // Re-enable button on error
            swal({
              title: "Error!",
              text: "An error occurred while submitting the form.",
              icon: "error",
            });
          }
        });

        // Prevent form from submitting traditionally
        return false;
      }
    });
  });
</script>