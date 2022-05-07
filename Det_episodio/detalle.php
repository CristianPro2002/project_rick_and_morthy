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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./detalle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="topnav" id="myTopnav">
<a href="/project_rick_and_morthy/episodios/api.php">Capitulos</a>
  <a href="/project_rick_and_morthy/Personajes/person.php">Personajes</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  <div class="cont">

  <div class="p-3">
        <h1 class="titurick">Personajes Rick and Morty</h1>
        </div>
        <div class="fondo">
    <div class="contenedorcap">
      <div class="estilo">
        <div class="contcard">
        <div class="contimg">
        <img src="https://i0.wp.com/revistadiners.com.co/wp-content/uploads/2018/09/rickmorty_1200x800.jpg?fit=1200%2C800&ssl=1" width="70%"  style="border-radius: 10px; " alt="">
        </div>
    <h2 class="t-stroke t-shadow"><?php echo $api["name"] ?></h2>
    <h3 class="t-stroke t-shadow"><?php echo $api["episode"] ?></h3>
    <div class="contboton">
    <button onclick="history.back()" class="boton">Atras</button>
    </div>
    </div>
    </div>
    </div>

    <div class="contenedor">
<?php
 foreach ($api['characters'] as $key => $value) {

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

     $Img = $api['image'];
     $name = $api['name'];
     $url = $api['url'];

     $status = $api['status'];
     $species = $api['species'];
     $gender = $api['gender'];
    ?>


   
     <div class="contenform">
    <form action="../Personaje_det/personajes.php" value="" method="POST">
<div class="card">
    <div class="face front">
    <img src="<?php echo $Img?> " width="220" style="border-radius: 50%;">
    <p class=""><?php echo $name?></p>
    <input type="text" value='<?php echo $url ?>' class="inputs"/>
    </div>
    <div class="face back">
    <input value="<?php echo $api['url'] ?>" name="url" style="display:none">
    <center>
          <button type="submit" class="botonD">Detalle</button>
    </center>
    </div>
    </div>
    </form>
  </div>
  <?php }
    ?>
  </div>
  
  </div>
  
</div>

</body>
</html>