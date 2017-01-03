TLibreta = function(){
	var self = this;
	
	this.addMovimiento = function(datos){
		if (datos.before !== undefined) datos.before();
		
		$.post('clibreta', {
				"producto": datos.idProducto,
				"clave": datos.clave,
				"nota": datos.nota,
				"tipo": datos.tipo,
				"monto": datos.monto,
				"action": "addMovimiento"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.after !== undefined)
					datos.after(data);
			}, "json");
	};
};