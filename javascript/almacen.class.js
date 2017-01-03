TAlmacen = function(){
	var self = this;
	
	this.add = function(datos, fn){
		if (datos.before !== undefined) fn.before();
		
		$.post('calmacenes', {
				"id": datos.id,
				"nombre": datos.nombre,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.after !== undefined)
					datos.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('calmacenes', {
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
};