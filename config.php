<?php
$servername="localhost";
$username="root";
$password="";
$dbname="indian_bank";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
    die("Could not connect to the database due to the following error-->" .mysqli_connect_error());
}
?>