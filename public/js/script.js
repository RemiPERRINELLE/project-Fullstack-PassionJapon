$(document).ready(function () {


// =========================== BUTTON DESTROY ===========================

    $('.buttonDestroy').click( function() {
      var destroyId = $(this).attr('id').substr(13) ;
      $('#formDestroy' + destroyId).removeClass('mask');
    });


// =========================== NAVBAR ===========================

    $('.navbar-toggler').on('click', function () {
      $('.animated-icon').toggleClass('open');
    });


// =========================== CAROUSEL ===========================

    var carouselWidth = $(window).width() - 30;
    var carouselHeight = carouselWidth * 0.33;

    $('.carousel-item img').css('height', carouselHeight);

    $(window).resize( function() {
      carouselWidth = $(window).width() - 30;
      carouselHeight = carouselWidth * 0.33;
      $('.carousel-item img').css('height', carouselHeight);
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

    if( window.location.href == 'http://127.0.0.1:8000/games/shifumi' || window.location.href == 'http://remiperrinelle.com/portfolio/project-Fullstack-passionjapon/public/index.php/games/shifumi' ){

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

    }




// =========================== SNAKE ===========================

    if( window.location.href.endsWith('snake') || window.location.href.endsWith('snake#canva') ) {

        canvasWidth = 900;
        canvasHeight = 420;
        let blockSize = 30;
        let ctx;
        let container = document.getElementById('snakeContainer');
        let delay = 100;
        let theSnake;
        let theApple;
        let widthInBlocks = canvasWidth/blockSize;
        let heightInBlocks = canvasHeight/blockSize;
        let score;
        let timeout;
        let buttonGame = document.getElementById('snakeButton');

        // ========== DISABLE ARROWS SCROLL ==========
        function disableScroll(e){
	
          if (e.code) {
            /^(ArrowLeft|ArrowUp|ArrowRight|ArrowDown|Space)$/.test(e.code) && e.preventDefault();
          }else {
            e.preventDefault();
          }
        
        }

        addEventListener("keydown", disableScroll, false);

        // ========== CALL FUNCTIONS ==========
        init();

        buttonGame.onclick = function(){
          if( buttonGame.textContent == 'Jouer' ){
            start();
          }
          else {
            restart();
          }
        }
        
        // ========== FUNCTIONS ==========
        function init(){
        let canvas = document.createElement("canvas");
        canvas.width = canvasWidth;
        canvas.height = canvasHeight;
        container.appendChild(canvas);
        ctx = canvas.getContext("2d");
        ctx.font = "bold 30px sans-serif";
        ctx.fillStyle = "#000";
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";
        ctx.strokeStyle = "#eee";
        ctx.lineWidth = 5;
        let centreX = canvasWidth / 2;
        let centreY = canvasHeight / 2;
        ctx.strokeText("Peut se jouer avec les touches directionnelles ou les boutons", centreX, centreY);
        ctx.fillText("Peut se jouer avec les touches directionnelles ou les boutons", centreX, centreY);
        let buttonUp = document.createElement("button");
        buttonUp.id = 'arrowUp';
        buttonUp.className = 'arrows';
        buttonUp.innerHTML = '&uarr;';
        container.appendChild(buttonUp);
        let div = document.createElement("div");
        div.id = "arrowsDiv";
        container.appendChild(div);
        let buttonLeft = document.createElement("button");
        buttonLeft.id = 'arrowLeft';
        buttonLeft.className = 'arrows';
        buttonLeft.innerHTML = '&larr;';
        document.getElementById('arrowsDiv').appendChild(buttonLeft);
        let buttonDown = document.createElement("button");
        buttonDown.id = 'arrowDown';
        buttonDown.className = 'arrows';
        buttonDown.innerHTML = '&darr;';
        document.getElementById('arrowsDiv').appendChild(buttonDown);
        let buttonRight = document.createElement("button");
        buttonRight.id = 'arrowRight';
        buttonRight.className = 'arrows';
        buttonRight.innerHTML = '&rarr;';
        document.getElementById('arrowsDiv').appendChild(buttonRight);
        score = 0;
        drawScore();
        }
        
        function start(){
          theSnake = new Snake([[6,4], [5,4], [4,4], [3,4], [2,4]], "right");
          theApple = new Apple([10,10]);
          refreshCanvas();
        }
        
        function refreshCanvas(){
          theSnake.advance();
          if(theSnake.checkCollision()){
            //GAME OVER
            gameOver();
          }
          else{
            if(theSnake.isEatingApple(theApple)){
              //SNAKE ATE AN APPLE
              score ++;
              theSnake.ateApple = true;
              do{
                theApple.setNewPosition();
              }
              while(theApple.isOnSnake(theSnake));
            }
            ctx.clearRect(0, 0, canvasWidth, canvasHeight);
            theSnake.draw();
            theApple.draw();
            drawScore();
            timeout = setTimeout(refreshCanvas,delay);
          }
        }
        
        function gameOver (){
          buttonGame.textContent = 'Rejouer';
          ctx.save();
          ctx.font = "bold 70px sans-serif";
          ctx.fillStyle = "#000";
          ctx.textAlign = "center";
          ctx.textBaseline = "middle";
          ctx.strokeStyle = "#eee";
          ctx.lineWidth = 5;
          let centreX = canvasWidth / 2;
          let centreY = canvasHeight / 2;
          ctx.strokeText("Game Over", centreX, centreY);
          ctx.fillText("Game Over", centreX, centreY);
          ctx.font = "bold 30px sans-serif";
          ctx.strokeText("Appuyez sur la touche Espace ou le bouton 'Rejouer'", centreX, centreY - 100);
          ctx.fillText("Appuyez sur la touche Espace ou le bouton 'Rejouer'", centreX, centreY - 100);
          ctx.restore();
        }
        
        function restart(){
          if(theSnake.checkCollision()){
            theSnake = new Snake([[6,4], [5,4], [4,4], [3,4], [2,4]], "right");
            theApple = new Apple([10,10]);
            score = 0;
            clearTimeout(timeout);
            refreshCanvas();
          }
        }
        
        function drawScore(){
          document.getElementById('snakeScore').innerHTML = 'Score : ' + score;
        }
        
        function drawBlock(ctx, position){
          let x = position[0] * blockSize;
          let y = position[1] * blockSize;
          ctx.fillRect(x, y, blockSize, blockSize);
        }
        
        function Snake(body, direction){
          this.body = body;
          this.direction = direction;
          this.ateApple = false;
          this.draw = function(){
            ctx.save();
            ctx.fillStyle = "#F00";
            for(let i = 0; i < this.body.length; i++){
              drawBlock(ctx, this.body[i]);
            }
            ctx.restore();
          };
          this.advance = function(){
            let nextPosition = this.body[0].slice();
            switch(this.direction){
              case "left":
                nextPosition[0] -= 1;
                break;
              case "right":
                nextPosition[0] += 1;
                break;
              case "down":
                nextPosition[1] += 1;
                break;
              case "up":
                nextPosition[1] -= 1;
                break;
              default:
                throw("Invalid Direction");
            }
            this.body.unshift(nextPosition);
            if(this.ateApple)
              this.ateApple = false;
            else
              this.body.pop();
          };
          this.setDirection = function(newDirection){
            let allowedDirections;
            switch(this.direction){
              case "left":
              case "right":
                allowedDirections = ["up", "down"];
                break;
              case "down":
              case "up":
                allowedDirections = ["right", "left"];
                break;
              default:
                throw("Invalid Direction");
            }
            if(allowedDirections.indexOf(newDirection) > -1){
              this.direction = newDirection;
            }
          };
          this.checkCollision = function(){
            let wallCollision = false;
            let snakeCollision = false;
            let head = this.body[0];
            let rest = this.body.slice(1);
            let snakeX = head[0];
            let snakeY = head[1];
            let minX = 0;
            let minY = 0;
            let maxX = widthInBlocks - 1;
            let maxY = heightInBlocks - 1;
            let isNotBetweenHorizontalWalls = snakeX < minX || snakeX > maxX;
            let isNotBetweenVerticalWalls = snakeY < minY || snakeY > maxY;
            
            if(isNotBetweenHorizontalWalls || isNotBetweenVerticalWalls){
              wallCollision = true;
            }
            
            for(let i = 0; i < rest.length; i++){
              if(snakeX === rest[i][0] && snakeY === rest[i][1]){
                snakeCollision = true;
              }
            }
            
            return wallCollision || snakeCollision;
            
          };
          this.isEatingApple = function(appleToEat){
            let head = this.body[0];
            if(head[0] === appleToEat.position[0] && head[1] === appleToEat.position[1])
              return true;
            else
              return false;
          };
        }
        
        function Apple(position){
          this.position = position;
          this.draw = function()
          {
            ctx.save();
            ctx.fillStyle = "#33cc33";
            ctx.beginPath();
            let radius = blockSize/2;
            let x = this.position[0]*blockSize + radius;
            let y = this.position[1]*blockSize + radius;
            ctx.arc(x,y, radius, 0, Math.PI*2, true);
            ctx.fill();
            ctx.restore();
          };
          this.setNewPosition = function(){
            let newX = Math.round(Math.random() * (widthInBlocks - 1));
            let newY = Math.round(Math.random() * (heightInBlocks - 1));
            this.position = [newX, newY];
          };
          this.isOnSnake = function(snakeToCheck){
            let isOnSnake = false;
            
            for(let i = 0; i < snakeToCheck.body.length; i++){
              if(this.position[0] === snakeToCheck.body[i][0] && this.position[1] === snakeToCheck.body[i][1]){
                isOnSnake = true;
              }
            }
            return isOnSnake;
          };
        }
        
        document.onkeydown = function handleKeyDown(e){
          let key = e.code;
          let newDirection;
          switch(key){
            case 'ArrowLeft':
              newDirection = "left";
              break;
            case 'ArrowUp':
              newDirection = "up";
              break;
            case 'ArrowRight':
              newDirection = "right";
              break;
            case 'ArrowDown':
              newDirection = "down";
              break;
            case 'Space':
              restart();
              return;
            default:
              return;
          }
          theSnake.setDirection(newDirection);
        }
        
        let arrowUp = document.getElementById('arrowUp');
        let arrowLeft = document.getElementById('arrowLeft');
        let arrowDown = document.getElementById('arrowDown');
        let arrowRight = document.getElementById('arrowRight');

        arrowUp.onclick = function(){
          theSnake.setDirection("up");
        }

        arrowLeft.onclick = function(){
          theSnake.setDirection("left");
        }

        arrowDown.onclick = function(){
          theSnake.setDirection("down");
        }

        arrowRight.onclick = function(){
          theSnake.setDirection("right");
        }

    }





});