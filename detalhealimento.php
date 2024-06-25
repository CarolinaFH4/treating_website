<?php
  require "connection.php";
   $id = $_GET["idfood"];
   if(!isset($id)){
    header("location:alimentos.php");
   }

  $query = "SELECT 
            f.idfood, name, f.category fcat, image, idnutri, n.idfood, parameter, n.category ncat, value, unity
            FROM food f, nutrition n
            WHERE f.idfood = n.idfood
            and f.idfood = $id";
   
  $result = mysqli_query($connection, $query);
  $food = mysqli_fetch_assoc($result);


  //variables
  $name = $food["name"];
  $fcategory = $food["fcat"];
  $image = $food["image"];
  $ncategory = $food["ncat"];
  $param = $food["parameter"];
  $value = $food["value"];
  $unity = $food["unity"];

  $querynutri = "SELECT * 
                  FROM nutrition
                  WHERE idfood = $id 
                  AND category = 'Nutrientes'";
  $nutriresult = mysqli_query($connection, $querynutri);

  $queryvit = "SELECT * 
                FROM nutrition
                WHERE idfood = $id 
                AND category = 'Vitaminas'";
  $vitresult = mysqli_query($connection, $queryvit);

  $querymin = "SELECT * 
                FROM nutrition
                WHERE idfood = $id 
                AND category = 'Minerais'";
  $minresult = mysqli_query($connection, $querymin);

  $queryfb = "SELECT id, fb.idfood, fb.idbenefit, b.name, b.idbenefit, b.image bimage, f.idfood
              FROM food_benefit fb, food f, benefits b
              WHERE fb.idfood = f.idfood 
              AND fb.idbenefit = b.idbenefit 
              AND f.idfood  = $id";
  $fbresult = mysqli_query($connection, $queryfb);

  $queryr = "SELECT * 
              FROM recipes
              WHERE idfood = $id";
  $rresult = mysqli_query($connection, $queryr);

  $queryglo = "SELECT word, description
                FROM glossary
                WHERE EXISTS (
                  SELECT parameter, category, unity
                  FROM nutrition
                  WHERE parameter = word OR category = word OR unity =word
              	  );"; 
  $gresult = mysqli_query($connection, $queryglo);
  $meaning = mysqli_fetch_assoc($gresult);

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

      <div class="d-flex align-items-baseline gap-3">


        <h1>
        <?php echo $name?>
        </h1>
        <p>
          100g, <?php echo $fcategory?>
      </div>

      <section class="">
        <div class="d-flex align-items-center col flex-column h-100 flex-grow-1">
          <div class="mask3 overflow-hidden">
            <img src="./media/alimentos/<?php echo $image; ?>" alt="<?php echo $name ?>" class="w-100">
          </div>
          <div>
            <?php foreach($fbresult as $row) { ?>
            <i><img src="media/icons/<?php echo $row["bimage"] ?>" alt="intestine"></i>
            <?php } ?>
          </div>
        </div>
        <p class="m-3">*clica nos elementos sublinhados para saber mais!</p>
      </section>

      <section class="info">
        <div>
          <h2 class="text-uppercase">Nutrientes:</h2>

          <table class="table table-striped">
            <tbody>
              <?php foreach($nutriresult as $row){?>
              <tr>
                <td><?php echo $row["parameter"]?></td>
                <td class="text-end"><?php echo $row["value"]?></td>
                <td class="text-center"><?php echo $row["unity"]?></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
        <div>
          <h2 class="text-uppercase"> Vitaminas:</h2>

          <table class="table table-striped">
            <tbody>
            <?php foreach($vitresult as $row){
                  foreach($meaning as $mean ){ ?>
              <tr>
                <td>
                  <a data-bs-toggle="tooltip" data-bs-title="<?php echo $mean?>" class="muted"><?php echo $row["parameter"]?>
                  </a>
                </td>
                <td class="text-end">
                  <a data-bs-toggle="tooltip" data-bs-title="<?php echo $mean?>" class="muted"><?php echo $row["value"]?>
                  </a>
                </td>
                <td class="text-center">
                  <a data-bs-toggle="tooltip" data-bs-title="<?php echo $mean?>" class="muted"><?php echo $row["unity"]?>
                  </a>
                </td>
              </tr>
              <?php } }?>
            </tbody>
          </table>
        </div>

        <div>
          <h2 class="text-uppercase"> Minerais:</h2>
          <table class="table table-striped">
            <tbody>
            <?php foreach($minresult as $row){ ?>
              <tr>
                <td><?php echo $row["parameter"]?></td>
                <td class="text-end"><?php echo $row["value"]?></td>
                <td class="text-center"><?php echo $row["unity"]?></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </section>

      <section class="test">
        <table class="table">
          <tbody>
            <thead>
              <td>
                Glossary
              </td>
            </thead>
            <tr>
              <?php
                foreach ($gresult as $row){
              ?>
               <td><a data-bs-toggle="tooltip" data-bs-title="<?php echo $meaning?>" class="muted">kcal</a></td> 

              <?php
                }
              ?>
              
              <td>Energia</td>
              <td>Ferro</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section> 
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner">
            <?php foreach($rresult as $row) { ?>
              <div class="carousel-item active">
                <img src="media/recipes/<?php echo $row["image"]?>" class="d-block w-100" alt="<?php echo $row["title"] ?>">
                <div class="carousel-caption d-md-block">
                  <h5><?php echo $row["title"] ?></h5>
                  <p></p>
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

  <script>

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  </script>

  </body>