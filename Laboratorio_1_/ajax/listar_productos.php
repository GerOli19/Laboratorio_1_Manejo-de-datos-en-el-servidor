<?php
	
	/* Connecta a base de datos*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tabla="tblprod";
	$campos="*";
	$busqueda=" tblprod.prod_name LIKE '%".$query."%'";
	$busqueda.=" order by tblprod.prod_name";
	
	
	include 'pagination.php'; //include archivo de paginacion
	//variables para la paginacion
	$pagina = (isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']))?$_REQUEST['pagina']:1;
	$por_pagina = intval($_REQUEST['per_page']); 
	$adyacentes  = 4;
	$offset = ($pagina - 1) * $por_pagina;
	//Cuenta el total de resultados de la consulta*/
	$contador_resultados   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tabla where $busqueda ");
	if ($resultados= mysqli_fetch_array($contador_resultados)){$numeroResultados = $resultados['numrows'];}
	else {echo mysqli_error($con);}
	$total_paginas = ceil($numeroResultados/$por_pagina);
	//consulta principal para obtener los datos
	$query = mysqli_query($con,"SELECT $campos FROM  $tabla where $busqueda LIMIT $offset,$por_pagina");
	
	// mostrar los datos obtenidos en pantalla
	if ($numeroResultados>0){
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th>Producto </th>
						<th>Categoría </th>
						<th class='text-center'>Stock</th>
						<th class='text-right'>Precio</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($resultados = mysqli_fetch_array($query)){	
							$product_id=$resultados['id'];
							$prod_code=$resultados['prod_code'];
							$prod_name=$resultados['prod_name'];
							$prod_categoria=$resultados['prod_ctry'];
							$prod_stock=$resultados['prod_qty'];
							$precio=$resultados['price'];						
							$finales++;
						?>	
						<tr>
							<td class='text-center'><?php echo $prod_code;?></td>
							<td ><?php echo $prod_name;?></td>
							<td ><?php echo $prod_categoria;?></td>
							<td class='text-center' ><?php echo $prod_stock;?></td>
							<td class='text-right'><?php echo number_format($precio,2);?></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-code='<?php echo $prod_code;?>' data-name="<?php echo $prod_name?>" data-category="<?php echo $prod_categoria?>" data-stock="<?php echo $prod_stock?>" data-price="<?php echo $precio;?>" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numeroResultados registros";
									echo paginate( $pagina, $total_paginas, $adyacentes);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          