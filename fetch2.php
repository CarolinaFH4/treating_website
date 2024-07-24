<?php
include("connection.php");

  $searchString = $_POST["search"];
  $query = "SELECT * 
              FROM food
              WHERE name
              LIKE '%" .$_POST["search"]. "%' ORDER BY name ASC";

  $statement = mysqli_query($connection, $query);
  $result = mysqli_fetch_all($statement);
  $total_row = mysqli_num_rows($statement);
  $output = '';


  if($total_row > 0){
    foreach($statement as $food) {

      $idfood = $food["idfood"];
        
      if($idfood % 2 == 0){
        $mask = '2';
      } else{
        $mask = '1';
      };
    ?>

        <div class="p-0 mb-4 col-6 col-md-4">
          <a href="detalhealimento.php?idfood=<?php echo $idfood?>">
            <div class="mask<?php echo $mask ?> overflow-hidden">
              <img src="./media/alimentos/<?php echo $food["image"]; ?>" alt="<?php echo $food["name"] ?>" class="img-fluid">
            </div>
            <p class="my-3 fs-5 text-center"><?php echo $food["name"]; ?></p>
          </a>
        </div>

    <?php }

    } else {
         $output .= '<div id="loading"><h2>Não encontrámos resultados para a tua pesquisa, tenta de novo!</h2></div>';
         echo $output;
    }
  

?>