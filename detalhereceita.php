<?php
require "connection.php";
$idrec = $_GET["idrecipe"];
if(!isset($idrec)){
 header("location:receitas.php");
}

$query = "SELECT *
          FROM recipes
          WHERE idrecipe = $idrec";

$result = mysqli_query($connection, $query);
$rec = mysqli_fetch_assoc($result);

$idrecipe = $rec["idrecipe"];
$idfood = $rec["idfood"];
$title = $rec["title"];
$ingredients = explode(PHP_EOL, $rec["ingredients"]);
$steps = explode(PHP_EOL, $rec["steps"]);
$time = $rec["time"];
$image = $rec["images"];
$serving = $rec["servings"];


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
    <link rel="stylesheet" href="./CSS/styles.css">
  </head>

  <style>
    .mask3 {
      -webkit-mask-image: url(./media/icons/bigblob.svg);
      mask-image: url(./media/icons/bigblob.svg);
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

      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Receitas</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $title?></li>
        </ol>
      </nav>

      <div class="d-flex align-items-baseline gap-3">
        <h1>
          <?php echo $title?>
        </h1>
        <p> 
          <?php echo "$serving doses, $time min."?>
        </p>
      </div>

      <section class="">
          <div class="mask3 overflow-hidden">
            <img src="./media/recipes/<?php echo $image; ?>" alt="<?php echo $title ?>" class="introimg w-100">
          </div>
      </section>

      <section class="info">
        <div>
          <h2 class="text-uppercase">Ingredientes:</h2>
          <div class="card bg-primary-subtle mb-3 p-4">
            <?php //echo nl2br($steps)
              foreach ($ingredients as $ing)
                echo "<p class='card-text'>$ing</p>"; 
            ?>
          </div>
        </div>
        <div>
          <h2 class="text-uppercase">Passos:</h2>
          <div class="card bg-secondary-subtle mb-3 p-4">
            <?php //echo nl2br($steps)
              foreach ($steps as $step)
                  echo "<p class='card-text'>$step</p>"; 
              ?>
          </div>
        </div>  
      </section>
      
      <section> 
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner w-100">
            <?php foreach($result as $row) { ?>
              <div class="carousel-item active">
                <img src="media/recipes/<?php echo $row["images"]?>" class="d-block w-100" alt="<?php echo $row["title"] ?>">
                <div class="carousel-caption d-md-block">
                  <h3 ><?php echo $row["title"] ?></h3>
                </div>
              </div>
            <?php } ?>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
    </div>
  </main>

  <?php include "footer.php"?>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>