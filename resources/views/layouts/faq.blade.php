<a class="faq-btn-float effect-pop-up">
  <i class="faq-btn-icon">?</i>
</a>
<a class="cp-btn-float effect-pop-up">
  <i class="cp-btn-icon fa fa-phone" aria-hidden="true"></i>
</a>

<div class="faq-modal ">
  <div class="faq-modal-wrapper">
    <i class="close-modal-faq material-icons-round">close</i>
    <div class="faq-container">
      <h1 id="faq-title-h1">FAQ</h1>
      <button class="faq-accordion faq-acc-1" style="display: none">
        <h3 id="faq-q"></h3>
      </button>
    </div>
    <a href="https://t.me/+6fn52_-GVrI3MDE1" target="_blank" class="telegram-btn">Ask on Telegram</a>
  </div>
</div>
<div class="cp-modal ">
  <div class="cp-modal-wrapper">
    <i class="close-modal-cp material-icons-round">close</i>
    <div class="cp-container">
      <h1 id="cp-title-h1">Narahubung</h1>
      <div class="cp-modal-box">
          <div class="cp-modal-box-col">
            <div class="cp-modal-box-name"><h2>Sponsorship: </h2></div>
            <div class="cp-modal-box-nmbr"><a href="https://wa.me/60173464789" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i>Aurelia</a></div>
          </div>
          <div class="cp-modal-box-col">
            <div class="cp-modal-box-name"><h2>Partnership: </h2></div>
            <div class="cp-modal-box-nmbr"><a href="https://wa.me/601133070198" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i>Carissa</a></div>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready( function(){
    $.ajax({
        type: "GET",
        url: "../../api/faqs/read",
        success: function (result) {
          var faqItems ='';
          $.each(result, function(key, faq){

            faqItems += '<button class="faq-accordion faq-acc-1">'+
                          '<h3>'+ faq["question"] +'</h3>'+
                        '</button>'+
                        '<div class="faq-panel">'+
                          '<p>'+ faq["answer"] +'</p>'+
                        '</div>';
          });
          $('#faq-title-h1').after(faqItems);
        }
      });
  });
</script>
