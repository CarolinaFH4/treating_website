<?php
  if (isset($_POST["submit"])) {

  require("connection.php");

  // protected againts code injection
  $name = mysqli_real_escape_string($connection, $_POST["username"]);
  $email = $_POST["useremail"];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Presenting a positive view on food, including nutritional values, great taste and a comunity.">
    <title>Treating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@1,700&family=Heebo&family=Spinnaker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/styles.css">
  </head>



  <body>

    <?php include "header.php"?> 

    <main class="container overflow-hidden mx-auto">
        <div class="index">
          <div class="text-center">
            <h2 class= "pitch text-uppercase spinnaker-regular mb-4 mt-2">
              Onde a nutrição e a comunidade se encontram.
            </h2>
          </div>


          <span class="indexbg position-relative">
            <div class="d-flex flex-column align-items-center z-index-3">
              <div class="introimgdiv">
                <img class="introimg" src="./media/elements/comunity.png" alt="people eating together">
              </div>
              <a class="align-self-end" href="comunidade.php">Comunidade</a>
              <p class="text-center mb-4 mt-4 ">
                Treating vem esclarecer conceitos de nutrição e juntar pessoas através do poder da alimentação
              </p>
            </div>

            <div class="d-flex flex-column align-items-center z-index-3">
              <div class="introimgdiv">
                <img class="introimg" src="./media/elements/recipes.png" alt="various organic dishes">
              </div>
              <a class="align-self-end" href="receitas.php" >Receitas</a>
              <p class="text-center mb-4 mt-4">
                Selecionamos os melhores alimentos para tranformar nas melhores receitas.
              </p>
            </div>

            <div class="d-flex flex-column align-items-center z-index-3">
              <div class="introimgdiv">
                <img class="introimg"  src="./media/elements/organs.png" alt="body parts representation">
              </div>
              <a class="align-self-end" href="">Benefícios de saúde</a>
              <p class="text-center mb-4 mt-4">
                Olhamos para os alimentos como ferramentas de auto-cuidado e terapia, em vez de tendências e restrições.
              </p>
            </div>
          </span>

          <section class=" d-flex justify-content-center gap-3">
            <div>
              <img class="introicons" src="./media/icons/brain.svg" alt="brain">
            </div>
            <div>
              <img class="introicons" src="./media/icons/virus.svg" alt="virus">
            </div>
            <div>
              <img class="introicons" src="./media/icons/joints.svg" alt="joints">
            </div>
            <div >
              <img class="introicons" src="./media/icons/heart.svg" alt="heart">
            </div>
          </section>

          <div class="mt-4 text-center">
            <h3>
              O teu bem estar e esta plataforma são trabalhos em constante evolução. 
              <a type="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Partilha connosco
              </a> 
              as tuas preocupações e temas que queres ver abordados!
            </h3>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deixa a tua sugestão!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" name="email">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nunca partilharemos os teus dados.</div>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label text-left">Sugestões/Dúvidas</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Vamos evoluir em conjunto!" name="sugestion"></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>
    </main>

    <?php include "footer.php"?> 


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>
</html>