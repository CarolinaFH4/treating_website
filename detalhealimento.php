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
          Abacate
        </h1>
        <p>
          100g, Fruta
      </div>

      <section class="">
        <div class="d-flex align-items-center col flex-column h-100 flex-grow-1">
          <div class="mask3 overflow-hidden">
            <img src="./media/alimentos/abacate.jpg" alt="Abacate" class="w-100">
          </div>
          <div>
            <i><img src="media/icons/intestine.svg" alt="intestine"></i>
            <i><img src="media/icons/heart.svg" alt="heart"></i>
            <i><img src="media/icons/brain.svg" alt="brain"></i>
          </div>
        </div>
        <p class="m-3">*clica nos elementos sublinhados para saber mais!</p>
      </section>

      <section class="values">
        <h2 class="text-uppercase"> Nutrientes:</h2>

        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Energia:</td>
              <td class="text-end">Otto</td>
            </tr>
            <tr>
              <td>Ácidos gordos saturados:</td>
              <td class="text-end">Thornton</td>
            </tr>
            <tr>
              <td>Ácidos gordos monoinsaturados:</td>
              <td class="text-end">Otto</td>
            </tr>
            <tr>
              <td>Ácidos gordos polinsaturados:</td>
              <td class="text-end">Thornton</td>
            </tr>
          </tbody>
        </table>
      </section>
    <div>
  </main>