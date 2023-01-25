<!-- Run this if you want to "change" something in the database.-->
<?php 

class LoginCtr extends Login{

    private $uid;
    private $pwd;

    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);

    }


    // Error Handlers
    private function emptyInput() {
        $result = false;

        if(empty($this->uid) || empty($this->pwd)){
            $result = false;
        } else
        {
            $result = true;
        } return $result;

    }

        // Lots more error handlers
}