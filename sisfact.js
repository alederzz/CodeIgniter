$(document).on('ready',function(){

	//Welcome Message (not for login page)
	function notify(message, type, delay){
	    $.growl({
	        message: message
	    },{
	        type: type,
	        allow_dismiss: false,
	        label: 'Cancel',
	        className: 'btn-xs btn-inverse',
	        placement: {
	            from: 'top',
	            align: 'right'
	        },
	        delay: delay,
	        animate: {
	                enter: 'animated bounceIn',
	                exit: 'animated fadeOutUp'
	        },
	        offset: {
	            x: 20,
	            y: 85
	        }
	    });
	};
	
	if (!$('.login-content')[0]) {
	    notify('Welcome back Mallinda Hollaway', 'inverse',2500);
	} 

	//./ Welcome Message (not for login page)


	//Agrega las clases ACTIVE al Menu
	var enlaceActivo = $(".main-menu li a").hasClass('active');
	var pgurl = window.location.href;
	$(".main-menu li a").each(function(){
		if($(this).attr("href") == pgurl ){
			$(this).parent().parent().parent().addClass("active")
			$(this).addClass("active");
		}
	})
	//./ Agrega las clases ACTIVE al Menu

	
	
	

	//Command Buttons
	$("#data-table-command").bootgrid({
		caseSensitive: false,
		labels: {
		        search: "Buscar",
		        infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} elementos",
		        all: "Todos",
		        noResults: "No se encontraron resultados"
		},
		css: {
			icon: 'md icon',
			iconColumns: 'md-view-module',
			iconDown: 'md-expand-more',
			iconRefresh: 'md-refresh',
			iconUp: 'md-expand-less'
		},
		formatters: {
			"comandos": function(column, row) {
				return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.ruc + "\"><span class=\"md md-edit\"></span></button> " + 
	            "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.ruc + "\"><span class=\"md md-delete\"></span></button> " + 
	            "<button type=\"button\" class=\"btn btn-icon command-create\" data-row-id=\"" + row.ruc + "\"><span class=\"md md-check\"></span></button>";
	          }
	    }
	});

	//Comandos para Tabla Documentos
	//Command Buttons
	$("#data-table-command-docs").bootgrid({
		caseSensitive: false,
		rowCount: 15,
		labels: {
		        search: "Buscar",
		        infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} elementos",
		        all: "Todos",
		        noResults: "No se encontraron resultados"
		},
		css: {
			icon: 'md icon',
			iconColumns: 'md-view-module',
			iconDown: 'md-expand-more',
			iconRefresh: 'md-refresh',
			iconUp: 'md-expand-less'
		},
		formatters: {
			"comandos": function(column, row) {
				return "<a href=\"editar/documento/"+row.id+"\" class=\"btn btn-icon command-edit\" data-toggle=\"modal\" data-target=\"#modalWider\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-edit\"></span></a> " + 
	            "<a class=\"btn btn-icon command-delete"+row.comandos+"\" data-row-id=\"" + row.id + "\"><span class=\"md md-block\"></span></a> " + 
	            "<a data-view=\"imprimir/factura/"+row.id+"\" class=\"btn btn-icon command-view\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-remove-red-eye\"></span></a> " +
	            "<a href=\"imprimir/factura/"+row.id+"\" target=\"_blank\" class=\"btn btn-icon command-print\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-print\"></span></a> ";
	          }
	    }
	});

	//abrir pop}up vista previa
	$("#data-table-command-docs tbody").on("click","a.command-view",function(){
		var url=$(this).attr("data-view");
		$('#modalWider').on('show.bs.modal', function () {
			$('#modalWider iframe').attr("src",url);
			$('#modalWider a').attr("href",url);
		});
		$('#modalWider').modal({show:true});
	});
	// ./abrir pop}up vista previa

	$("#data-table-command-docs tbody").on("click","a.command-delete",function(){//anular documentoss
		var btn=$(this);
		$.ajax({
		  url: 'facturar/anular_doc',
		  type: 'POST',
		  async: true,
		  data: 'id=' + $(this).attr("data-row-id")+'&estado=0',
		  success: function(){
		  	//si la clase command-delete existe
		  	//la elimina y agrega la nueva
		  	if (btn.hasClass("command-delete")==true) {
		  		btn.removeClass("command-delete");
		  		btn.addClass("command-delete-active");
		  	};
		  },
		  error: function(){
		  	alert("Hubo un error enviando la petición al servidor, contactar al administrador")
		  }
		});
	});
	$("#data-table-command-docs tbody").on("click","a.command-delete-active",function(){
		var btn=$(this);
		$.ajax({
		  url: 'facturar/anular_doc',
		  type: 'POST',
		  async: true,
		  data: 'id=' + $(this).attr("data-row-id")+'&estado=1',
		  success: function(){
		  	//si la clase command-delete-active existe
		  	//la elimina y agrega la nueva
		  	if (btn.hasClass("command-delete-active")==true) {
		  		btn.removeClass("command-delete-active");
		  		btn.addClass("command-delete");
		  	};
		  },
		  error: function(){
		  	alert("Hubo un error enviando la petición al servidor, contactar al administrador")
		  }
		});
	});
	// ./ Comandos para Tabla Documentos

});//fin document on ready