<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "komis";

$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
