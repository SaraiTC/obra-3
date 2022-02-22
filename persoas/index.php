<?php
require '../conexion/conexion.php';

$where = "";

if (!empty($_POST)) {
	$valor = $_POST['campo'];
	if (!empty($valor)) {
		$where = "WHERE nif LIKE '%".$valor."%'" ;
	}
}
$sql = "SELECT * FROM persoas $where";
$resultado = $mysqli->query($sql);

?>
<html lang="gl">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
	<!-- MENU SUPERIOR -->

	<header-component></header-component>

<!-- MAIN -->

	<div class="container mw-100">
		
			<h2 style="text-align:center">Persoas</h2>
	

		<div class="row">
			<div> <a href="/persoas/functions/nuevo.php" class="btn btn-primary mb-4">Novo Rexistro</a></div>

			<div class="busca-persoas ">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group mb-3 w-6">
          <label class="col-1" for="campo">Búsqueda por NIF</label>
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" class="form-control" type="text" id="campo" name="campo">
          <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
        </div>
				
				</form>
			</div>
		</div>

		<br>

		<div class="row table-responsive w-100">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="col-sm-1">ID</th>
						<th class="col-sm-1">Nombre</th>
						<th class="col-sm-3">Primeiro Apelido</th>
						<th class="col-sm-3">Segundo Apelido</th>
						<th class="col-sm-1">DNI/NIF</th>
						<th class="col-sm-3">Data de nacemento</th>
						<th class="col-sm-1">Sexo</th>
						<th class="col-sm-3">Código postal</th>
						<th class="col-sm-1">Teléfono</th>
						<th class="col-sm-2">Email</th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['nome']; ?></td>
							<td><?php echo $row['primeiro_apelido']; ?></td>
							<td><?php echo $row['segundo_apelido']; ?></td>
							<td><?php echo $row['nif']; ?></td>
							<td><?php echo $row['data_nacemento']; ?></td>
							<td><?php echo $row['sexo']; ?></td>
							<td><?php echo $row['codigo_postal']; ?></td>
							<td><?php echo $row['telefono']; ?></td>
							<td><?php echo $row['email']; ?></td>
              <td><a href="#"><i class="fa-solid fa-eye"></i></a></td>
							<td><a href="/persoas/functions/modificar.php?id=<?php echo $row['id']; ?>"> <i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="/persoas/functions/eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
				</div>

				<div class="modal-body">
					¿Desea eliminar este registro?
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Delete</a>
				</div>
			</div>
		</div>
	</div>

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