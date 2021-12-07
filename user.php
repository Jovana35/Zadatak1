<?php 

class User {
public $id;
public $firstname;
public $lastname;
public $email;
public $password;

public function __construct($id=null, $firstname=null, $lastname=null,$email=null,$password=null) {
    $this->id=$id;
    $this->firstname=$firstname;
    $this->lastname=$lastname;
    $this->email=$email;
    $this->password=$password;

}
public static function logIn($usr, mysqli $conn) {
$query="SELECT * FROM users WHERE firstname='$usr->firstname' and lastname='$usr->lastname' and email='$usr->email' and password='$usr->password'";


//ovde se povezujemo sa bazom
return $conn->query($query);
}
}

?>