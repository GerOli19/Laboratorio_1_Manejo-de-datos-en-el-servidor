<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web</title>
<!-- Fuentes y estilos utilizados -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">
<!-- Fin fuentes y estilos -->
</head>
<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
						<h2>Laboratorio #1: Manejo de datos en el servidor e interacción con el cliente mediante una aplicación web</h2>
					</div>
					<div class="col-sm-4">
						<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo producto</span></a>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Buscar Producto"  id="q" onkeyup="load(1);" />
						<span class="input-group-btn">
							<button class="btn btn-info" type="button" onclick="load(1);">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
                </div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<!-- Divs de carga de datos -->
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
			
        </div>
    </div>
	<!-- includes de la pagina -->
	<?php include("html/modal_add.php");?>
	<?php include("html/modal_edit.php");?>
	<?php include("html/modal_delete.php");?>
	<script src="js/script.js"></script>
</body>
</html>