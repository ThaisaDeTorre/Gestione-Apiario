<?php

session_start();
use Phppot\Member;

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
    
    require_once './Model/Member.php';
    $member = new Member();
    
    $beehiveResult = $member->getBeehive($username);
    //echo $member->getUserId($username);
    if (! empty($_POST["confirm-btn"])) {
        $registrationResponse = '';
        $registrationResponse = $member->registerBeehive($username);
    }
    
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}
?>

<!doctype html>
<html lang="it">
  <head>
  	<title>Seleziona Apiario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <link href="assets/css/user-registration.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </head>
      <script>
        function beehiveValidation() {
            var valid = true;

            $("#beehive-name").removeClass("error-field");
            $("#queenBee").removeClass("error-field");

            var beehiveName = $("#beehive-name").val();
            var queenBee = parseInt($("#queenBee").val());

            $("#beehive-name-info").html("").hide();
            $("#email-info").html("").hide();

            if (beehiveName.trim() == "") {
                $("#beehive-name-info").html("required.").css("color", "#ee0000").show();
                $("#beehive-name").addClass("error-field");
                valid = false;
            }
            
            if(isNaN(queenBee) || queenBee == "") {
                valid = false;
            }
            
            if (valid == false) {
                $('.error-field').first().focus();
                valid = false;
            }
            return valid;
        }
    </script>
  <body>
		
      <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <h5 style="text-align: center;color: #f8b739;">
                    <a href="logout.php">Logout</a>
                </h5>
                
	           <ul class="list-unstyled components mb-5">
                   <li class="active">
	               <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    </svg> Home
                  </a>
                   <li>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hexagon-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M14 4.577L8 1v14l6-3.577V4.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
                    </svg> Arnie
                  </a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                      <?php
                        foreach ($beehiveResult as $arnie) {
                            foreach ($arnie as $nomeArnia) {
                                echo "<li><a href='home.php'>$nomeArnia</a></li>";
                            }
                        }

                    ?>
                  </ul>
                   </li>      
            </ul>   
	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.-->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
	        </div>

	      </div>
    	</nav>
          
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
        <h2>Benvenuto <?php echo $username?>!</h2>

        <div class="phppot-container">
            <h3>Seleziona l'arnia su cui vuoi lavorare</h3>
        <?php
            foreach ($beehiveResult as $arnie) {
                foreach ($arnie as $nomeArnia) {
                    echo "<div><span><a href='home.php'>$nomeArnia</a><button>Elimina arnia</button></span></div>";
                }
            }

        ?>

        </div>
            
        <div class="phppot-container">
		<div class="sign-up-container">
            <!--<div class="title-chapter"> -->
			 <form name="add-beehive" action="" method="post" 
                  onsubmit="return beehiveValidation()">
                <h3>Aggiungi Arnia</h3>
                <?php
                    if (! empty($registrationResponse["status"])) {
                ?>

                <?php
                    if ($registrationResponse["status"] == "error") {
                ?>

                <div class="server-response error-msg">
                    <?php echo $registrationResponse["message"]; ?>
                </div>

                <?php
                    } else if ($registrationResponse["status"] == "success") {
                ?>

                <div class="server-response success-msg">
                    <?php echo $registrationResponse["message"]; ?>
                </div>
                <?php
                    } }
                ?>
                
				<div class="error-msg" id="error-msg"></div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Nome Arnia <span class="required error" id="beehive-name-info"></span>
                        </div>
                        <input class="input-box-330" type="text" name="beehive-name"
                            id="beehive-name">
                    </div>
                </div>
                <div class="row">
                    <div class="inline-block">
                        <div class="form-label">
                            Anno nascita ape regina <span class="required error" id="queenBee-info"></span>
                        </div>
                        <input class="input-box-330" type="number" name="queenBee-info" id="queenBee" min="0">
                    </div>
                </div>
                <div class="row">
                    <input class="btn" type="submit" name="confirm-btn"
                        id="confirm-btn" value="Conferma">
                </div>
            </form>
		<!--</div>-->
            </div>
            </div>
      </div>
    </div>
    
  </body>
</html>