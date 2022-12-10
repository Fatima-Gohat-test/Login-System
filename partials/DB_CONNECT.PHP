<?php
$servername="localhost";
$username="root";
$password="";
$database="user45";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){

    echo "Con unsuccessful";
}


?>