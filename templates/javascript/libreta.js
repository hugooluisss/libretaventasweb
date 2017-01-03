$(document).ready(function(){
	var libreta = new TLibreta;
	$("#txtClave").focus();
	getLista();
	
	$("#txtClave").keyup(function(event){
		if (event.which == 13 && $("#txtClave").val() != ''){
			switch($("#txtClave").val()){
				case '001': //nueva venta
					$("#txtClave").val("").focus();
					
					libreta.addMovimiento({
						"idProducto": "",
						"clave": '',
						"tipo": 3,
						before: function(){
							$("#txtClave").prop("disabled", true);
						}, after: function(resp){
							$("#txtClave").prop("disabled", false);
							$("#txtClave").val("").focus();
							
							if (!resp.band)
								alert("Ocurrió un error al agregar el registro");
							else{
								alert("Nueva venta");
								getLista();
							}
								
						}
					});
				break;
				case '002': //retiros
					console.info("Iniciando ventana de retiros");
					$("#winRetiros").modal();
				break;
				default:
					console.info("Buscando: " + $("#txtClave").val());
					findProducto();
				break;
			}
		}
	});
	
	function findProducto(){
		var obj = new TProducto;
		
		obj.get({
			"clave": $("#txtClave").val(),
			before: function(){
				$("#txtClave").prop("disabled", true);
			}, after: function(producto){
				$("#txtClave").prop("disabled", false);
				if (producto.idProducto == '' || producto.idProducto === undefined){
					alert("Producto no encontrado");
					$("#txtClave").val("").focus();
				}else{
					libreta.addMovimiento({
						"idProducto": producto.idProducto,
						"tipo": 1,
						before: function(){
							$("#txtClave").prop("disabled", true);
						}, after: function(resp){
							$("#txtClave").prop("disabled", false);
							$("#txtClave").val("").focus();
							
							if (!resp.band){
								alert("Ocurrió un error al agregar el producto");
							}else
								getLista();
						}
					});
				}
			}
		});
	}
	
	function getLista(){
		$.get("listaLibreta", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=cancelar]").click(function(){
				var identificador = $(this).attr("identificador");
				
				if(confirm("¿Seguro?")){
					libreta.addMovimiento({
						"clave": identificador,
						"tipo": 4,
						"nota": "cancelación",
						before: function(){
							$("#txtClave").prop("disabled", true);
						}, after: function(resp){
							$("#txtClave").prop("disabled", false);
							$("#txtClave").val("").focus();
							
							if (!resp.band){
								alert("Ocurrió un error al agregar el registro");
							}else
								getLista();
						}
					});
				}
			});
		});
	}
	
	$("#winRetiros").on('show.bs.modal', function(e){
		$("#txtClave").val("");
		$("#frmRetiro").get(0).reset();
	});
	
	$("#winRetiros").on('shown.bs.modal', function(e){
		$("#frmRetiro").find("#txtConcepto").focus();
	});
	
	$("#winRetiros").on('hidden.bs.modal', function(e){
		$("#txtClave").focus();
	});
	
	$("#frmRetiro").validate({
		debug: true,
		rules: {
			txtConcepto: "required",
			txtMonto: {
				required: true,
				number: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			libreta.addMovimiento({
				"clave": "",
				"tipo": 2,
				"nota": $("#frmRetiro").find("#txtConcepto").val(),
				"monto": $("#frmRetiro").find("#txtMonto").val(), 
				before: function(){
					$("#frmRetiro").find("[type=submit]").prop("disabled", true);
				}, after: function(resp){
					$("#frmRetiro").find("[type=submit]").prop("disabled", false);
					
					if (!resp.band){
						alert("Ocurrió un error al agregar el registro");
					}else{
						$("#winRetiros").modal("hide");
						getLista();
					}
				}
			});
        }
    });
});