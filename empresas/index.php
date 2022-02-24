<?php
require '../conexion/conexion.php';

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
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</head>

<body>

	<!-- MENU SUPERIOR -->
	<header-component></header-component>
	
	<!-- MAIN -->
	<div class="container">
		<div class="row1">
			<h2 style="text-align:center">Empresas</h2>
		</div>

		<div class="row2">
			<a href="/empresas/functions/nuevo.php" class="btn btn-primary">Nova Empresa</a>

			<div class="busca-persoas">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Nome: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
			</div>
		</div>

		<br>

		<div class="row table-responsive">
			<table class="table table-striped" id="tabla">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Poboación</th>
						<th>Actividade</th>
						<th>Data de incorporación</th>
						<th>Ofertas de contratación</th>
						<th>Ofertas de Formación</th>
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
							<td><?php echo $row['ofertas_contratacion']; ?></td>
							<td><?php echo $row['ofertas_formacion']; ?></td>
							<td><a href="#"><i class="fa-solid fa-eye"></i></a></td>
							<td><a href="/empresas/functions/modificar.php?id=<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="/empresas/functions/eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->


	<!-- <button id="myBtn"><a href="#top" style="color: white; text-decoration: none";><i class="fas fa-chevron-up"></i></a></button> -->
	<div id="myBtn"><a href="#top" ;><i class="fas fa-chevron-up"></i></a></div> 

		<!-- FOOTER -->
		<footer-component></footer-component>
		<!-- FOOTER -->
	<script>
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

			$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
	</script>

	
</body>

</html>