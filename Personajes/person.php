<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/character',
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
  <title>Document</title>
  <link rel="stylesheet" href="./person.css">
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
    <div style="background: rgb(128, 128, 128);">
    <div class="topnav" id="myTopnav">
    <a href="/project_rick_and_morthy/episodios/api.php">Capitulos</a>
  <a href="/project_rick_and_morthy/Personajes/person.php">Personajes</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
    
        <div class="p-3">
        <h1 class="titurick">Personajes Rick and Morty</h1>
        </div>
        <div class="m-4 mt-3">
    <table class="table table-secondary" >
  <thead>
    <tr class="table-dark">
    <th scope="col">Perfil</th>
      <th scope="col">Nombre</th>
      <th scope="col">Especie</th>
      <th scope="col">Genero</th>
      <th scope="col">Fecha de creacion </th>
      <th scope="col">Url</th>
    </tr>
  

<?php
foreach ($api['results'] as $key => $value) {
  $nombre = $value['name'];
  $especie = $value['species'];
  $genero = $value['gender'];
  $imagen = $value['image'];
  $creacion = $value['created'];
  $url = $value['url'];

?>

  <tr>
      <td class="table-light"><img src="<?php echo $imagen?>" alt="" width="100"></td>
      <td><?php echo $nombre?></td>
      <td class="table-light"><?php echo $especie?></td>
      <td><?php echo $genero?></td>
      <td class="table-light"><?php echo $creacion?></td>
      <td><?php echo $url?></td>
    </tr>

    <?php
}

?>
</thead>
  <tbody>
    
  </tbody>
</table>
    </div>
    </div>
</body>
</html>

