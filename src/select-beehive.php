<?php
// start the session
session_start();
use Phppot\Member;

// check if the username is set in the session
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
    
    // import Member.php
    require_once './Model/Member.php';
    $member = new Member();
  
    // get all the beehives of the user logged
    $beehiveResult = $member->getBeehive($username);
    
    // check if the submit button is pressed
    if (! empty($_POST["add-beehive-btn"])) {
        $registrationResponse = '';
        // Register a new beehive for the user
        $registrationResponse = $member->registerBeehive($username);
    }

    // check if there is a beehive selected and if the 'delete-beehive' 
    // button is pressed
    if (! empty($_POST["delete-beehive"]) && ! empty($_POST["beehive"])) {
        $deleteResponse = '';
        // delete the selected beehive
        $deleteResponse = $member->deleteBeehive($_POST["beehive"]);
    }

    // check if there is a beehive selected and if the 'selected-beehive' 
    // button is pressed
    if (! empty($_POST["selected-beehive"]) && ! empty($_POST["beehive"])) {
      // goes to che home page of the beehive selected
      $member->selectBeehive($_POST["beehive"]);
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
        /**
         * Check che input values for the registration of a new beehive.
         * @return If all the values are ok it returns true.
         */
        function beehiveValidation() {
            var valid = true;

            $("#beehiveName").removeClass("error-field");
            $("#queenBee").removeClass("error-field");

            var beehiveName = $("#beehiveName").val();
            var queenBee = parseInt($("#queenBee").val());

            $("#beehiveName-info").html("").hide();

            if (beehiveName.trim() == "") {
                $("#beehiveName-info").html("required.").css("color", "#ee0000").show();
                $("#beehiveName").addClass("error-field");
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
          <h5 id="welcome" style="text-align: center;color: #f8b739;">
            Welcome <?php echo $username?>!<br>
            <a href="logout.php">Logout</a>
          </h5>
                
           <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#welcome" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                </svg> Home
              </a>
             <li>
               <a href="#add-beehive">Aggiungi Arnia</a>
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
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              
              <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#welcome">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    </svg> Home
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#add-beehive">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hexagon-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M14 4.577L8 1v14l6-3.577V4.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
                    </svg> add Arnie
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-thermometer-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 1 1 4 0v7.627a3.5 3.5 0 1 1-4 0V2zm2-1a1 1 0 0 0-1 1v7.901a.5.5 0 0 1-.25.433A2.499 2.499 0 0 0 8 15a2.5 2.5 0 0 0 1.25-4.666.5.5 0 0 1-.25-.433V2a1 1 0 0 0-1-1z"/>
                        <path d="M8.25 2a.25.25 0 0 0-.5 0v9.02a1.514 1.514 0 0 1 .5 0V2z"/>
                        <path d="M9.5 12.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      </svg> Logout
                    </a>
                </li>
              </ul>
              </div>
            </div>
          </nav>
          
        <h2>Benvenuto <?php echo $username?>!</h2>

        <!--     Select Beehive form     -->
        <div class="title-chapter"> 
          <form name="manage-beehive" action="" method="post" onsubmit="return true">  
            <h3>Seleziona l'arnia</h3>
            <?php
                if (! empty($deleteResponse["status"])) {
            ?>

            <?php
                if ($deleteResponse["status"] == "error") {
            ?>

            <div class="server-response error-msg">
                <?php echo $deleteResponse["message"]; ?>
            </div>

            <?php
                } else if ($deleteResponse["status"] == "success") {
            ?>

            <div class="server-response success-msg">
                <?php echo $deleteResponse["message"]; ?>
            </div>
            <?php
                } }
            ?>
            <?php
                if(! empty($beehiveResult)) {
                    foreach ($beehiveResult as $arnie) {
                        foreach ($arnie as $nomeArnia) {
                        ?>
                        <input id="<?php echo $nomeArnia;?>" type="radio" value="<?php echo $nomeArnia;?>" name="beehive"> 

                        <label for="<?php echo $nomeArnia;?>"><?php echo $nomeArnia;?></label><br>

                        <?php
                        }
                    }
                    ?>
                    <input id="delete-beehive" class="btn" type="submit" value="Elimina" name="delete-beehive"><br>

                    <input id="selected-beehive" class="btn" type="submit" value="Seleziona" name="selected-beehive">
                    <?php
                }
            ?>
          </form>
        </div>
            
        <!--    Add Beehive form    -->
        <div id="add-beehive" class="phppot-container">
            <div class="sign-up-container">
                <div class="title-chapter"> 
                 <form name="add-beehive" action="" method="post" onsubmit="return beehiveValidation()">
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
                                Nome Arnia <span class="required error" id="beehiveName-info"></span>
                            </div>
                            <input class="input-box-330" type="text" name="beehiveName"
                                id="beehiveName" value="" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                Anno nascita ape regina <span class="required error" id="queenBee-info"></span>
                            </div>
                            <input class="input-box-330" type="number" name="queenBee" id="queenBee" min="0" value="">
                        </div>
                    </div>
                    <div class="row">
                        <input class="btn" type="submit" class="btn" name="add-beehive-btn" id="add-beehive-btn" value="Conferma">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>