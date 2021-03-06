<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/episode',
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./api.css">
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
  <title>Document</title>
</head>
<body>
  <div class="contrick">
<div class="topnav" id="myTopnav">
  <a href="/project_rick_and_morthy/episodios/api.php">Capitulos</a>
  <a href="/project_rick_and_morthy/Personajes/person.php">Personajes</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
    
        <div class="p-3">
        <h1 class="titurick">Episodios Rick and Morty</h1>
        </div>
        <div class="fondo">
       
  

<?php
foreach ($api['results'] as $key => $value) {
  $id = $value['id'];
  $name = $value['name'];
  $air_date = $value['air_date'];
  $episode = $value['episode'];
  $characters = $value['characters'];
  $url = $value['url'];
  $created = $value['created'];

?>
<div class="row">
<div class="card">
  <div class="card-body">
    <p class=""><?php echo $id?></p>
    <p class="card-text"><?php echo $name?></p>
    <div style="text-align:center;">
    <img src="https://i1.sndcdn.com/avatars-000603636759-joj7s5-t500x500.jpg " width="220">
    </div>
    <p class="card-text"><?php echo $air_date?></p>
    <p class="card-text"><?php echo $episode?></p>
    <p class="card-text"><?php echo $created?></p>
    <form action="../Det_episodio/detalle.php" value="" method="POST">
    <input name="url" class="input" value="<?php echo $url ?>" style="display: none;">
    <div style="text-align:center; ">
    <button type="submit" class="btn btn-danger" style="width:40%" >Detalle</button>
    </div>
    </form>
  </div>
  </div>
</div>
    <?php
}

?>
</thead>
  <tbody>
    
  </tbody>
</table>
    </div>
    </div>
    </div>
</body>
</html>

