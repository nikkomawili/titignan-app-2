<?php

if(isset($_POST["submit"])){

    // Grabbing the data from HTML
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];

    // Initiate SingupContr class
    // Ordering of include is important
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-ctr.classes.php";
    $login = new LoginCtr($uid, $pwd);

    // Running errror handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("location: ../dashboard.php?error=none");
}