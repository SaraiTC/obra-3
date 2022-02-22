<!DOCTYPE html>
<html lang="gl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login de Usuario</title>
</head>
<!-- MENU SUPERIOR -->

<header class='main-body-menu-bar'>


  <div class='menu-bar-navigation-links'>
    <h1>Servizo de Orientación Laboral</h1>

  </div>

</header>

<main>
  <!-- LOGIN -->

  <div class="grid" class="login">

    <form action="login.php" method="POST" class="form login">

      <header class="login__header">
        <h3 class="login__title">Inicio de sesión</h3>
      </header>

      <div class="login__body">

        <div class="form__field" class="form-group">
          <input type="text" class="form-control" name="nome" placeholder="Usuario" required>
        </div>
        <br>
        <div class="form__field">
          <input type="password" class="form-control" name="clave" placeholder="Contrasinal" required>
        </div>
        <br>
        <div class="form__field">
          <input type="checkbox" name="recordarme">
          <label> Recórdame</label><br>
        </div>

      </div>

      <footer class="login__footer">
        <!-- <input type="submit" name="entrar" value="Entrar"> -->
        <button type="submit" name="enviar" class="btn btn-default">Entrar</button>

        <p><a href="#">Recuperar contrasinal</a></p>
      </footer>

    </form>

  </div>

</main>
<!-- FOOTER -->

<footer-component></footer-component>
<script src="../js/footer.js"></script>

</body>

<?php
if ($_POST) {
  // session_start();
  require '../conexion/sesion.php';
  require '../conexion/login-conn.php';

  $_SESSION['usuario'] = "miusuario";
  $_SESSION['estado'] = "conectado";

  $nome = $_POST['nome'];
  $clave = $_POST['clave'];

  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = $conexion->prepare("SELECT * FROM usuarios WHERE nome = :nome AND clave = :clave");
  $query->bindParam(":nome", $nome);
  $query->bindParam(":clave", $clave);
  $query->execute();
  $usuario = $query->fetch(PDO::FETCH_ASSOC);

  if ($usuario) {
      $_SESSION["usuario"] = $usuario["nome"];
      header("location: ../index.php");
  } else {
      echo "Nome ou clave non válido";
  }
}
?>


</html>
