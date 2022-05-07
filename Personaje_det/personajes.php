<?php

  $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => $_POST['url'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  ));

  $response = curl_exec($curl);

  curl_close($curl);

  $api = json_decode($response,true);
  

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./personajes.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Character</title>
    <script>

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
  </script>
  </head>

  <body>
    <div class="Principal">
    <div class="topnav" id="myTopnav">
    <a href="/project_rick_and_morthy/episodios/api.php">Capitulos</a>
  <a href="/project_rick_and_morthy/Personajes/person.php">Personajes</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
      

      <?php 
             foreach ( [$api] as $key => $value) {
    
      ?>

      <div class="secundaria">
            <div class="secundaria2">
        <div class="cont_izq">
            <div class="cont3">
          <div class="imagenPe">
            <img src="<?php echo $value['image']?>" alt="" class="imgpre"/>
          </div>

          <div class="tituloP">
            <h1><?php echo $value['name']?></h1>
          </div>
          <?php
            }
    ?></div>
        </div>

        <div class="cont_der">
          <div class="detallesP">
            <h3><?php echo $value['species']?></h3>
            <h3><?php echo $value['type']?></h3>
            <h3><?php echo $value['gender']?></h3>
            <h3><?php echo $value['status']?></h3>
          </div>
        </div>
        </div>
      </div>

      <div class="atras">
        <button onclick="history.back()" class="btnatras">Atras</button>
      </div>

      <div class="Episodio_per">
            <div class="episodio2">
        <div class="title">
          <h1>Episodios de personaje</h1>
        </div>

        <div class="cont_epi">
        <?php 
             foreach ($api['episode'] as $key => $value) {
            
              $curl = curl_init();

              curl_setopt_array($curl, array(
              CURLOPT_URL => $value,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              ));
    
              $response = curl_exec($curl);
    
              curl_close($curl);
    
              $api = json_decode($response,true);
                
            ?>

          <form  class="episodios" action="../Det_episodio/detalle.php" method="POST">
            <div class="card">
                <center>
              <img src="https://es.web.img3.acsta.net/pictures/18/10/31/17/34/2348073.jpg" alt="" width="80%" class="imgcap"/>
            </center>
              <div class="card-body">
                <h3><?php echo $api['name'] ?></h3>
                <p><?php echo $api['episode'] ?></p>
                <p><?php echo $api['air_date'] ?></p>
                <div style="100%;">
                <button type="submit" class="btndet">Detalle</button>
                </div>
                <input type="text" value="<?php echo $api['url'] ?>" name="url" style="display: none" />
                
              </div>
            </div>
          </form>
          <?php
            }
            ?>

        </div>

      </div>
      </div>
    </div>
  </body>
</html>