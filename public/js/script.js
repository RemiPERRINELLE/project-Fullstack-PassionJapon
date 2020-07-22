$(document).ready(function () {



// =========================== NAVBAR ===========================

    $('.navbar-toggler').on('click', function () {
  
      $('.animated-icon').toggleClass('open');
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