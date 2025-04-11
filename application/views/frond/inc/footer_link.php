

    <!-- All JavaScript files
    ================================================== -->
    <script src="<?=base_url('frondend/')?>js/jquery.min.js"></script>
    <script src="<?=base_url('frondend/')?>js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="<?=base_url('frondend/')?>js/jquery-plugin-collection.js"></script>

    <!-- Rev slider -->
    <script src="<?=base_url('frondend/')?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?=base_url('frondend/')?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>    

    <!-- Custom script for this template -->
    <script src="<?=base_url('frondend/')?>js/script.js"></script>
    
</body>

</html>
<script>
    popupWhatsApp = () => {
  
  let btnClosePopup = document.querySelector('.closePopup');
  let btnOpenPopup = document.querySelector('.whatsapp-button');
  let popup = document.querySelector('.popup-whatsapp');
  let sendBtn = document.getElementById('send-btn');

  btnClosePopup.addEventListener("click",  () => {
    popup.classList.toggle('is-active-whatsapp-popup')
  })
  
  btnOpenPopup.addEventListener("click",  () => {
    popup.classList.toggle('is-active-whatsapp-popup')
     popup.style.animation = "fadeIn .6s 0.0s both";
  })
  
  sendBtn.addEventListener("click", () => {
  let msg = document.getElementById('whats-in').value;
  let relmsg = msg.replace(/ /g,"%20");
    //just change the numbers "1515551234567" for your number. Don't use +001-(555)1234567     
   window.open('https://wa.me/<?=str_replace([' ','+91','&'],'',get_appdata('contact_number'))?>?text='+relmsg, '_blank'); 
  
  });

  setTimeout(() => {
    popup.classList.toggle('is-active-whatsapp-popup');
  }, 3000);
}

popupWhatsApp();

</script>
