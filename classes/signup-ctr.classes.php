<!-- Run this if you want to "change" something in the database.-->
<?php 

class SignupCtr extends Signup{

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        } if($this->invalidUid() == false){
            header("location: ../index.php?error=invaliduid");
            exit();
        } if($this->invalidEmail() == false){
            header("location: ../index.php?error=invalidemail");
            exit();
        } if($this->pwdMatch() == false){
            header("location: ../index.php?error=pwdmatch");
            exit();
        } if($this->uidTakenCheck() == false){
            header("location: ../index.php?error=uidtakencheck");
            exit();
        } 

        $this->setUser($this->uid, $this->pwd, $this->email);

    }


    // Error Handlers
    private function emptyInput() {
        $result = false;

        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
            $result = false;
        } else
        {
            $result = true;
        } return $result;

    }

    private function invalidUid() {
        $result = false;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        } else {
            $result = true;
        } return $result;
    }

    private function invalidEmail() {
        $result = false;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else {
            $result = true;
        } return $result;
    } 

    private function pwdMatch() {
        $result = false;

        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        } return $result;
    }

    //An error handler that handles if it has an existing username or email
    private function uidTakenCheck() {
        $result = false;

        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        } return $result;

        // Lots more error handlers
    }
}