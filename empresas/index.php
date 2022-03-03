<?php
require '../conexion/conexion.php';
require '../conexion/sesion.php';

$where = "";

if (!empty($_POST)) {
	$valor = $_POST['campo'];
	if (!empty($valor)) {
		$where = "WHERE nome LIKE '%".$valor."%'";
	}
}
$sql = "SELECT * FROM empresas $where";
$resultado = $mysqli->query($sql);

?>

<html lang="gl">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/assets/css/index.css">
  <script src="../components/js/header.js"></script>
  <script src="../components/js/footer.js"></script>
  <title>Empresas</title>
</head>

<body>

	<!-- header -->
	<header-component></header-component>

	<!-- MAIN -->
	<div class="container">
			<h2 style="text-align:center">Empresas</h2>

		<div class="row">
			<a href="functions/nuevo.php" class="btn btn-primary mb-4">Nova Empresa</a>
    </div>

			<div class="row">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Nome: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
			</div>

		<br>

		<div class="row table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Poboación</th>
						<th>Actividade</th>
						<th>Data de incorporación</th>
						<th>Teléfono</th>
						<th>Fax</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['nome']; ?></td>
							<td><?php echo $row['poboacion']; ?></td>
							<td><?php echo $row['actividade']; ?></td>
							<td><?php echo $row['data_incorporacion']; ?></td>
							<td><?php echo $row['telefono']; ?></td>
							<td><?php echo $row['fax']; ?></td>
              <td></td>
              <td></td>
							
							<td><a href="#"><i class="fa-solid fa-eye"></i></a></td>
							<td><a href="/empresas/functions/modificar.php?id=<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="/empresas/functions/eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

  <!-- footer -->
  <footer-component></footer-component>
</body>

</html>
