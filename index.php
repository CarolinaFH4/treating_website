<?php
  

$email = "";
$text = "";
$msgType = "";
$msg = "";

  if (isset($_POST["submit"])) {

  require("connection.php");

  $email = $_POST["email"];
  $sugestion = mysqli_real_escape_string($connection, $_POST["sugestion"]);


  $query = "insert into sugestions
                values ('$email' , '$sugestion')";
    mysqli_query($connection, $query);
  
    if (mysqli_affected_rows($connection) == 1) {
      $msgType = "success";
      $msg = "Enviado!";
    } else {
      $msgType = "danger";
      $msg = "E-mail ou texto inválidos.";
    }

  }

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
            <h2 class= "pitch text-uppercase spinnaker-regular mb-5 mt-5 fs-4">
              Onde a nutrição e a comunidade se encontram.
            </h2>
          </div>


          <span class="indexbg position-relative">
            <div class="d-flex flex-column align-items-center z-index-3">
              <div class="introimgdiv">
                <img class="introimg" src="./media/elements/comunity.png" alt="people eating together">
              </div>
              <a class="align-self-end mt-2" href="comunidade.php">Comunidade</a>
              <p class="text-center mb-4 mt-4 fs-5">
                Treating vem esclarecer conceitos de nutrição e juntar pessoas através do poder da alimentação
              </p>
            </div>

            <div class="d-flex flex-column align-items-center z-index-3">
              <div class="introimgdiv">
                <img class="introimg" src="./media/elements/recipes.png" alt="various organic dishes">
              </div>
              <a class="align-self-end mt-2" href="receitas.php" >Receitas</a>
              <p class="text-center mb-4 mt-4 fs-5">
                Selecionamos os melhores alimentos para tranformar nas melhores receitas.
              </p>
            </div>

            <div class="d-flex flex-column align-items-center z-index-3">
              <div class="introimgdiv">
                <img class="introimg"  src="./media/elements/organs.png" alt="body parts representation">
              </div>
              <a class="align-self-end mt-2" href="">Benefícios de saúde</a>
              <p class="text-center mb-4 mt-4 fs-5">
                Olhamos para os alimentos como ferramentas de auto-cuidado e terapia, em vez de tendências e restrições.
              </p>
            </div>
          </span>

          <section class=" d-flex justify-content-center gap-3 m-4">
            <div class="d-flex row">
              <img class="introicons" src="./media/icons/brain.svg" alt="brain">
              <p class="text-center">
                Atividade cerebral
              </p>
            </div>
            <div class="d-flex row">
              <img class="introicons" src="./media/icons/virus.svg" alt="virus">
              <p class="text-center">
                Antiviral
              </p>
            </div>
            <div class="d-flex row">
              <img class="introicons" src="./media/icons/joints.svg" alt="joints">
              <p class="text-center">
                Ossos e articulações
              </p>
            </div>
            <div class="d-flex row">
              <img class="introicons" src="./media/icons/heart.svg" alt="heart">
              <p class="text-center">
                Sistema cardiovascular
              </p>
            </div>
          </section>

          <div class="mt-4 text-center">
            <p class=" fs-5  mb-4 mt-5">
              O teu bem estar e esta plataforma são trabalhos em constante evolução. 
                <a type="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Partilha connosco
                </a> 
              as tuas preocupações e temas que queres ver abordados!
            </p>

<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deixa a tua sugestão!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body pb-0">
                <form method = "post" enctype = "multipart/form-data" class="needs-validation">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" >
                    <div id="emailHelp" class="form-text">Nunca partilharemos os teus dados.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-left">Sugestões / Dúvidas</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Vamos evoluir em conjunto!" name="sugestion"></textarea>
                  </div>

                  <div class="d-flex justify-content-end align-items-baseline">
                      <p class="me-2 text-decoration-underline text-<?php echo $msgType?>"><?php echo $msg?></p>
                      <button type="submit" class="btn btn-primary m-3" name ="submit">Send</button>
                  </div>

                </form>
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