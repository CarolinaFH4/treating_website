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

    <main class="overflow-hidden mx-auto">
        <div class="index">

          <div class="text-center">
            <h2 class= "pitch text-uppercase spinnaker-regular m-4 fs-4">
              Onde a nutrição e a comunidade se encontram.
            </h2>
          </div>

          <span class="">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#B2CF82" fill-opacity="1" d="M0,160L40,160C80,160,160,160,240,181.3C320,203,400,245,480,224C560,203,640,117,720,117.3C800,117,880,203,960,234.7C1040,267,1120,245,1200,224C1280,203,1360,181,1400,170.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
              </svg>
            </span>

          <div class="indexbg">
            
            
            <div class="d-flex flex-column align-items-center ">
              <p class="text-center mb-4 mt-4 fs-5">
                Conecta-te com a tua alimentação para te conectares contigo e com ótima companhia. Rodeia-te das melhores influências.
              </p>
              <a href="comunidade.php"  class="text-decoration-none badge rounded-pill bg-secondary-subtle fs-5 p-3">
                Explora- as aqui
              </a>
              <div class="introimgdiv m-5">
                <img class="introimg" src="./media/elements/comunity.png" alt="people eating together">
              </div>
              <p class="text-center mb-4 mt-4 fs-5">
                Escolhe os ingredientes da tua vida baseados nas tuas necessidades de saúde para que te sintas o teu melhor!
              </p>
            </div>

            <div class=" d-flex justify-content-center gap-3 m-4">
              <div class="d-flex row justify-content-center">
                <img class="introicons" src="./media/icons/virus.svg" alt="virus">
                <p class="text-center">
                Sistema imunológico
                </p>
              </div>
              <div class="d-flex row justify-content-center">
                <img class="introicons" src="./media/icons/joints.svg" alt="joints">
                <p class="text-center">
                  Ossos e articulações
                </p>
              </div>
              <div class="d-flex row justify-content-center">
                <img class="introicons" src="./media/icons/heart.svg" alt="heart">
                <p class="text-center">
                  Sistema cardiovascular
                </p>
              </div>
            </div>

            <div class="d-flex flex-column align-items-center z-index-3">
              <p class="text-center mb-4 mt-4 fs-5">
                  Selecionamos os melhores alimentos para tranformar nas melhores receitas.
              </p>
              <a href="receitas.php" class="text-decoration-none badge rounded-pill  bg-secondary-subtle text-body-color fs-5 p-3">
                Explora aqui as receitas
              </a>
              <div class="introimgdiv m-5">
                <img class="introimg" src="./media/elements/recipes.png" alt="various organic dishes">
              </div>
            </div>
          </div>

          <span class="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="#B2CF82" fill-opacity="1" d="M0,160L40,160C80,160,160,160,240,181.3C320,203,400,245,480,224C560,203,640,117,720,117.3C800,117,880,203,960,234.7C1040,267,1120,245,1200,224C1280,203,1360,181,1400,170.7L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
            </svg>
          </span>

        <div class="mt-4 text-center">
          <p class=" fs-5  mb-4 mt-5">
            Estamos em constante evolução contigo.
            Partilha connosco as tuas preocupações e temas que queres ver abordados sem deixar a página.
          </p>
          <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg class="mt-4 mb-5" width="60" viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.671761 15.4108C0.625 17.3195 0.625 19.4865 0.625 21.9584V29.0417C0.625 39.0591 0.625 44.0677 3.73699 47.1797C6.84898 50.2917 11.8577 50.2917 21.875 50.2917H43.125C53.1423 50.2917 58.151 50.2917 61.263 47.1797C64.375 44.0677 64.375 39.0591 64.375 29.0417V21.9584C64.375 19.4865 64.375 17.3195 64.3282 15.4108L35.94 31.1821C33.8006 32.3706 31.1994 32.3706 29.06 31.1821L0.671761 15.4108ZM1.48552 7.89689C1.77904 7.97059 2.06787 8.08341 2.34499 8.23736L32.5 24.9901L62.655 8.23736C62.9321 8.08341 63.221 7.97059 63.5145 7.89689C63.0541 6.21986 62.3476 4.90493 61.263 3.82036C58.151 0.708374 53.1423 0.708374 43.125 0.708374H21.875C11.8577 0.708374 6.84898 0.708374 3.73699 3.82036C2.65243 4.90493 1.94585 6.21986 1.48552 7.89689Z" fill="#060901"/>
              </svg>
            </a>

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