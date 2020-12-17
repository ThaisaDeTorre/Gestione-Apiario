<?php
use Phppot\Member;
// check if tht login button is pressed
if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    // attempts to logs the user
    $loginResult = $member->loginMember();
}
?>
<html>
<head>
    <TITLE>Login</TITLE>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/user-registration.css" type="text/css" rel="stylesheet" />
    <script src="assets/js/jquery.min.js"></script>
</head>
<body style="background: #343a40;">
  <div class="phppot-container">
    <div class="sign-up-container">
      
      <div class="login-signup">
        <a href="user-registration.php">Sign up</a>
      </div>
      
      <div class="signup-align">
        <form name="login" action="" method="post" onsubmit="return loginValidation()">
          <div class="signup-heading">Login</div>
          <?php if(!empty($loginResult)){ ?>
          <div class="error-msg"><?php echo $loginResult;?></div>
          <?php } ?>

          <div class="row">
            <div class="inline-block">
            <div class="form-label">
              Username<span class="required error" id="username-info"></span>
            </div>
              <input class="input-box-330" type="text" name="username" id="username">
            </div>
          </div>
          <div class="row">
            <div class="inline-block">
              <div class="form-label">
                Password<span class="required error" id="login-password-info"></span>
              </div>
              <input class="input-box-330" type="password" name="login-password" id="login-password">
            </div>
          </div>
          <div class="row">
            <input class="btn" type="submit" name="login-btn" id="login-btn" value="Login">
          </div>
      </form>
    </div>
  </div>
</div>

<script>
  /**
   * Check che input values for the login.
   * @return If all the values are ok it returns true.
   */
  function loginValidation() {
      var valid = true;
      $("#username").removeClass("error-field");
      $("#password").removeClass("error-field");

      var UserName = $("#username").val();
      var Password = $('#login-password').val();

      $("#username-info").html("").hide();

      if (UserName.trim() == "") {
          $("#username-info").html("required.").css("color", "#ee0000").show();
          $("#username").addClass("error-field");
          valid = false;
      }
      if (Password.trim() == "") {
          $("#login-password-info").html("required.").css("color", "#ee0000").show();
          $("#login-password").addClass("error-field");
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
