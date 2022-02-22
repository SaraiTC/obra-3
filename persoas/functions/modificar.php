<?php
require '../../conexion/conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM persoas WHERE id = '$id'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Persona</title>
  <!-- esto no sirve no? -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- CND de bootstrap -> cambiar cuando toque -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- ESTILOS DE LAS PESTAÑAS Y SU CONTENIDO -> MODIFICAR CON BOOTSTRAP O LO QUE SEA -->
  <link rel="stylesheet" href="../../tabs.css">
</head>

<body>

  <!-- ESTRUCTURA PARA TENER VARIAS PESTAÑAS DINÁMICAS EN UNA MISMA PÁGINA -->
  <h2 style="text-align:center">Prueba de lo que se abriría al clicar "Novo Rexistro" de Persoas</h2><br>

  <div class="t-container">

    <ul class="t-tabs">
      <li class="t-tab">Datos Personales</li>
      <li class="t-tab">Formación</li>
      <li class="t-tab">Experiencia</li>
      <li class="t-tab">Acciones</li>
      <li class="t-tab">Ofertas</li>
      <li class="t-tab"><a href="../../login/logout.php">Saír da sesión</a></li>
    </ul>

    <ul class="t-contents">

      <li class="t-content">
        <!-- <p>Contenido Datos</p> -->
        <h3 class="p-5 text-center">NOVO REXISTRO</h3>

        <form class="row g-3" method="POST" action="/persoas/functions/update.php" autocomplete="off">
          <div class="col-md-4">
            <label for="nome" class=" control-label">Nome:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="nome" placeholder="Nome" value="<?php echo $row['nome']; ?>" required>
            </div>
          </div>
          <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

          <div class="col-md-4">
            <label for="primeiro_apelido" class=" control-label">Primeiro Apelido:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="primeiro_apelido" placeholder="Primeiro Apelido" value="<?php echo $row['primeiro_apelido']; ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="segundo_apelido" class="control-label">Segundo Apelido:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="segundo_apelido" placeholder="Segundo Apelido" value="<?php echo $row['segundo_apelido']; ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="nif" class=" control-label">DNI / NIF:</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="nif" name="nif" placeholder="Número do DNI" pattern="[0-9]{8}+[A-Z]{1}" maxlength="9" placeholder="Número do DNI" value="<?php echo $row['nif']; ?>" required>
            </div>
          </div>

          <div class="col-md-4">
            <label for="data_nacemento" class="control-label">Data de nacemento:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="data_nacemento" name="data_nacemento" placeholder="dd-mm-aa" value="<?php echo $row['data_nacemento']; ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="sexo" class="control-label">Sexo:</label>
            <div class="col-sm-10">
              <select class="form-control" id="sexo" name="sexo">
                <option value="HOME" <?php if ($row['sexo'] == 'HOME') echo 'selected'; ?>>HOME</option>
                <option value="MULLER" <?php if ($row['sexo'] == 'MULLER') echo 'selected'; ?>>MULLER</option>
                <option value="OUTRO" <?php if ($row['sexo'] == 'OUTRO') echo 'selected'; ?>>NON DEFINIDO</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <label for="codigo_postal" class="control-label">Código postal:</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código postal" maxlength="5" value="<?php echo $row['codigo_postal']; ?>" required>
            </div>
          </div>

          <div class="col-md-4">
            <label for="telefono" class="control-label">Teléfono</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="9" value="<?php echo $row['telefono']; ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="email" class="control-label">Correo electrónico:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="<?php echo $row['email']; ?>">
            </div>
          </div>

          <br>
          <br>
          <div class="col-md-4">
            <div class="">
              <a href="../index.php" class="btn btn-default">VOLTAR</a>
              <button type="submit" class="btn btn-primary">GARDAR</button>
            </div>
          </div>
        </form>

      </li>

      <li class="t-content">
        <p>Contenido Formación</p>
      </li>
      <li class="t-content">
        <p>Contenido Experiencia</p>
      </li>
      <li class="t-content">
        <p>Contenido Acciones</p>
      </li>
      <li class="t-content">
        <p>Contenido Ofertas</p>
      </li>
    </ul>
  </div>

  <script src="../../tabs.js"></script>

</body>

</html>
