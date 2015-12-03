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
}

if (!$('.login-content')[0]) {
    notify('Bienvenido de Nuevo', 'inverse',2500);
} 
//./ Welcome Message (not for login page)

$(document).on('ready',function(){

	//Agrega las clases ACTIVE al Menu
	var enlaceActivo = $(".main-menu li a").hasClass('active');
	var pgurl = window.location.href;
	$(".main-menu li a").each(function(){
		if($(this).attr("href") == pgurl ){
			$(this).parent().parent().parent().addClass("active")
			$(this).addClass("active");
		}
	});
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
			icon: 'zmdi icon',
			iconColumns: 'zmdi-view-module',
			iconDown: 'zmdi-caret-down',
			iconRefresh: 'zmdi-refresh',
			iconUp: 'zmdi-caret-up'
		},
		formatters: {
			"comandos": function(column, row) {
				return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.ruc + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
	            "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.ruc + "\"><span class=\"zmdi zmdi-delete\"></span></button> " + 
	            "<button type=\"button\" class=\"btn btn-icon command-create\" data-row-id=\"" + row.ruc + "\"><span class=\"zmdi zmdi-check\"></span></button>";
	          }
	    }
	});

	//Comandos para Tabla Documentos
	//Command Buttons
var grid = $("#data-table-command-docs").bootgrid({
		caseSensitive: false,
		rowCount: 15,
		labels: {
		        search: "Buscar",
		        infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} elementos",
		        all: "Todos",
		        noResults: "No se encontraron resultados"
		},
		css: {
			icon: 'zmdi icon',
			iconColumns: 'zmdi-view-module',
			iconDown: 'zmdi-caret-down',
			iconRefresh: 'zmdi-refresh',
			iconUp: 'zmdi-caret-up'
		},
		formatters: {
			"comandos": function(column, row) {
				return "<button class=\"btn btn-icon command-edit\" data-toggle=\"modal\" data-target=\"#modalWider\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
	            "<button class=\"btn btn-icon command-delete"+row.comandos+"\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-block\"></span></button> " + 
	            "<button class=\"btn btn-icon command-view\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-eye\"></span></button> " +
	            "<button class=\"btn btn-icon command-print\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-print\"></span></button> ";
	          }
	    }
	}).on("loaded.rs.jquery.bootgrid", function(){
		grid.find(".command-edit").on("click", function(){//Boton para editar Documento
			location.href="editar/documento/"+$(this).data("row-id");
		}).end().find(".command-print").on("click", function(){//boton para imprimir
			location.href="imprimir/factura/"+$(this).data("row-id");
		}).end().find(".command-view").on("click",function(){//Boton de Vista Previa
			var url = "preview/documento/"+$(this).data("row-id");

			$('#modalWider').on('show.bs.modal', function () {
				$('#modalWider iframe').attr("src", url);
				$('#modalWider a').attr("href",url);
			});
			$('#modalWider').modal({show:true});
		})/*.end().find(".command-delete").on("click", function(){
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
		}).end().find(".command-delete-active").on("click",function(){//Boton de Anular Documento
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
		})*/;
	});

	$("#data-table-command-docs tbody").on("click","button.command-delete",function(){//anular documentoss
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
		$("#data-table-command-docs tbody").on("click","button.command-delete-active",function(){
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