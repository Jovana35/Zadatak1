<?php
require "dbBroker.php";
require "prijava.php";

if(isset($_POST['course']) && isset($_POST['teacher']) && isset($_POST['price'])) {

    $prijava=new Prijava(null, $_POST['course'], $_POST['teacher'], $_POST['price']);
    $status=Prijava::add($prijava, $conn);
    if($status) {
        echo "Success";
    }
    else{
        echo $status;
        echo "Failed";
    }
}
?>