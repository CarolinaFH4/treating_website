<?php
  require "connection.php";
   $id = $_GET["idfood"];
   if(!isset($id)){
    header("location:alimentos.php");
   }

  $query = "SELECT 
  f.idfood, name, f.category fcat, image, idnutri, n.idfood, parameter, n.category ncat, value, unity, description
  FROM food f, nutrition n left join glossary g on  n.parameter = g.word
  WHERE f.idfood = n.idfood 
  and f.idfood = $id";
   
  $result = mysqli_query($connection, $query);

  $queryFood = "SELECT name, image, category
                  FROM food
                  WHERE idfood = $id ";
  $resultFood = mysqli_query($connection, $queryFood);
  $currentFood = mysqli_fetch_assoc($resultFood);

  $name = $currentFood["name"];
  $image = $currentFood["image"];
  $cat = $currentFood["category"];

  /* food - benefits */
  $queryfb = "SELECT id, fb.idfood, fb.idbenefit, b.name, b.idbenefit, b.image bimage, f.idfood
              FROM food_benefit fb, food f, benefits b
              WHERE fb.idfood = f.idfood 
              AND fb.idbenefit = b.idbenefit 
              AND f.idfood  = $id";
  $fbresult = mysqli_query($connection, $queryfb);

  /* recipes carousel */
  $queryr = "SELECT * 
              FROM recipes r
             WHERE r.idfood = $id";
  $rresult = mysqli_query($connection, $queryr);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
      <div class="my-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="./alimentos.php">Alimentos</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $name?></li>
          </ol>
        </nav>
      </div>
      <div class="d-flex align-items-baseline gap-3 mt-2">
        <h1 class="mb-4">
        <?php echo $name?>
        </h1>
        <p class="fs-5">
          100g, <?php echo $cat?>
      </div>

      <section class="mb-5">
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
        
      </section>

      <section class="info">
        <div>
          <p class="mb-4 pt-3 ">
            *clica em <i class="bi bi-info-circle"></i> para saber os significados.
          </p>
          <h2 class="text-uppercase mb-4">
            Nutrientes:
          </h2>

          <div class="rounded-4 overflow-hidden mb-5">
            <table class="table table-striped mb-0">
              <tbody>
                <?php foreach($result as $food){

                  //variables
                  $ncategory =  $food["ncat"];
                  $param =      $food["parameter"];
                  $value =      $food["value"];
                  $unity =      $food["unity"];
                  $description = $food["description"];
                
                  if ($ncategory == "Nutrientes") {
                  
                  ?>
                <tr>
                  <td>
                    <span><?php echo $param; ?><span>
                    <?php if ($description != "") { ?>
                      <a data-bs-toggle="tooltip" data-bs-title="<?php echo $description; ?>" class="muted"> 
                      <i class="bi bi-info-circle"></i>
                      </a>
                    <?php } ?>
                    </td>
                  <td class="text-end"><?php echo $value; ?></td>
                  <td class="text-center"><?php echo $unity; ?></td>
                </tr>
                <?php 
                  }
              }?>
              </tbody>
            </table>
          </div>
        </div>
        
        <div>
          <h2 class="text-uppercase mb-4">
            Vitaminas:
          </h2>
          <div class="rounded-4 overflow-hidden mb-5">
            <table class="table table-striped mb-0">
            <tbody>
                <?php foreach($result as $food){

                  //variables
                  $ncategory =  $food["ncat"];
                  $param =      $food["parameter"];
                  $value =      $food["value"];
                  $unity =      $food["unity"];
                  $description = $food["description"];
                
                  if ($ncategory == "Vitaminas") {
                  
                  ?>
                <tr>
                  <td>
                    <span><?php echo $param; ?><span>
                    <?php if ($description != "") { ?>
                      <a data-bs-toggle="tooltip" data-bs-title="<?php echo $description; ?>" class="muted"> 
                      <i class="bi bi-info-circle"></i>
                      </a>
                    <?php } ?>
                    </td>
                  <td class="text-end"><?php echo $value; ?></td>
                  <td class="text-center"><?php echo $unity; ?></td>
                </tr>
                <?php 
                  }
              }?>
              </tbody>
            </table>
          </div>
        </div>

        <div>
          <h2 class="text-uppercase mb-4">
            Minerais:
          </h2>

          <div class="rounded-4 overflow-hidden mb-5">
            <table class="table table-striped mb-0">
            <tbody>
                <?php foreach($result as $food){

                  //variables
                  $ncategory =  $food["ncat"];
                  $param =      $food["parameter"];
                  $value =      $food["value"];
                  $unity =      $food["unity"];
                  $description = $food["description"];
                
                  if ($ncategory == "Minerais") {
                  
                  ?>
                <tr>
                  <td>
                    <span><?php echo $param; ?><span>
                    <?php if ($description != "") { ?>
                      <a data-bs-toggle="tooltip" data-bs-title="<?php echo $description; ?>" class="muted"> 
                      <i class="bi bi-info-circle"></i>
                      </a>
                    <?php } ?>
                    </td>
                  <td class="text-end"><?php echo $value; ?></td>
                  <td class="text-center"><?php echo $unity; ?></td>
                </tr>
                <?php 
                  }
              }?>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section class="p-3"> 
      <?php 
        $total_row = mysqli_num_rows($rresult);

        if($total_row > 0){
          echo
        '<div>
          <h3 class="text-center mb-4">Experimenta receitas com este alimento!</h3>
        </div>
        <div class="rounded-4 overflow-hidden mb-5">
          <div id="carouselExampleCaptions" class="carousel slide">
            

                <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">';

                  foreach($rresult as $row) { ?>
                    <div class="carousel-item active">
                      <img src="./media/recipes/<?php echo $row["images"]?>" class="d-block w-100" alt="<?php echo $row["title"] ?>">
                      <div class="carousel-caption d-md-block">
                        <h5><?php echo $row["title"] ?></h5>
                        <p></p>
                      </div>
                    </div>
                  <?php };
                  echo
                '</div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Seguinte</span>
            </button>
          </div>
          </div>';

        } else {
          echo
          '<div>
          <h3 class="text-center m-3">
          Estamos a desenvolver receitas para todos os teus alimentos preferidos mas entretanto explora as alternativas 
            <a href="./receitas.php" class="link-underline link-underline-opacity-100 text-uppercase">
              aqui!
            </a>
          </h3>
          </div>';

        }  ?>
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