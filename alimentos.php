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
  </style>


  <body>

  <?php include "header.php"?> 

  <main>
    <div>

    </div>
    <div>
      <h1>
        Alimentos
      </h1>
      <p>
        At Treating we focus on unprocessed food detailed values for you to decide where to start!
      </p>
    </div>

    <section class="d-flex justify-content-center gap-3">

      <div class="d-flex col-6 flex-column justify-content-between">
        <div class="mask1 overflow-hidden ">
          <img src="./media/images/abacate.jpg" alt="Sofia Paixão, glutenfree.pt" class="w-100">
        </div>
        <h3 mt-3>
          Abacate
        </h3>
      </div>

      <div class="d-flex col-6 flex-column justify-content-between">
        <div class="mask1 overflow-hidden ">
          <img src="./media/images/alho.jpg" alt="Sofia Paixão, glutenfree.pt" class="w-100">
        </div>
        <h3>
          Alho
        </h3>
      </div>
    </section>
  </main>



  
  <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>