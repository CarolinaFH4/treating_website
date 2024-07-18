<?php

  require "connection.php";

  $query = "SELECT * 
            FROM recipes
            ORDER BY title ASC";
            
  $result = mysqli_query($connection, $query);
  $recipes = mysqli_fetch_assoc($result);

  
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
      <div class=" d-flex justify-content-between mb-2">
        <h1>Receitas</h1>

          <div class="dropdown">
            <button class="badge rounded-pill dropdown-toggle p-2 " type="button" data-bs-toggle="dropdown" aria-expanded="false" >
              Ordenar
            </button>

            <ul class="dropdown-menu">
              <li>
                <input type="radio" class="az common_selector" name="filter"> A-Z 
              </li>
              <li>
                <input type="radio" class="fastest common_selector" name="filter"> Mais rápido
              </li>
              <li>
                <input type="radio" class="ingredients common_selector" name="filter">Menos ingredientes
              </li>
            </ul>
          </div>

      </div>

      <div class="row filter_data">
      <?php
        foreach ($result as $rec) {
          
          $idrec = $rec["idrecipe"];
          if($idrec % 2 == 0){
            $mask = '2';
          } else{
            $mask = '1';
          };

          
      ?>
        <div class="p-0 col-6 col-md-4">
          <a href="detalhereceita.php?idrecipe=<?php echo $idrec?>">
            <div class="mask<?php echo $mask ?> overflow-hidden">
              <img src="./media/recipes/<?php echo $rec["images"]; ?>" alt="<?php echo $rec["title"]; ?>" class="img-fluid">
            </div>
            <p class="mt-2 text-center"><?php echo $rec["title"]; ?></p>
          </a>
        </div>

        <?php }?>
      
    </div>
  </main>

  <?php include "footer.php"?>


  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script> 
    $(document).ready(function(){
      filter_data();

      function filter_data(){
        $('filte_data').html('<div id="loading"> <h4>A carregar...<h4/></div>');
        let action = 'fetch_data';
        let az = get_filter('az');
        let fastest = get_filter('fastest');
        let ingredients = get_filter('ingredients');


        $.ajax({
          url: "fetch.php",
          method: "POST",
          data: {
            action: action,
            az: az,
            fastest: fastest,
            ingredients: ingredients,
          },

          success: function(data){
            $('.filter_data').html(data);
          }

        })
      }

      function get_filter(class_name) {

        let filter = [];
        $('.' +class_name+ ':checked').each(function(){
          filter.push($(this).val());
        });
        return filter;

        }

        $(".common_selector").click(function(){
          filter_data();
        });

      }
    );
  </script>

  </body>
</html>