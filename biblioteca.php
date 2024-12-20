<?php
  require("connection.php");  

  $query = "SELECT *
            FROM library";

  $result = mysqli_query($connection, $query);
  $documents = mysqli_fetch_assoc($result);
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



  <body>

    <?php include "header.php"?> 

    <main class="">
      <div class="container py-2">

        <div class="mt-5">
          <h1 class="mb-4">Biblioteca</h1>
          <p class="mb-5 pb-2 fs-5 mt-4">Organiza o teu tempo e alimentação com templates e artigos que selecionámos para ti.</p>
        </div>
        
        <div class="row justify-content-center gap-4 mb-5">
          <?php
            foreach($result as $doc){
              $title = $doc["title"];
              $desc = $doc["description"];
              $image = $doc["thumbnail"];
              $file = $doc["link"];
            ?>
              <div class="cardbiblio card col-11 col-sm-5 col-md-5 col-lg-3 gap-2 rounded-4" style="">
                  <img src="<?php echo './media/docs/'.$image ;?>" class="card-img mt-3 rounded-4" alt="<?php echo ' pré-visualização de '.$title?>">
                  <div class="card-body row justify-content-center align-content-between py-3">
                    <h2 class="card-title text-center mb-3"><?php echo $title ?></h2>
                    <p class="card-text"><?php echo $desc ?></p>
                    
                    <a class=" d-flex justify-content-center align-items-center text-decoration-none rounded-pill bg-primary-subtle p-3 gap-2" href="" download="<?php echo './media/docs/'.$file?>">
                      <img src="./media/icons/download.svg"></img>
                      <p class="m-0"> Descarregar</p>
                     
                    </a>
                  </div>
                
              </div>

          <?php } ?>
        </div>

      </div>
    </main>

    <?php include "footer.php"?> 


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>

    </script>

  </body>
</html>