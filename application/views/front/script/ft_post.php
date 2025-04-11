<script src="<?=base_url('layout/front/js/script.js');?>"></script>
<script>
        // let mediaRecorder;
        // let audioChunks = [];

        // const recordButton = document.getElementById('recordButton');
        // const stopButton = document.getElementById('stopButton');
        // const audioPlayback = document.getElementById('audioPlayback');

        // // Start recording when the button is clicked
        // recordButton.addEventListener('click', () => {
        //     navigator.mediaDevices.getUserMedia({ audio: true })
        //         .then(stream => {
        //             mediaRecorder = new MediaRecorder(stream);
        //             mediaRecorder.start();

        //             mediaRecorder.ondataavailable = (event) => {
        //                 audioChunks.push(event.data);
        //             };

        //             mediaRecorder.onstop = () => {
        //                 const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
        //                 const audioUrl = URL.createObjectURL(audioBlob);
        //                 audioPlayback.src = audioUrl;

        //                 // Send the audioBlob to the server via AJAX
        //                 const formData = new FormData();
        //                 formData.append('audio', audioBlob, 'recording.webm');
                        
        //                 fetch('<?= base_url('audio/saveAudio') ?>', {
        //                     method: 'POST',
        //                     body: formData
        //                 })
        //                 .then(response => response.text())
        //                 .then(data => {
        //                     console.log('Audio saved: ', data);
        //                 })
        //                 .catch(error => {
        //                     console.error('Error saving audio:', error);
        //                 });

        //                 audioChunks = []; // Reset the audio chunks array
        //             };

        //             recordButton.disabled = true;
        //             stopButton.disabled = false;
        //         })
        //         .catch(error => {
        //             console.error('Error accessing microphone', error);
        //         });
        // });

        // // Stop recording when the button is clicked
        // stopButton.addEventListener('click', () => {
        //     mediaRecorder.stop();
        //     recordButton.disabled = false;
        //     stopButton.disabled = true;
        // });

        $(document).ready(function() {

                
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function(){
                readURL(this);
            });

            $(".upload-button").on('click', function() {
            $(".file-upload").click();
            });
        })
</script>