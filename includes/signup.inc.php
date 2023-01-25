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
    include "../classes/signup.classes.php";
    include "../classes/signup-ctr.classes.php";
    $signup = new SignupCtr($uid, $pwd, $pwdRepeat, $email);

    // Running errror handlers and user signup
    $signup->signupUser();

    // Going back to front page
    header("location: ../index.php?error=none");
}