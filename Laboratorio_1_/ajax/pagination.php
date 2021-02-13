<?php
function paginate($pagina, $totalPaginas, $adyacentes) {
	$listarAnterior = "&lsaquo; Anterior";
	$listarSiguiente = "Siguiente &rsaquo;";
	$mostrar = '<ul class="pagination   pull-right">';
	
	// paginga anterior
	if($pagina==1) {
		$mostrar.= "<li class='page-item disabled'><a>$listarAnterior</a></li>";
	} else if($pagina==2) {
		$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>$listarAnterior</a></li>";
	}else {
		$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".($pagina-1).")'>$listarAnterior</a></li>";
	}
	
	// primera pagina
	if($pagina>($adyacentes+1)) {
		$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>1</a></li>";
	}
	// intervalo
	if($pagina>($adyacentes+2)) {
		$mostrar.= "<li class='page-item'><a>...</a></li>";
	}

	// paginas
	$pmin = ($pagina>$adyacentes) ? ($pagina-$adyacentes) : 1;
	$pmax = ($pagina<($totalPaginas-$adyacentes)) ? ($pagina+$adyacentes) : $totalPaginas;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$pagina) {
			$mostrar.= "<li class='active page-item'><a>$i</a></li>";
		}else if($i==1) {
			$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(1)'>$i</a></li>";
		}else {
			$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".$i.")'>$i</a></li>";
		}
	}

	// intervalo
	if($pagina<($totalPaginas-$adyacentes-1)) {
		$mostrar.= "<li class='page-item'><a>...</a></li>";
	}

	// Anterior
	if($pagina<($totalPaginas-$adyacentes)) {
		$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load($totalPaginas)'>$totalPaginas</a></li>";
	}

	// Siguiente
	if($pagina<$totalPaginas) {
		$mostrar.= "<li class='page-item'><a href='javascript:void(0);' onclick='load(".($pagina+1).")'>$listarSiguiente</a></li>";
	}else {
		$mostrar.= "<li class='disabled page-item'><a>$listarSiguiente</a></li>";
	}
	
	$mostrar.= "</ul>";
	return $mostrar;
}
?>