var fileInput = document.getElementById('file-input');
if(fileInput)
{


document.getElementById('file-input').addEventListener('change', function(event) {
    $('#preview').addClass('min-150');
    const files = Array.from(event.target.files);
    const previewContainer = document.getElementById('preview');
    
    files.forEach((file, index) => {
      const fileType = file.type;
      const previewItem = document.createElement('div');
      previewItem.classList.add('preview-item');
      previewItem.dataset.index = index;
  
      if (fileType.startsWith('image/')) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        previewItem.appendChild(img);
      } else if (fileType.startsWith('video/')) {
        const video = document.createElement('video');
        video.src = URL.createObjectURL(file);
        video.controls = true;
        previewItem.appendChild(video);
      }
  
      // Add remove button
      const removeBtn = document.createElement('button');
      removeBtn.classList.add('remove-btn');
      removeBtn.innerHTML = 'x';
      removeBtn.addEventListener('click', () => removeFile(index));
      previewItem.appendChild(removeBtn);
  
      previewContainer.appendChild(previewItem);
    });
  });

  // Store selected files
  let selectedFiles = [];
  
  document.getElementById('file-input').addEventListener('change', function(event) {
    selectedFiles = Array.from(event.target.files);
    updatePreview();
  });
  
  function updatePreview() {
    const previewContainer = document.getElementById('preview');
    previewContainer.innerHTML = '';
  
    selectedFiles.forEach((file, index) => {
      const previewItem = document.createElement('div');
      previewItem.classList.add('preview-item');
      const fileType = file.type;
  
      if (fileType.startsWith('image/')) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        previewItem.appendChild(img);
      } else if (fileType.startsWith('video/')) {
        const video = document.createElement('video');
        video.src = URL.createObjectURL(file);
        video.controls = true;
        previewItem.appendChild(video);
      }
  
      // Add remove button
      const removeBtn = document.createElement('button');
      removeBtn.classList.add('remove-btn');
      removeBtn.innerHTML = 'x';
      removeBtn.addEventListener('click', () => removeFile(index));
      previewItem.appendChild(removeBtn);
  
      previewContainer.appendChild(previewItem);
    });
  }
  
  function removeFile(index) {
    selectedFiles.splice(index, 1);
    updatePreview();
  }

}
  $(document).ready(function() {
    var postpage = document.getElementById('post-container-profile');
    if(postpage){
        var user = 1;
        postpage = '#post-container-profile';
    }else{
        var user = '';
        postpage = '#post-container';
    }
    var page = 1;
    var isLoading = false;
    

    // Function to load posts
    function loadMoreData(page) {
        if (isLoading) return;

        isLoading = true;
        $('#loading').show();

        $.ajax({
            url: 'loadMoreData',
            method: 'GET',
            data: { page: page ,'user':user},
            beforeSend: function() {
                $('#loading').show(); // Show loading spinner or message
            },
            dataType: 'json',
            success: function(data) {
                $('#loading').hide();
                isLoading = false;
                $(postpage).append(data); // Append new data to the container
                isLoading = false; // Allow new requests
            }
        });
    }

    // Load initial posts
    loadMoreData(page);

    // Detect scroll event
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            page++;
            loadMoreData(page);
        }
    });
});

  $(document).ready(function() {
    $('.thoughtForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from actually submitting
        var formData = new FormData(this);
        // Show progress bar
        $('.progress-container').show();

        let progressBar = $('#progress-bar');
        let width = 0;

        // Simulate the progress with intervals
        let progressInterval = setInterval(function() {
            if (width >= 100) {
                clearInterval(progressInterval);
                // Here you can handle what happens when the progress bar reaches 100%
            } else {
                width++;
                progressBar.css('width', width + '%').text(width + '%');
            }
        }, 30); // Adjust the speed by modifying the interval

        // Simulating an AJAX request
        $.ajax({
            url: 'thought-submit',  // Replace with your server script
            method: 'POST',
            data: formData,
            processData: false,  // Prevent jQuery from processing the form data
            contentType: false, 
            dataType:'json',
            success: function(response) {
                if(response.status == 200){
                    clearInterval(progressInterval);
                    progressBar.css('width', '100%').text('100%');
                    Swal.fire({
                        icon: "success",
                        title: "SUCCESS...",
                        text: response.message,
                        timer: 1500
                        // footer: '<a href="mailto:ary@teen-biz.com">ary@teen-biz.com</a>'
                    });
                    $('#thoughtForm')[0].reset();
                    document.getElementById('preview').innerHTML = '';
                    
                }
                
                
            },
            error: function(res) {
                clearInterval(progressInterval);
                progressBar.css('width', '0%').text('Error!');
                alert('There was an error submitting the form.');
            }
        });
    });
});

function likeUn(element){
    $post = $(element).attr('data-post');
    $.ajax({
        url: 'unlike-post', 
        method: 'POST',
        data: {'post':$post},
        dataType:'json',
        success: function(response) {
            if(response.status == 200)
            { 
                $('#'+$post + ' .t_like').html(response.likes);
               
                if (element.classList.contains('fa-heart-o')) {
                    element.classList.remove('fa-heart-o');
                    element.classList.add('fa-heart');
                } else {
                    element.classList.remove('fa-heart');
                    element.classList.add('fa-heart-o');
                }
            }
        }
    })
}

  // Handle reply button click
  function commentReplay(e){
    // e.preventDefault();
     var commentId = $(e).attr('data-comment-id');
     $('#reply-form-' + commentId).toggle();  // Toggle the reply form for this comment
 };

    $(document).on('submit', '.commentForm', function(e) {
       
            e.preventDefault(); 
            var formData = new FormData(this);
            var commentText = $(this).find('textarea[name="comment_text"]').val().trim();

            if (commentText === "") {
                alert('Please enter a comment before submitting.'); // Show an alert if the field is empty
                return false; // Stop form submission
            }

            // Proceed with AJAX if the validation passes
            $.ajax({
                url: 'addComment',
                type: 'POST',
                data: $(this).serialize(), // Submit form data
                dataType:'json',
                success: function(response) {
                    if(response.status == 200){
                        $('textarea[name="comment_text"]').val('');
                        $('#'+response.post + ' .t_comment').html(response.tcomment);
                        $('#commentSection'+response.post).html(response.coments);
                    }else{
                        alert(response.msg)
                    }
                    //loadComments();
                },error:function(res){
                }
            });
        });

    $('#profileForm').on('submit',function(e){
        e.preventDefault();
        var fileInput = $('#profileImage')[0].files[0];
        if (!fileInput) {
            $('#feedbackError').html('<p>Please select an image file to upload.</p>');
            return;
        }
         var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
         if ($.inArray(fileInput.type, validImageTypes) === -1) {
             $('#feedbackError').html('<p>Only image files (JPEG, PNG, GIF) are allowed.</p>');
             return;
         }
        var formData = new FormData();
        formData.append('profileImage', fileInput);

        $.ajax({
            url: 'upload_profile_image', 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType:'json',
            success: function (response) {
                if(response.status == 200)
                {
                    console.log(response);
                    Swal.fire({
                        icon: "success",
                        title: "SUCCESS...",
                        text: response.message,
                        timer: 1500
                        // footer: '<a href="mailto:ary@teen-biz.com">ary@teen-biz.com</a>'
                    });
                    setTimeout(function(){
                        location.reload();
                    },2000)
                }else{
                    $('#feedbackError').html('<p>' + response.message + '</p>');
                }
            },
            error: function (xhr, status, error) {
                $('#feedbackError').html('<p>An error occurred while uploading the image. Please try again.</p>');
            }
        });

    })

        

          
        