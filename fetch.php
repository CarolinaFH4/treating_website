<?php

if(isset($_POST["action"])) {
    $query = "SELECT * FROM recipes WHERE true";

    if (isset($_POST["az"])){

        $query .= "AND ORDER BY title ASC";
    };
    if (isset($_POST["az"])){

        $query .= "AND ORDER BY time ASC";
    };
    if (isset($_POST["az"])){
        $alling = explode(PHP_EOL, $_POST["ingredients"]);
        $query .= "AND ORDER BY $alling ASC";
    }
}

?>