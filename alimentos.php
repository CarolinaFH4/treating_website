<?php
  require "connection.php";

  $query = "SELECT idfood, name, category, image
            FROM food";
   
  $result = mysqli_query($connection, $query);
  $food = mysqli_fetch_assoc($result);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,700&family=Heebo&family=Spinnaker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/styles.css">
  </head>

  <style>
    .mask1 {
      -webkit-mask-image: url(./media/icons/blob1.svg);
      mask-image: url(./media/icons/blob1.svg);
      -webkit-mask-repeat: no-repeat;
      mask-repeat: no-repeat;
      mask-size: 9em;
      mask-size: contain;
      -webkit-mask-position:center;
    }
    .mask2 {
      -webkit-mask-image: url(./media/icons/blob2.svg);
      mask-image: url(./media/icons/blob2.svg);
      -webkit-mask-repeat: no-repeat;
      mask-repeat: no-repeat;
      mask-size: 9em;
      mask-size: contain;
      -webkit-mask-position:center;
    }
  </style>


  <body>

  <?php include "header.php"?> 

 <main>
    <div class="container">
      <div>
        <h1>Alimentos</h1>
        <p>Na treating investimos na informação de alimentos menos processados para que possa escolher o teu ponto de partida.</p>
      </div>
      <div class="row">
      <?php
        foreach ($result as $food) {
          $idfood = $food["idfood"];
          if($idfood % 2 == 0){
            $mask = '2';
          } else{
            $mask = '1';
          };
      ?>
        <div class="p-0 col-6 col-md-4">
          <a href="detalhealimento.php?idfood=<?php echo $idfood?>">
            <div class="mask<?php echo $mask ?> overflow-hidden">
              <img src="./media/alimentos/<?php echo $food["image"]; ?>" alt="<?php echo $food["name"] ?>" class="img-fluid">
            </div>
            <p class="mt-2 text-center"><?php echo $food["name"]; ?></p>
          </a>
        </div>

        <?php }?>
    </div>
  </main>

  <?php include "footer.php"?>


  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>