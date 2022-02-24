<?php
	
	require '../../conexion/conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM empresas WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="gl">
	<head>
		
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../css-obra/guardar-eliminar-update.css">
	<script src="../js/jquery-3.6.0.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
					<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rexistro eliminado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>O rexistro foi eliminado correctamente</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
				<?php } else { ?>
				<h3>ERRO AO ELIMINAR</h3>
				<?php } ?>
				
				<a href="index.php" class="btn btn-primary">VOLTAR</a>
				
				</div>
			</div>
		</div>
	<script>
		$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
	</script>	
	</body>
</html>
