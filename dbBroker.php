<?php
$host="localhost";
$db="code";
$user="root";
$password="";

$conn=new mysqli($host, $user, $password, $db);


if($conn->connect_errno) {
    exit("Neuspesna konekcija: greska>".$conn->connect_error.", err kod>".$conn->connect_errno);
}
?>