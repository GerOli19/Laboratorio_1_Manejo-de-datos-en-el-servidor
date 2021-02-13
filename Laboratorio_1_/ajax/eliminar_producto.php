<?php
	if (empty($_POST['delete_id'])){
		
		$errores[] = "Id vacío.";

	} elseif (!empty($_POST['delete_id'])){

	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
    $id_producto=intval($_POST['delete_id']);
	
	// Borrar registro de Base de Datos
    $sql = "DELETE FROM  tblprod WHERE id='$id_producto'";
    $query = mysqli_query($con,$sql);
	
		// Si el producto a sido registrado correcta o incorrectamente
		if ($query) {
			$mensajes[] = "El producto ha sido eliminado con éxito.";
		} else {
			$errores[] = "Lo sentimos, la eliminación falló. Por favor, regrese y vuelva a intentarlo.";
		}
		
	} else {

		$errores[] = "desconocido.";
	
	}

	// en caso de que ocurra algun error
	if (isset($errores)){
				
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					//se recorren todos los mensajes de la variable
					foreach ($errores as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
	}

	// en caso de que exista algun mensaje
	if (isset($mensajes)){
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				<?php
					//se recorren todos los mensajes de la variable
					foreach ($mensajes as $mensaje) {
							echo $mensaje;
						}
					?>
		</div>
		<?php
	}
?>