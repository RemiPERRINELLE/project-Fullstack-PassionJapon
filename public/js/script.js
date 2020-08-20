$(document).ready(function () {


// =========================== BUTTON DESTROY ===========================

    $('.buttonDestroy').click( function() {
      $('.formDestroy').removeClass('mask');
    });


// =========================== NAVBAR ===========================

    $('.navbar-toggler').on('click', function () {
  
      $('.animated-icon').toggleClass('open');
    });


// =========================== NAVBAR ===========================

    $("#footerUp").on("click", function(event){
      event.preventDefault();
      let hash = this.hash;
      $('body,html').animate({scrollTop: $(hash).offset().top}, 1000, function(){window.location.hash = hash;});
    });


// =========================== CALENDAR ===========================

    // ========== LANGAGE ==========
    $.datepicker.setDefaults($.datepicker.regional['fr']);

    // ========== DATE_PICKER ==========
    $( ".datepicker" ).datepicker({
      dateFormat : 'yy-mm-dd'
    });

    // ========== DATE_TIME_PICKER ==========
    $( ".datetimepicker" ).datetimepicker({
      dateFormat : 'yy-mm-dd',
      timeFormat : 'HH:mm:ss',
      showSecond : true
    });
   
    

// =========================== MODERATION ===========================
    
    // ========== USER BAND ==========
    $('.userBand').click( function(){
      
      if( $(this).hasClass('userBandActive') == false ) {
        $('.userBand').removeClass('userBandActive');
        // $('.userBandInfo').addClass('mask');
        $('.usersBandInfo').addClass('mask');
      }

      $(this).toggleClass('userBandActive');
      $('.' + $(this).attr('id')).toggleClass('mask');
      
      // if( $(this).hasClass('userBandActive') ) {
      //   $('.userBand').removeClass('userBandActive');
      //   $('.' + $(this).attr('id')).addClass('mask');
      // } else {
      //   $('.userBand').removeClass('userBandActive');
      //   $(this).addClass('userBandActive');
      //   $('.userBandInfo').addClass('mask');
      //   $('.' + $(this).attr('id')).removeClass('mask');
      // }

    });



    // ========== USER BAN UPDATE ==========
    $('.onoffswitch-checkbox').click( function() {
      $('.btnBanUpdate').removeClass('mask');
      var userId = $(this).attr('id').substr(13);
      if($('#banInput' + userId).val() == 0) {
        $('#banInput' + userId).val('1');
      } else {
        $('#banInput' + userId).val('0');
      }
      $('#btnBanUpdate' + userId).removeClass('mask');
    });

    //$('.btnUpdateForm').submit( function(e){
      //e.preventDefault();
      //alert("C'est fait");
    //});



    // ========== COMMANDS ==========
    $('#commandButton').click( function() {
      $('#commandForm').removeClass('mask');
    });










});