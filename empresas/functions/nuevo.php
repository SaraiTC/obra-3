<?php
require '../../conexion/conexion.php';
require '../../conexion/sesion.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Empresa</title>
  <!-- esto no sirve no? -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- CND de bootstrap -> cambiar cuando toque -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- ESTILOS DE LAS PESTAÑAS Y SU CONTENIDO -> MODIFICAR CON BOOTSTRAP O LO QUE SEA -->
  <link rel="stylesheet" href="../../tabs.css">
</head>

<body>

  <!-- ESTRUCTURA PARA TENER VARIAS PESTAÑAS DINÁMICAS EN UNA MISMA PÁGINA -->
  <h2 style="text-align:center">Prueba de lo que se abriría al clicar "Novo Rexistro" de Empresas</h2><br>

  <div class="t-container">

    <ul class="t-tabs">
      <li class="t-tab">Datos Empresa</li>
      <li class="t-tab">xxx</li>
      <li class="t-tab">xxx</li>
      <li class="t-tab">xxx</li>
      <li class="t-tab">xxx</li>
      <li class="t-tab"><a href="../../login/logout.php">Saír da sesión</a></li>
    </ul>

    <ul class="t-contents">

      <li class="t-content">
        <!-- <p>Contenido Datos</p> -->
        <h3 class="p-5 text-center">NOVA EMPRESA</h3>

        <form class="row g-3" method="POST" action="guardar.php" autocomplete="off">
          <div class="col-md-4">
            <label for="nome" class="control-label">Nome:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="nome" placeholder="Nome" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="poboacion" class="ontrol-label">Poboación:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="poboacion" name="poboacion" placeholder="Poboacion" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="actividade" class="control-label">Actividade:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="actividade" name="actividade" placeholder="Actividade" required>
            </div>
          </div>

          <div class="col-md-4">
            <label for="data_alta" class="control-label">Data de alta:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="email" name="data_incorporacion" placeholder="dd-mm-aa" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="ofertas_emprego" class="control-label">Ofertas de Emprego:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="email" name="ofertas_contratacion" placeholder="Ofertas emprego" required>
            </div>
          </div>
          <div class="col-md-4">
            <label for="ofertas_formacion" class="control-label">Ofertas de Formación:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="email" name="ofertas_formacion" placeholder="Ofertas formacion" required>
            </div>
          </div>

          <div class="col-md-4">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="../index.php" class="btn btn-default">Voltar</a>
              <button type="submit" class="btn btn-primary">Gardar</button>
            </div>
          </div>
        </form>

      </li>

      <li class="t-content">
        <p>Contenido xxx</p>
      </li>
      <li class="t-content">
        <p>Contenido xxx</p>
      </li>
      <li class="t-content">
        <p>Contenido xxx</p>
      </li>
      <li class="t-content">
        <p>Contenido xxx</p>
      </li>

    </ul>
  </div>

  <script src="../../tabs.js"></script>

</body>

</html>
