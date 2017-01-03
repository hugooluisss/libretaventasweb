TProducto = function(){
	var self = this;
	
	this.add = function(datos, fn){
		if (datos.before !== undefined) datos.before();
		
		$.post('cproductos', {
				"id": datos.id,
				"clave": datos.clave,
				"descripcion": datos.descripcion,
				"precio": datos.precio,
				"costo": datos.costo, 
				"nota": datos.nota,
				"almacen": datos.almacen,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.after !== undefined)
					datos.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cproductos', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == false){
				console.info("No se pudo eliminar");
			}
		}, "json");
	};
	
	this.get = function(data){
		if (data.before !== undefined) data.before();
		
		$.post('cproductos', {
				"clave": data.clave,
				"action": "get"
			}, function(obj){	
				if (data.after !== undefined)
					data.after(obj);
			}, "json");
	}
};