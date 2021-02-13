		//funcion para cargar los productos guardados en base al cargar la pagina.
		$(function() {
			load(1);
		});

		// funcion que consulta los registros guardados en base de datos para mostrarlos.
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/listar_productos.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}

		//funcion que muestra el modal donde se pueden editar los datos del registro seleccionado.
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var code = button.data('code') 

		  // se obtienen los datos colocados en los campos del modal de editar.
		  $('#edit_code').val(code)
		  var name = button.data('name') 
		  $('#edit_name').val(name)
		  var category = button.data('category') 
		  $('#edit_category').val(category)
		  var stock = button.data('stock') 
		  $('#edit_stock').val(stock)
		  var price = button.data('price') 
		  $('#edit_price').val(price)
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		//Funcion que toma el id del elemento que se borrara de la base de datos. 
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		//funcion que toma los datos del producto que de va a editar en base.
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/editar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		// funcion para agregar un nuevo producto a la base de datos
		$( "#add_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/guardar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		// funcion para eliminar algun producto de base de datos
		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/eliminar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});