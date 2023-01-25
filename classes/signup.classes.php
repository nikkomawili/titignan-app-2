<!-- Run this if you want to do something databse related.-->

<?php

class Signup extends Dbh {


    protected function setUser($uid, $pwd, $email) {
        //? variables go in to database first before the query, thus hopefully avoiding SQL injections
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?,?,?);');
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))){
            $stmt = null;
            header("location ../index.php?error=stmtfailed_checkuser");
            exit();
        }

       $stmt = null;
    }

   protected function checkUser($uid, $email) {
        //? variables go in to database first before the query, thus hopefully avoiding SQL injections
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
    
        if(!$stmt->execute(array($uid, $email))){
            $stmt = null;
            header("location ../index.php?error=stmtfailed_checkuser");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        } return $resultCheck;
    }

}