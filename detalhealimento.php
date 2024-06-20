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
  $minresult = mysqli_query($connection, $queryvit);
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
          100g, Fruta
      </div>

      <section class="">
        <div class="d-flex align-items-center col flex-column h-100 flex-grow-1">
          <div class="mask3 overflow-hidden">
            <img src="./media/alimentos/<?php echo $image; ?>" alt="<?php echo $name ?>" class="w-100">
          </div>
          <div>
            <i><img src="media/icons/intestine.svg" alt="intestine"></i>
            <i><img src="media/icons/heart.svg" alt="heart"></i>
            <i><img src="media/icons/brain.svg" alt="brain"></i>
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
            <?php foreach($vitresult as $row){ ?>
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

    <div>
  </main>

  <?php include "footer.php"?>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>