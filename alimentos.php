<?php
  require "connection.php";

  $noresults = false;
  $msgType = "";
  
  if (isset($_GET["submit"])) {

    $searchString = $_GET["searchString"];

    $query = "SELECT idfood, name, category, image
    FROM food
    WHERE name like '%$searchString%'
    ORDER BY name ASC";

    $result = mysqli_query($connection, $query);
    $food = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 0) {
      // no results
      $noresults = true;
      $msgType = "info";
    }

  } else {
      $query = "SELECT idfood, name, category, image
            FROM food
            ORDER BY name ASC";

      $result = mysqli_query($connection, $query);
      $food = mysqli_fetch_assoc($result); 


  }

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Presenting a positive view on food, including nutritional values, great taste and a comunity.">
    <title>Treating</title>
    <link rel="icon" type="image/png" href="./media/elements/logoHead.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,700&family=Heebo&family=Spinnaker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
      <div class="mt-5">
        <h1 class="mb-4">Alimentos</h1>
        <p class="mb-5 fs-5">Na treating investimos na informação de alimentos menos processados para que possas escolher o teu ponto de partida.</p>
      </div>

      <div class="my-4s">
        <div class="searchal input-group mb-5">
          <input type="text" class="searchbar form-control bg-transparent border-0" placeholder="Procura um alimento" aria-label="Procura um alimento.." aria-describedby="button-addon2" name="searchString"
          value="<?php
          if (isset($searchString))
            echo $searchString;
          ?>">

          <i class="p-2 me-2">
            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12.375" cy="12.375" r="6.75" stroke="#060901" stroke-width="0.931035"/>
              <path d="M24.3 24.3L18.225 18.225" stroke="#060901" stroke-width="0.931035" stroke-linecap="round"/>
            </svg>
          </i>
        </div>
      </div>

      <div class="m-0 alert alert-<?php echo $msgType; ?>">
        <?php
        if ($noresults)
          echo "Sem resultados";
        ?>
      </div>

      <div class="row filter_data">
        <?php
          foreach ($result as $food) {
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

        <?php }?>
      </div>
    </div>
  </main>

  <?php include "footer.php"?>


  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){

      $("#searchString").keyup(function(){
        let txt = $(this).val();

        if(txt != ''){
          $('.filter_data').html('');
          $.ajax({

            url: "fetch2.php",
            method: "POST",
            data {search:txt},
            dataType: "text",
            success: function(data) {
              $('.filter_data').html(data);
            }
          });
          
        } else {
          $('.filter_data').html('');
          $.ajax({

            url: "fetch2.php",
            method: "POST",
            data {search:txt},
            dataType: "text",
            success: function(data) {
              $('.filter_data').html(data);
            }
          });
        }

      });

    });
  </script>

  </body>
</html>