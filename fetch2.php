<?php
include("connection.php");

if(isset($_POST["txt"])) {
  
  $query = "SELECT * 
              FROM food
              WHERE name
              LIKE '%'.$_POST["search"].'$'";
              
  $statement = mysqli_query($connection, $query);
  $result = mysqli_fetch_all($statement);
  $total_row = mysqli_num_rows($statement);
  $output = '';


}
?>