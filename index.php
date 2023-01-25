<?php
  session_start();
?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<div class="container">

  <div class="one">
    
      <!--<li><a href="#">Dashboard</a></li>
      <li class="center"><a href="#">Portfolio</a></li>
      <li class="upward"><a href="#">Services</a></li>
      <li class="forward"><a href="#">Feedback</a></li>-->
      <?php if (isset($_SESSION["userid"]))
        {
      ?>
      <ul class="nav-links">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
        <li><a href="includes/logout.inc.php">Logout</a></li>
      </ul>
      <?php
        }
        else
        {
      ?>
        <!--<li><a href="#">Sign Up</a></li>
        <li><a href="#">Login</a></li>-->
      <?php
        }
      ?>
    
  </div>

  <!-- SECTION 1 -->
  <div class="two" id="section1">
    <input type="checkbox" id="flip">

    <div class="cover">
      <div class="front">
        <!--<img src="images/frontImg.jpg" alt="">-->
        <div class="text">
          <!--<span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>-->
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="includes/login.inc.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your username" name="uid" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="pwd" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="includes/signup.inc.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your username" name="uid" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="pwd" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Repeat your password" name="pwdRepeat" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>

</body>
</html>