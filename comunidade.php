<?php
  require("connection.php");

  $query = "SELECT * 
  FROM comunity";
  
  $result = mysqli_query($connection, $query);
  $comunity = mysqli_fetch_assoc($result);

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
        <h1 class="mb-4">Comunidade</h1>
        <p class="mb-5 pb-2 fs-5 mt-4">
          A alimentação faz parte de um estilo de vida. Escolhe as tuas inspirações!
        </p>
      </div>

      <div class="">

        <?php
            foreach ($result as $com) {
              $image1 = $com["image1"];
              $image2 = $com["image2"];
              $link = $com["link"];
              $linktitle = $com["link_title"];
              $influencer = $com["name"];
              $quote = $com["quote"];
        ?>

        <div class="row justify-content-center py-3">

          <div class="d-flex row row-cols-2">
            <div class="mask1 p-0">
              <img src="<?php echo './media/comunidade/'.$image1 ; ?>" alt="Abacate" class="img-fluid heig">
            </div>
            <div class="mask2 p-0">
              <img src="<?php echo './media/comunidade/'.$image2 ; ?>" alt="Alho" class="img-fluid">
            </div>
          </div>
          <div class="row justify-content-center py-4">
            <p class=" text-center fs-5 mb-1">
              <?php echo $influencer;?>
            </p>
            <a class="w-100 text-center mb-2" href="<?php echo $link; ?>">
              <?php echo $linktitle; ?>
            </a>
            <p class="mt-4 mb-4 fs-5">
              <?php echo $quote;?>
            </p>
            
          </div>

        </div>
       
        <?php }?>
      </div>
      
    </div>
  </main>

  <?php include "footer.php"?>


  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>