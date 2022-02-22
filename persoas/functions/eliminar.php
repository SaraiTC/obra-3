<?php
require '../../conexion/conexion.php';
require '../../conexion/sesion.php';

$id = $_GET['id'];

$sql = "DELETE FROM persoas_datos WHERE id = '$id'";
$resultado = $mysqli->query($sql);
?>

<html lang="gl">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="row" style="text-align:center">
        <?php if ($resultado) { ?>
          <h3>REXISTRO ELIMINADO</h3>
        <?php } else { ?>
          <h3>ERRO AO ELIMINAR</h3>
        <?php } ?>

        <a href="../index.php" class="btn btn-primary">VOLTAR</a>

      </div>
    </div>
  </div>

</body>

</html>
