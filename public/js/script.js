$(document).ready(function () {


// =========================== BUTTON DESTROY ===========================

    $('.buttonDestroy').click( function() {
      $('.formDestroy').removeClass('mask');
    });


// =========================== NAVBAR ===========================

    var carouselWidth = $(window).width() - 30;
    var carouselHeight = carouselWidth * 0.33;

    $('.carousel-item img').css('height', carouselHeight);

    console.log('largeur ' + carouselWidth);
    console.log('longueur ' + carouselHeight);
    console.log('ratio ' + carouselHeight / carouselWidth);

    $(window).resize( function() {
      carouselWidth = $(window).width() - 30;
      carouselHeight = carouselWidth * 0.33;
      $('.carousel-item img').css('height', carouselHeight);
      console.log('largeur ' + carouselWidth);
      console.log('longueur ' + carouselHeight);
      console.log('ratio ' + carouselHeight / carouselWidth);
    });


// =========================== CAROUSSEL ===========================

    $('.navbar-toggler').on('click', function () {
      $('.animated-icon').toggleClass('open');
    });


// =========================== SCROLLING ===========================

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
        $('.usersBandInfo').addClass('mask');
      }

      $(this).toggleClass('userBandActive');
      $('.' + $(this).attr('id')).toggleClass('mask');

    });


    // ========== USER BAN UPDATE ==========
    $('.onoffswitch-checkbox').click( function() {
      var userId = $(this).attr('id').substr(13);
      $('#btnBanUpdate' + userId).removeClass('mask');
    });




// =========================== COMMANDS ===========================

    $('#commandButton').click( function() {
      $('#commandButton').addClass('mask');
      $('#commandForm').removeClass('mask');
    });



// =========================== CATEGORIES ===========================

    $('.travels-category:last').css('border', 'none'); // Because ":last-child" doesn't work in categories/show view



// =========================== NOTES ===========================

    // ========== SHOW ==========
    var nbNotes = $(".user-note:last").attr('id');

    for( var i = 1; i<=nbNotes; i++) {
      var note = $("#"+i).html();
      var noNote = 5 - note;

      if( noNote != 5 ){
        for( var j = 0; j < noNote ; j++) {
          $("#"+i).after("<span class='user-note-no-point'>&#x2606</span>");
        }
        for( var k = 0; k < note; k++) {
          $("#"+i).after("<span class='user-note-point'>&#x2605</span>");
        }
      }
    }


    // ========== NOTATION ==========

    var noteChoice = $('.noteChoice').val();

        // ====== MOUSEOVER ======
        $('.1star').mouseover( function() {
            $('.1star').html('&#x2605');
            $('.2stars').html('&#x2606');
            $('.3stars').html('&#x2606');
            $('.4stars').html('&#x2606');
            $('.5stars').html('&#x2606');
        });

        $('.2stars').mouseover( function() {
            $('.1star').html('&#x2605');
            $('.2stars').html('&#x2605');
            $('.3stars').html('&#x2606');
            $('.4stars').html('&#x2606');
            $('.5stars').html('&#x2606');
        });

        $('.3stars').mouseover( function() {
          $('.1star').html('&#x2605');
            $('.2stars').html('&#x2605');
            $('.3stars').html('&#x2605');
            $('.4stars').html('&#x2606');
            $('.5stars').html('&#x2606');
        });

        $('.4stars').mouseover( function() {
          $('.1star').html('&#x2605');
          $('.2stars').html('&#x2605');
          $('.3stars').html('&#x2605');
          $('.4stars').html('&#x2605');
          $('.5stars').html('&#x2606');
        });

        $('.5stars').mouseover( function() {
          $('.1star').html('&#x2605');
          $('.2stars').html('&#x2605');
          $('.3stars').html('&#x2605');
          $('.4stars').html('&#x2605');
          $('.5stars').html('&#x2605');
        });


        // ====== CHOICE ======
        $('.1star').click( function() {
          $('.noteChoice').val(1);
          noteChoice = $('.noteChoice').val();
        });

        $('.2stars').click( function() {
          $('.noteChoice').val(2);
          noteChoice = $('.noteChoice').val();
        });

        $('.3stars').click( function() {
          $('.noteChoice').val(3);
          noteChoice = $('.noteChoice').val();
        });

        $('.4stars').click( function() {
          $('.noteChoice').val(4);
          noteChoice = $('.noteChoice').val();
        });

        $('.5stars').click( function() {
          $('.noteChoice').val(5);
          noteChoice = $('.noteChoice').val();
        });


        // ====== MOUSEOUT ======
        $('.noteStars').mouseout( function() {
          console.log(noteChoice);
          switch ( noteChoice ) {
            case '1':
              $('.1star').html('&#x2605');
              $('.2stars').html('&#x2606');
              $('.3stars').html('&#x2606');
              $('.4stars').html('&#x2606');
              $('.5stars').html('&#x2606');
              break;
            case '2':
              $('.1star').html('&#x2605');
              $('.2stars').html('&#x2605');
              $('.3stars').html('&#x2606');
              $('.4stars').html('&#x2606');
              $('.5stars').html('&#x2606');
              break;
            case '3':
              $('.1star').html('&#x2605');
              $('.2stars').html('&#x2605');
              $('.3stars').html('&#x2605');
              $('.4stars').html('&#x2606');
              $('.5stars').html('&#x2606');
              break;
            case '4':
              $('.1star').html('&#x2605');
              $('.2stars').html('&#x2605');
              $('.3stars').html('&#x2605');
              $('.4stars').html('&#x2605');
              $('.5stars').html('&#x2606');
              break;
            case '5':
              $('.1star').html('&#x2605');
              $('.2stars').html('&#x2605');
              $('.3stars').html('&#x2605');
              $('.4stars').html('&#x2605');
              $('.5stars').html('&#x2605');
              break;
            default:
              $('.1star').html('&#x2606;');
              $('.2stars').html('&#x2606');
              $('.3stars').html('&#x2606');
              $('.4stars').html('&#x2606');
              $('.5stars').html('&#x2606');
          }
        });



// =========================== SHIFUMI ===========================

    // ========== VARIABLES ==========
    let btnStone = document.getElementsByClassName('shifumiImg')[0];
    let btnPaper = document.getElementsByClassName('shifumiImg')[1];
    let btnScissors = document.getElementsByClassName('shifumiImg')[2];

    let btnPlayGame = document.getElementsByClassName('shifumiButton')[0];
    let btnReplay = document.getElementsByClassName('shifumiButton')[1];

    let userGame = document.getElementsByTagName('article')[0];
    let computerGame = document.getElementsByTagName('article')[1];

    let result = document.getElementsByTagName('aside')[0];

    let scoreWin = document.getElementsByClassName('scoreP')[0];
    let scoreLose = document.getElementsByClassName('scoreP')[1];
    let scoreTie = document.getElementsByClassName('scoreP')[2];
    let victories = 0;
    let lost = 0;
    let ties = 0;

    let userChoice;
    let computerChoice;

    // ========== CHOICE ==========
    function clickOnBtn( button, choice ){

      button.onclick = function(){

      userChoice = choice;

      // Show image
      userGame.innerHTML = '<img src="' + base_url + 'imgs/' + choice + '.svg" alt="' + choice + '">';

      // Show button "Lancer la partie"
      btnPlayGame.style.display = 'block';

      // Mask computer's choice, result and button "Rejouer"
      computerGame.innerHTML = '';
      result.innerHTML = '';
      btnReplay.style.display = 'none';
      }
    }

    // ========== CALL FUNCTIONS ==========
    clickOnBtn( btnStone, 'stone' );
    clickOnBtn( btnPaper, 'paper' );
    clickOnBtn( btnScissors, 'scissors' );

    // ========== RANDOM COMPUTER'S CHOICE ==========
    function computerBet(){

        let computerMemory = ['stone', 'paper', 'scissors'];
        let max = computerMemory.length;

        computerChoice = computerMemory[ Math.floor( Math.random() * max ) ];

        // Show image
        computerGame.innerHTML = '<img src="' + base_url + 'imgs/' + computerChoice + '.svg" alt="' + computerChoice +'">';

        // Mask button "Lancer la partie" then show button "Rejouer"
        btnPlayGame.style.display = 'none';
        btnReplay.style.display = 'block';

        // Result
        if ( userChoice == computerChoice ){
            result.innerHTML = '<span class="tie">Egalité !</span>';
            ties ++;
        }
        else if ( userChoice == 'stone' && computerChoice == 'paper'){
            result.innerHTML = '<span class="youLose">Perdu !</span>';
            lost ++;
        }
        else if ( userChoice == 'paper' && computerChoice == 'scissors'){
            result.innerHTML = '<span class="youLose">Perdu !</span>';
            lost ++;
        }
        else if( userChoice == 'scissors' && computerChoice == 'stone'){
            result.innerHTML = '<span class="youLose">Perdu !</span>';
            lost ++;
        }
        else {
            result.innerHTML = '<span class="youWin">Gagné !</span>';
            victories ++;
        }

        // Update score
        scoreWin.innerHTML =  'Victoires : ' + victories;
        scoreLose.innerHTML = 'Défaites : ' + lost;
        scoreTie.innerHTML = 'Egalités : ' + ties;

    }

    // Launch function computerBet() at the click of the button "Lancer la partie" :
    btnPlayGame.onclick = function(){

        computerBet();
    }

    // Play again with the button "Rejouer"
    btnReplay.onclick = function(){
        
        // Mask user's and computer's choices, result and button "Rejouer"
        userGame.innerHTML = '';
        computerGame.innerHTML = '';
        result.innerHTML = '';
        btnReplay.style.display = 'none';
    }




});