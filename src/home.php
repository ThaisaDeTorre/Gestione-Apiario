<?php
// start the session
session_start();
use Phppot\Member;

// check if the username is set in the session 
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $beehiveName = '';
    
    $beehiveName = $_COOKIE['beehive-name'];
    $beehiveId = $_COOKIE['beehive-id'];
    session_write_close();
    
    // import Member.php
    require_once './Model/Member.php';
    $member = new Member();
    $treatDataResult = '';
    $eventDataResult = '';
    $beeDataResult = '';
  
    // get all the treatment of the beehive
    $treatDataResult = $member->getTreatmentData($beehiveId);
    // get data of the beehive
    $beeDataResult = $member->getBeeData($beehiveId);
    // get data of the beehive
    $eventDataResult = $member->getEventData($beehiveId);

    $diaryTxt = '';
    // get diary of the beehive
    $diaryTxt = $member->getDiary($beehiveId);
    
    // save edits of the diary
    if (! empty($_POST["diary-btn"])) {
        $diaryResponse = '';
        $diaryResponse = $member->setDiary($beehiveId);
    }

    // Registers a new treatment
    if (! empty($_POST["add-treatment-btn"])) {
        $treatmentResponse = '';
        $treatmentResponse = $member->registerTreatment();
    }
  
    // Registers a new event
    if (! empty($_POST["add-event-btn"])) {
        $calendarResponse = '';
        $calendarResponse = $member->registerEvent();
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
  	<title>Gestione Apiario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="assets/css/user-registration.css" type="text/css" rel="stylesheet">
    <link href="assets/css/phppot-style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
      <!--   Calendario CSS   -->
    <link rel="stylesheet" type="text/css" href="evo-calendar/css/evo-calendar.css"/>
  </head>
  <body onload="displayCalendar()">
    <div class="wrapper d-flex align-items-stretch">
      <!--   Sidebar   -->
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#welcome" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
          <h5 style="text-align: center;color: #f8b739;">
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
             <a href="select-beehive.php">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hexagon-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M14 4.577L8 1v14l6-3.577V4.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
                </svg> Arnie
              </a>
            <li>
              <a href="#meteo">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-thermometer-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M6 2a2 2 0 1 1 4 0v7.627a3.5 3.5 0 1 1-4 0V2zm2-1a1 1 0 0 0-1 1v7.901a.5.5 0 0 1-.25.433A2.499 2.499 0 0 0 8 15a2.5 2.5 0 0 0 1.25-4.666.5.5 0 0 1-.25-.433V2a1 1 0 0 0-1-1z"/>
                  <path d="M8.25 2a.25.25 0 0 0-.5 0v9.02a1.514 1.514 0 0 1 .5 0V2z"/>
                  <path d="M9.5 12.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg> Meteo
              </a>
            </li> 
            <li>
              <a href="#calendario">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                  <path fill-rule="evenodd" d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg> Calendario
              </a>
            </li>
            <li>
              <a href="#diario">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                  <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg> Diario
              </a>
            </li>
            <li>
              <a href="#trattamenti">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                  <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg> Trattamenti
              </a>
            </li>
            <li>
              <a href="#dati">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                  <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                  <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                </svg> Dati
              </a>
            </li>
          </ul>   
          <div class="footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <!--    Navbar    -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    </svg> Home
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="select-beehive.php">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hexagon-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M14 4.577L8 1v14l6-3.577V4.577zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866L8.5.134z"/>
                    </svg> Arnie
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#meteo">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-thermometer-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 1 1 4 0v7.627a3.5 3.5 0 1 1-4 0V2zm2-1a1 1 0 0 0-1 1v7.901a.5.5 0 0 1-.25.433A2.499 2.499 0 0 0 8 15a2.5 2.5 0 0 0 1.25-4.666.5.5 0 0 1-.25-.433V2a1 1 0 0 0-1-1z"/>
                        <path d="M8.25 2a.25.25 0 0 0-.5 0v9.02a1.514 1.514 0 0 1 .5 0V2z"/>
                        <path d="M9.5 12.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      </svg> Meteo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#calendario">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                        <path fill-rule="evenodd" d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg> Calendario 
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#diario">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                        <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                      </svg> Diario
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#trattamenti">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    </svg> Trattamenti
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#dati">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                      </svg> Dati
                    </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        
        <!--    Home    -->
        <h2 id="home" class="mb-4">Home Arnia <?php echo $beehiveName; ?></h2>
		<hr class="hr">
        
        <!--    Weather    -->
        <div id="meteo" class="title-chapter">
          <h4>Meteo</h4>
          <!-- Open Weather Map code --> 
          <?php
              $apiKey = "3a11e70fe555d9bc574b4f427486dfea";
              $cityId = "2657896"; // Zurigo
              $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
              curl_setopt($ch, CURLOPT_VERBOSE, 0);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              $response = curl_exec($ch);

              curl_close($ch);
              $data = json_decode($response);
              $currentTime = time();
          ?>
          <div class="report-container">
            <div class="time">
              <div><?php echo date("l g:i a", $currentTime); ?></div>
              <div><?php echo date("jS F, Y",$currentTime); ?></div>
              <div><?php echo ucwords($data->weather[0]->description); ?></div>
            </div>
            <div class="weather-forecast">
              <span> <?php echo $data->main->temp_max; ?>°C (max)</span>
              <span><?php echo $data->main->temp_min; ?>°C (min)</span>
            </div>
            <div class="time">
              <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
              <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
            </div>
          </div>
		</div>
        <hr class="hr">
        
        <!--    Calendar    -->
		<div id="calendario" class="title-chapter">
          <h4>Calendario</h4>
          <div id="calendar"></div>
          
          <table id="calendar-data" class="table">
              <tr>
                  <th>Nome</th>
                  <th>Inizio</th>
                  <th>Fine</th>
                  <th>Tipo</th>
                  <th>Descrizione</th>
              </tr>
              <?php
                  if(! empty($eventDataResult)) {
                      foreach ($eventDataResult as $col) {
                          echo "<tr>";
                          foreach ($col as $record) {
                              echo "<td>$record</td>";
                          }
                          echo "</tr>";
                      }
                  }
              ?>
          </table>
          <form name="event-form" action="" method="post" onsubmit="return eventValidation()">
              <?php
                  if (! empty($calendarResponse["status"])) {
              ?>

              <?php
                  if ($calendarResponse["status"] == "error") {
              ?>

              <div class="server-response error-msg">
                  <?php echo $calendarResponse["message"]; ?>
              </div>

              <?php
                  } else if ($calendarResponse["status"] == "success") {
              ?>

              <div class="server-response success-msg">
                  <?php echo $calendarResponse["message"]; ?>
              </div>
              <?php
                  } }
              ?>
              <div class="row">
                <div class="inline-block">
                  <div class="form-label">
                      Nome <span class="required error" id="eventName-info"></span>
                  </div>
                  <input class="input-box-330" type="text" name="eventName" id="eventName" value="" >
                </div>
              </div>
              <div class="row">
                <div class="inline-block">
                  <div class="form-label">
                      Data inizio <span class="required error" id="eventStart-info"></span>
                  </div>
                  <input class="input-box-330" type="date" name="eventStart" id="eventStart" value="">
                </div>
              </div>
              <div class="row">
                <div class="inline-block">
                  <div class="form-label">
                      Data fine <span class="required error" id="eventEnd-info"></span>
                  </div>
                  <input class="input-box-330" type="date" name="eventEnd" id="eventEnd" value="">
                </div>
              </div>
              <div class="row">
                <div class="inline-block">
                  <div class="form-label">
                      Tipo <span class="error" id="eventType-info"></span>
                  </div>
                  <select name="eventType" id="eventType">
                    <option value="event">Evento</option>
                    <option value="holiday">Festività</option>
                    <option value="birthday">Compleanno</option>
                  </select>
                </div>
              </div>
            <div class="row">
                <div class="inline-block">
                  <div class="form-label">
                    Descrizione <span id="eventDesc-info"></span>
                  </div>
                  <textarea id="eventDesc" name="eventDesc" rows="4" cols="50"></textarea>
                </div>
              </div>
              <br><br>
              <div class="row">
                <input class="btn btn-primary" type="submit" name="add-event-btn" id="add-event-btn" value="Aggiungi">
              </div>
          </form>
		</div>
		<hr class="hr">
        
        <!--    Diary notes    -->
        <div id="diario" class="title-chapter">
          <h4>Note Diario</h4>
            
          <form name="diary-form" action="" method="post" onsubmit="return true">
              <?php
                  if (! empty($diaryResponse["status"])) {
              ?>

              <?php
                  if ($diaryResponse["status"] == "error") {
              ?>

              <div class="server-response error-msg">
                  <?php echo $diaryResponse["message"]; ?>
              </div>

              <?php
                  } else if ($diaryResponse["status"] == "success") {
              ?>

              <div class="server-response success-msg">
                  <?php echo $diaryResponse["message"]; ?>
              </div>
              <?php
                  } }
              ?>
              <textarea id="diary" name="diary" rows="4" cols="50">
                <?php echo $diaryTxt;?>
              </textarea>
              <br><br>
              <div class="row">
                <input class="btn btn-primary" type="submit" name="diary-btn" id="diary-btn" value="Salva Modifiche">
              </div>
          </form>
		</div>
        <hr class="hr">
        
        <!--    Treatments data   -->
        <div id="trattamenti" class="title-chapter">
          <h4>Trattamenti</h4>
          <table id="treatment-data" class="table">
              <tr>
                  <th>Data</th>
                  <th>Durata [giorni]</th>
              </tr>
              <?php
                  if(! empty($treatDataResult)) {
                      foreach ($treatDataResult as $col) {
                          echo "<tr>";
                          foreach ($col as $record) {
                              echo "<td>$record</td>";
                          }
                          echo "</tr>";
                      }
                  }
              ?>
          </table>
          <!--    Add treatments form   -->
          <div class="sign-up-container">
            <div class="title-chapter"> 
              <form name="add-treatment" action="" method="post" onsubmit="return treatmentValidation()">
                <h5>Aggiungi Trattamento</h5>
                <?php
                    if (! empty($treatmentResponse["status"])) {
                ?>

                <?php
                    if ($treatmentResponse["status"] == "error") {
                ?>

                <div class="server-response error-msg">
                    <?php echo $treatmentResponse["message"]; ?>
                </div>

                <?php
                    } else if ($treatmentResponse["status"] == "success") {
                ?>

                <div class="server-response success-msg">
                    <?php echo $treatmentResponse["message"]; ?>
                </div>
                <?php
                    } }
                ?>

                <div class="error-msg" id="error-msg"></div>
                <div class="row">
                  <div class="inline-block">
                    <div class="form-label">
                      Data <span class="required error" id="treatmentDate-info"></span>
                    </div>
                    <input class="input-box-330" type="date" name="treatmentDate" id="treatmentDate" value="" >
                  </div>
                </div>
                <div class="row">
                  <div class="inline-block">
                    <div class="form-label">
                      Durata [giorni] <span class="required error" id="treatmentDuration-info"></span>
                    </div>
                    <input class="input-box-330" type="number" name="treatmentDuration" id="treatmentDuration" min="0" value="">
                  </div>
                </div>
                <div class="row">
                  <input class="btn btn-primary" type="submit" name="add-treatment-btn" id="add-treatment-btn" class="btn btn-primary" value="Conferma">
                </div>
              </form>
            </div>
          </div>
        </div>
        <hr class="hr">
          
        <!--    Beehive data      -->
        <div id="dati" class="title-chapter">
          <h4>Dati</h4>
          <h5>Arnia</h5>
          <table id="beehive-data" class="table">
            <?php
                foreach (array_keys($beeDataResult[0]) as $name) {
                    echo "<th>$name</th>";
                }
                foreach ($beeDataResult as $col) {
                    echo "<tr>";
                    foreach ($col as $record) {
                        echo "<td>$record</td>";
                    }
                    echo "</tr>";
                }
            ?>
           </table>
        </div>
      </div>
    </div>
      
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="evo-calendar/js/evo-calendar.js"></script>
    <script>
        var eventId = 1;
        var events = [];
      
        /**
         * Display the calendar.
         */
        function displayCalendar() {

          $('#calendar').evoCalendar({
              calendarEvents: events,
              todayHighlight: true,
              sidebarDisplayDefault: false,
              firstDayOfWeek: 1, // Monday
          });
        }
      
      /**
       * Adds the event to the calendar.
       * @param name name of the event
       * @param date date of the event, array or single date
       * @param type type of the event
       * @param desc description of the event
       * @return true if the event is added successfully
       */
      function addEvent(name, date, type, desc) {
        
        var currEvent = {
          id: eventId,
          name: name,
          date: date,
          description: desc,
          type: type
        };
        
        events.push(currEvent);
        eventId++;
        displayCalendar();
      }

      /**
       * Check che input values for the event.
       * @return If all the values are ok it returns true.
       */
      function eventValidation() {
        console.log("data validation");
        var valid = true;

        $("#eventName").removeClass("error-field");
        $("#eventStart").removeClass("error-field");
        $("#eventEnd").removeClass("error-field");
        $("#eventType").removeClass("error-field");
        $("#eventDesc").removeClass("error-field");

        var name = $("#eventName").val();
        var startDate = $("#eventStart").val();
        var endDate = $("#eventEnd").val();
        var type = $("#eventType").val();
        var desc = $("#eventDesc").val();
        
        var date;

        if (name.trim() == "") {
            $("#eventName-info").html("required.").css("color", "#ee0000").show();
            $("#eventName").addClass("error-field");
            valid = false;
        }
        if (type.trim() == "") {
            $("#eventType-info").html("required.").css("color", "#ee0000").show();
            $("#eventType").addClass("error-field");
            valid = false;
        }
        
        if (startDate == "") {
            $("#eventStart-info").html("required.").css("color", "#ee0000").show();
            $("#eventStart").addClass("error-field");
            valid = false;
        }
        if (endDate == "") {
            $("#eventEnd-info").html("required.").css("color", "#ee0000").show();
            $("#eventEnd").addClass("error-field");
            valid = false;
        }
        // convert string to Date
        var sd = new Date(startDate);
        var ed = new Date(endDate);
        
        if (sd.valueOf() == ed.valueOf()) {
          console.log("same date");
            var d = sd.getDate();
            var m = sd.getMonth()+1;
            var y = sd.getFullYear();
            date = m+"-"+d+"-"+y;
          
        } else if (ed.valueOf() > sd.valueOf()) {
          console.log("end > start");
            // change the date format
            var d = sd.getDate();
            var m = sd.getMonth()+1;
            var y = sd.getFullYear();
          
            sd = m+"-"+d+"-"+y;
          console.log("sd: "+sd);
          console.log("sd type: "+typeof sd);
            d = ed.getDate();
            m = ed.getMonth()+1;
            y = ed.getFullYear();
            ed = m+"-"+d+"-"+y;
          console.log("ed: "+ed);
          console.log("ed type: "+typeof ed);
          
            date = [sd, ed];
          console.log("date type: "+typeof date);
          console.log("date [0]: "+date[0]);
          console.log("date [1]: "+date[1]);
          
        } else if (ed.valueOf() < sd.valueOf()) {
          // if end date is before start date throw an error
          $("#eventEnd-info").html("Data fine non può essere prima della data d'inizio.").css("color", "#ee0000").show();
          valid = false;
        }
          
        if (! valid) {
        console.log("data false");
            $('.error-field').first().focus();
            valid = false;
        } else {
        console.log("data true -> add event");
          addEvent(name, date, type, desc); 
          valid = true;
        }
          return valid;
      }
      
      /**
       * Check che input values for the treatment.
       * @return If all the values are ok it returns true.
       */
      function treatmentValidation() {
          var valid = true;

          $("#treatmentDate").removeClass("error-field");
          $("#treatmentDuration").removeClass("error-field");

          var treatmentDate = $("#treatmentDate").val();
          var treatmentDuration = parseInt($("#treatmentDuration").val());

          $("#treatmentDate-info").html("").hide();

          if(isNaN(treatmentDuration) || treatmentDuration == "") {
              $("#treatmentDuration-info").html("required.").css("color", "#ee0000").show();
              $("#treatmentDuration").addClass("error-field");
              valid = false;
          }

          if(treatmentDate == "") {
              $("#treatmentDate-info").html("required.").css("color", "#ee0000").show();
              $("#treatmentDate").addClass("error-field");
              valid = false;
          }

          if (valid == false) {
              $('.error-field').first().focus();
              valid = false;
          }
          return valid;
      }
  </script>
</body>
</html>