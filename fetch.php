<?php
include("connection.php");

if(isset($_POST["action"])) {
    $query = "SELECT * FROM recipes ";
  
 

    if (isset($_POST["az"])){
        $az_filter = $_POST["az"];
        $query .= "ORDER BY title ASC";
    }

    if (isset($_POST["fastest"])){
        $fastest_filter = $_POST["fastest"];
        $query .= "ORDER BY time ASC";
    }
 
    if (isset($_POST["ingredients"])){
        $ingredients_filter = $_POST["ingredients"];
        $query .= "ORDER BY n_ing ASC";
    }



$statement = mysqli_query($connection, $query);
$result = mysqli_fetch_all($statement);
$total_row = mysqli_num_rows($statement);
$output = '';

if($total_row > 0){
foreach ($statement as $rec) {
          
    $idrec = $rec["idrecipe"];
    if($idrec % 2 == 0){
      $mask = '2';
    } else{
      $mask = '1';
    };

    
?>
  <div class="p-0 col-6 col-md-4">
    <a href="detalhereceita.php?idrecipe=<?php echo $idrec?>">
      <div class="mask<?php echo $mask ?> overflow-hidden">
        <img src="./media/recipes/<?php echo $rec["images"]; ?>" alt="<?php echo $rec["title"]; ?>" class="img-fluid">
      </div>
      <p class="mt-2 text-center"><?php echo $rec["title"]; ?></p>
    </a>
  </div>

  <?php }

  
} else {
    $output .= '<div id="loading"> <h4> Não encontrámos os resultados da tua pesquisa...</h4></div>';
}


}

?>