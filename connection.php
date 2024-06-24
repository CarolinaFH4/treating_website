<?php 
$server = "localhost";
$schema = "treating";
$user = "root";
$pwd = "root";

$connection = mysqli_connect($server, $user, $pwd, $schema);
mysqli_set_charset($connection, 'utf8');

if (!$connection) {
  die("Error connection db ...");
};

//print_r($connection);
?>