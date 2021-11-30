<?php
require "dbBroker.php";
require "prijava.php";


if(isset($_POST['id'])){
    $myArray = Prijava::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}
?>