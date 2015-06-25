$(document).on('ready',function(){
	
	//Checkbox Producto personalizado
	$('.act_custom').click(function(){
		$('input[name="prod_custom"]').removeAttr("value");
		$('input[name="producto"]').attr("type","hidden");
		$('input[name="prod_custom"]').attr("type","text");
		$('input[name="producto"]').attr("value","0");

	});



	var cambios = function (){
		//$(".producto-container > div:nth-child(1)").attr("class","producto-row-0");
		$(".producto-container > div:nth-child(2)").attr("class","producto-row-1");
		$(".producto-container > div:nth-child(3)").attr("class","producto-row-2");
		$(".producto-container > div:nth-child(4)").attr("class","producto-row-3");
		$(".producto-container > div:nth-child(5)").attr("class","producto-row-4");
		$(".producto-container > div:nth-child(6)").attr("class","producto-row-5");
		$(".producto-container > div:nth-child(7)").attr("class","producto-row-6");
		$(".producto-container > div:nth-child(8)").attr("class","producto-row-7");

	}

	//Agrega Nuevos Campos de Productos
	var i = 1;
	$('.producto-container').on('click','#add-producto',function(e){
		e.preventDefault();//eliminamos el evento por defecto
		++i;
		$("#delete-producto").removeAttr("disabled");
		//clona la primera fila del producto, la mete al ultimo del contenedor
		$(".producto-row-0").clone().appendTo(".producto-container");
		cambios();
		

	});

	$('.producto-container').on('click','#delete-producto',function(e){
		e.preventDefault();
		$(this).parent('div').parent('div').remove();
		console.log(--i)
		if (i==1) {
			$("#delete-producto").attr("disabled","disabled");
		}
	});
	


/*	    var max_fields      = 10; //Maximo numero de campos permitidos
	    var wrapper         = $(".producto-container"); //Contenedor de los campos
	    var add_button      = $("#add-producto"); //Boton que clonará
	    
	    var x = 1; //contador inicial
	    $(add_button).click(function(e){ //cuando se haga clic en el boton
	        e.preventDefault();
	        if(x < max_fields){ //maximos input permitidos
	            x++; //incrementa el valor
	            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    })*/


	//Enviar Formulario
	$(".btn-login").click(function(e){
		e.preventDefault();
		$("#loginform").submit();
	});


	//Command Buttons
	$("#data-table-command").bootgrid({
		caseSensitive: false,
		labels: {
		        search: "Buscar",
		        infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} elementos",
		        all: "Todos"
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

});