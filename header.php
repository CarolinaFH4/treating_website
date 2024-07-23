<style>
        .overlay { 
            height: 100%; 
            width: 100%; 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            background-color: #BF91A4;
            overflow-x: hidden 
        } 
  
        .overlay-content { 
            position: relative; 
            top: 25%; 
            width: 100%; 
            text-align: center;
            
        } 
  
        .overlay a { 
            padding: 10px; 
            text-decoration: none;
            display: block; 
            transition: 0.3s;
        } 
        .overlay a h1{
          font-size: 2.5em;
        }
  
        .overlay a:hover, 
        .overlay a:focus { 
            color: black; 
        } 
  
        .overlay .closebtn { 
            position: absolute; 
            bottom: 0px; 
            right: 0px; 
        } 
    </style>

<header>
      <div class="container-fluid position-relative">
        <section>
        
          <div class= "row justify-content-center ">
            <div class= "col-auto mt-4 mb-2">
                <a href="index.php" class="col">
                  <img src="./media/icons/logo.svg" alt="Treating logo" >
                </a>
            </div>
          </div>
        
        </section>

        <section> 
          <div id="myNav" class="overlay vh-100 z-3 ">

            <a href="javascript:void(0)" class="closebtn p-0 position-absolute bottom-0 end-0" onclick="closeNav()">
              <img class="" src="./media/icons/menuopen.svg" alt="Close menu">
            </a>
              
            <div class="overlay-content min-width-100 ">
              <a class="dropdown-item" href="index.php">
                <h1>Início</h1>
              </a>
              <a class="dropdown-item" href="alimentos.php">
                <h1>Alimentos</h1>
              </a>
              <a class="dropdown-item" href="comunidade.php">
                <h1>Comunidade</h1>
              </a>
              <a class="dropdown-item" href="receitas.php">
                <h1>Receitas</h1>
              </a>
            </div>

          </div>

          <span class="" onclick="openNav()">
            <img src="./media/icons/menu.svg" alt="Open menu" class="position-fixed bottom-0 end-0 z-2">
          </span>

        </section>
      </div>
    </header>

    <script>
      /* Open */
      function openNav() {

        document.getElementById("myNav").style.display = "block";
        const element = document.querySelector('.my-element');
      }

      /* Close */
      function closeNav() {

        document.getElementById("myNav").style.display = "none";

      }

      function openAnimation() {

        element.classList.add('animate__animated', 'animate__fadeIn','animate__fast');
      }

      function closeAnimation() {



        element.classList.add('animate__animated','animate__fadeIn','animate__fast');
      }

    </script>