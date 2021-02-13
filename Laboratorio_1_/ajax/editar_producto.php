<?php
	if (empty($_POST['edit_id'])){
		$errores[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){

		require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos

		$prod_codigo = mysqli_real_escape_string($con,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
		$prod_nombre = mysqli_real_escape_string($con,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
		$prod_categoria = mysqli_real_escape_string($con,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
		$stock = intval($_POST["edit_stock"]);
		$precio= floatval($_POST["edit_price"]);
		
		$id=intval($_POST['edit_id']);
		// Actualiza datos en la Tabla
		$sql = "UPDATE tblprod SET prod_code='".$prod_codigo."', prod_name='".$prod_nombre."', prod_ctry='".$prod_categoria."', price='".$precio."',  prod_qty='".$stock."' WHERE id='".$id."' ";
		$query = mysqli_query($con,$sql);
		// si el producto fue actualizado correcta o incorrectamente
		if ($query) {
			$mensajes[] = "El producto ha sido actualizado con éxito.";
		} else {
			$errores[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
		}
		
	} else {
		$errores[] = "desconocido.";
	}

	// en caso de que existan errores
	if (isset($errores)){
			
	?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			<?php
				foreach ($errores as $error) {
						echo $error;
					}
				?>
	</div>
	<?php
	}

	// en caso de que existan algunos mensajes
	if (isset($mensajes)){
		
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				<?php
					foreach ($mensajes as $message) {
							echo $message;
						}
					?>
		</div>
		<?php
	}
	?>