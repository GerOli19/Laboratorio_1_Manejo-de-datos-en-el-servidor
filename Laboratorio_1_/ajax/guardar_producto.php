<?php
	if (empty($_POST['name'])){
		$errores[] = "Ingresa el nombre del producto.";

	} elseif (!empty($_POST['name'])){
		
		require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$prod_codigo = mysqli_real_escape_string($con,(strip_tags($_POST["code"],ENT_QUOTES)));
		$prod_nombre = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
		$prod_categoria = mysqli_real_escape_string($con,(strip_tags($_POST["category"],ENT_QUOTES)));
		$stock = intval($_POST["stock"]);
		$precio = floatval($_POST["price"]);
		
		// Consulta Insert en Base de Datos
		$sql = "INSERT INTO tblprod(id, prod_code, prod_name, prod_ctry, prod_qty, price) VALUES (NULL,'$prod_codigo','$prod_nombre','$prod_categoria','$stock','$precio')";
		$query = mysqli_query($con,$sql);

		// Mensaje si se registro correcta o incorrectamente
		if ($query) {
			$messages[] = "El producto ha sido guardado con éxito.";
		} else {
			$errores[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
		}
		
	} else {
		$errores[] = "desconocido.";
	}

	// se muestran los errores en caso de haber alguno
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
	if (isset($messages)){
		
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				<?php
					foreach ($messages as $message) {
							echo $message;
						}
					?>
		</div>
		<?php

	}

?>