// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

//getYear();


// isotope js
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
});

// nice select
$(document).ready(function() {
    $('select').niceSelect();
  });

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});



$('#togglePassword').click(function(){
  
    // Get the input field and the icon
    const passwordField = $('#password');
    const icon = $(this);
    // Toggle the type attribute
    const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
    passwordField.attr('type', type);
    // Toggle the eye / eye-slash icon
    icon.toggleClass('fa-eye fa-eye-slash');
});
$(document).ready(function() {
    // Move focus to the next input field when 2 digits are entered in the 'day' input field
    $('#day').on('input', function() {
        let dayValue = $(this).val();
        if (dayValue.length === 2) {
            // Validate if day is between 1 and 31
            if (parseInt(dayValue) < 1 || parseInt(dayValue) > 31) {
                $('#errorday').text('Day must be between 1 and 31.');
                $(this).val(''); // Clear the invalid value
            } else {
                $('#errorday').text('');
                $('#month').focus(); // Move focus to the month field
            }
        }
    });
    // Move focus to the next input field when 2 digits are entered in the 'month' input field
    $('#month').on('input', function() {
        let monthValue = $(this).val();
        if (monthValue.length === 2) {
            // Validate if month is between 1 and 12
            if (parseInt(monthValue) < 1 || parseInt(monthValue) > 12) {
                $('#errormonth').text('Month must be between 1 and 12.');
                $(this).val(''); // Clear the invalid value
            } else {
                $('#errormonth').text('');
                $('#year').focus(); // Move focus to the year field
            }
        }
    });

    $('#year').on('input', function() {
        let yearValue = $(this).val();
        if (yearValue.length === 4) {
            let yearInt = parseInt(yearValue);
            let currentYear = new Date().getFullYear();
            if (yearInt < 1945 || yearInt > currentYear) {
                $('#yearerror').text('Year must be between 1945 and ' + currentYear + '.');
                 $.notify('Year must be between 1945 and ' + currentYear + '.', "error");
                $(this).val(''); // Clear the invalid value
            } else {
                $('#yearerror').text(''); // Clear error if valid
            }

            let day = parseInt($('#day').val());
            let month = parseInt($('#month').val());
            let year = parseInt($('#year').val());

            let today = new Date();
            let birthDate = new Date(year, month - 1, day); // JavaScript months are 0-indexed (Jan is 0)
            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDifference = today.getMonth() - birthDate.getMonth();
            let dayDifference = today.getDate() - birthDate.getDate();

            if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
                age--;
            }

            // Check if the user is under 14
            if (age < 14) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Sorry, you do not meet the age requirements to use this platform. Please reach out to the administrator: ary@teen-biz.com",
                    footer: '<a href="mailto:ary@teen-biz.com">ary@teen-biz.com</a>'
                  });
            } else {
                $('#doberror').text(''); // Clear any error messages
               
                //alert('You are eligible to create a profile.');
            }

        }
    });

});

   $(document).ready(function () {
    // Initialize Nice Select
    $('select#countryList').niceSelect();

    $('select#countryList').each(function () {
        var $select = $(this);
        var $niceSelect = $select.next('.nice-select'); 
        var $myCls = $niceSelect.addClass('countryList');
        var $list = $niceSelect.find('ul'); 
        $myCls.on('click',function(){
            $myCls.attr('id', 'niceSelect');
        })
        // Prepend the search box
        $niceSelect.prepend('<div class="search-box"><input type="text" placeholder="Country ..."></div>');
        var $searchBox = $niceSelect.find('.search-box');
        $myCls.on('click', function () {
            if ($myCls.hasClass('open')) {
                $myCls.attr('id', 'foo123');
                
            } else {
                //$searchBox.hide();
            }
        });

        // Add filtering functionality on keyup in search input
        $myCls.on('keyup', '.search-box input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $list.find('li').each(function () {
                var $option = $(this);
                var text = $option.text().toLowerCase();
                if (text.includes(searchTerm)) {
                    $option.show();  
                } else {
                    $option.hide();  
                }
            });
        });

        

    });

    $("#registrationForm").validate({
        rules: {
            firstname: {
                required: true,
                minlength: 2
            },
            lastname: {
                required: true,
                minlength: 1
            },
            day: {
                required: true,
                digits: true,
                range: [1, 31]
            },
            month: {
                required: true,
                digits: true,
                range: [1, 12]
            },
            year: {
                required: true,
                digits: true,
                min: 1945
            },
            contactnumber: {
                required: true,
                digits: true,
                minlength: 6,
                // maxlength: 15,
                // remote: {
                //     url: "/teenbiz/checkContactExists", // URL to check if contact exists
                //     type: "post",
                //     data: {
                //         contactnumber: function() {
                //             return $("#contactnumber").val();
                //         }
                //     }
                // }
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/demo/checkEmailExists", // URL to check if email exists
                    method: "post",
                    data: {
                        email: function() {
                            return $("#username").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 6
            },
        },
        messages: {
            firstname: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email",
                remote: "Email already exists"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
        },
        submitHandler: function(form,e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(form); // Create FormData from the form
           // console.log([...formData.entries()]); // Log FormData entries
    
            $.ajax({
                method: 'post',
                url: form.action,
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                   
                    if (response.status == 200) {
                        Swal.fire({
                            icon: "success",
                            title: "SUCCESS...",
                            text: response.message,
                            // footer: '<a href="mailto:ary@teen-biz.com">ary@teen-biz.com</a>'
                          });
                        setTimeout(function() {
      // Redirect to login page
      window.location.href = 'demo/login';
    }, 2000);
                        
                        $(".success-message").text(response.message).show();
                        $(".error-message").hide();
                        form.reset();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                            footer: '<a href="mailto:ary@teen-biz.com">ary@teen-biz.com</a>'
                          });
                        //$(".error-message").text(response.message).show();
                        //$(".success-message").hide();
                    }
                },
                error: function(xhr, status, error) {
                    // Log error details for debugging
                    console.error('Error:', xhr.status, xhr.statusText, xhr.responseText);
                    $(".error-message").text("An error occurred during the request.").show();
                    $(".success-message").hide();
                }
            });
            return false;
        }
    });
});

