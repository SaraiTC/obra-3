<?php

require '../../conexion/conexion.php';
  require '../../conexion/sesion.php';


	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$localidade = $_POST['localidade'];
	$poboacion = $_POST['poboacion'];
	$actividade = $_POST['actividade'];
	$telefono = $_POST['telefono'];
	$fax = $_POST['fax'];
	$data_incorporacion = $_POST['data_incorporacion'];
	$persoa_contacto = $_POST['persoa_contacto'];
	$orientador = $_POST['orientador'];
	$ofertas_contratacion = $_POST['ofertas_contratacion'];
	$ofertas_formacion = $_POST['ofertas_formacion'];
	$notas = $_POST['notas'];

	$sql = "UPDATE empresas SET nome='$nome', localidade='$localidade', poboacion='$poboacion', actividade='$actividade', telefono='$telefono', fax='$fax', data_incorporacion='$data_incorporacion', persoa_contacto='$persoa_contacto', orientador='$orientador', ofertas_contratacion='$ofertas_contratacion', ofertas_formacion='$ofertas_formacion', notas='$notas' WHERE id='$id'";
	$resultado = $mysqli->query($sql);
?>

<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REXISTRO MODIFICADO</h3>
						<a href="/empresas/index.php" class="btn btn-primary">VOLTAR</a>
						<?php } else { ?>
						<h3>ERRO AO MODIFICAR</h3>
						<a href="modificar.php" class="btn btn-primary">VOLTAR</a>
					<?php } ?>

				</div>
			</div>
		</div>

	</body>
</html>
