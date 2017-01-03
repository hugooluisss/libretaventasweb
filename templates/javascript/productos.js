$(document).ready(function(){
	if ($("#dvLista").length){
		getLista();
	
		$("#panelTabs li a[href=#add]").click(function(){
			$("#frmAdd").get(0).reset();
			$("#id").val("");
			setTimeout(function(){
				$("#txtClave").focus();
			}, 1000);
		});
	}
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtClave: {
				required: true,
				remote: {
					url: "cproductos",
					type: "post",
					data: {
						clave: function() {
							return $("#txtClave").val();
						},
						id: function(){
							return $("#id").val();
						},
						"action": "validar"
					}
				}
			},
			txtDescripcion: "required",
			txtPrecio: {
				required: true,
				number: true
			},
			txtCosto: {
				number: true
			}
		},
		messages: {
			txtClave: {
				remote: "Está clave ya existe, intenta modificarlo"
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TProducto;
			obj.add({
					"id":$("#id").val(), 
					"clave": $("#txtClave").val(), 
					"descripcion": $("#txtDescripcion").val(), 
					"precio": $("#txtPrecio").val(), 
					"costo": $("#txtCosto").val(), 
					"nota": $("#txtNota").val(),
					"almacen": $("#selAlmacen").val(),
					"after": function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... No se guardaron los datos");
						}
					}
				}
			);
        }
    });
		
	function getLista(){
		$.get("listaProductos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TProducto;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							if(!data.band)
								alert("No se pudo eliminar");
								
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idProducto);
				$("#txtClave").val(el.clave);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtPrecio").val(el.precio);
				$("#txtCosto").val(el.costo);
				$("#txtNota").val(el.nota);
				$("#selAlmacen").val(el.idAlmacen);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});