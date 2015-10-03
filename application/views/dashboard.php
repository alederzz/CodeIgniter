<div class="block-header">
    <h2>Dashboard</h2>                        
</div>
		
<!-- contents -->
<div class="row">

	<!-- Card de Facturas -->
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="card z-depth-2">
			<div class="card-header bgm-cyan">
				<h2>Facturas</h2>
			</div>
			<div class="card-body card-padding text-center">
				<div class="easy-pie sec-pie-1 m-b-15" data-percent="63">
					<div class="percent">63</div>
					<div class="pie-title">Documentos Creados</div>
				</div>
				<?php echo anchor('facturar/','Crear Facturas',array('class'=>'btn btn-block btn-lg bgm-cyan')); ?>
			</div>
		</div>
	</div>

	<!-- ./ Card de Facturas -->

	<!-- Card de Clientes -->

	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="card z-depth-2">
			<div class="card-header bgm-lightgreen">
				<h2>Clientes</h2>
			</div>
			<div class="card-body card-padding text-center">
				<div class="easy-pie sec-pie-2 m-b-15" data-percent="95">
					<div class="percent">95</div>
					<div class="pie-title">Clientes Registrados</div>
				</div>
				<?php echo anchor('clientes/','Clientes',array('class'=>'btn btn-block btn-lg bgm-lightgreen')); ?>
			</div>
		</div>
	</div>

	<!-- ./ Card de Clientes -->

	<!-- Card de Inventario -->

	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="card z-depth-2">
			<div class="card-header bgm-pink">
				<h2>Inventario</h2>
			</div>
			<div class="card-body card-padding text-center">
				<div class="easy-pie sec-pie-3 m-b-15" data-percent="80">
					<div class="percent">80</div>
					<div class="pie-title">Productos Totales</div>
				</div>
				<?php echo anchor('inventario/','Inventario',array('class'=>'btn btn-block btn-lg bgm-pink')); ?>
			</div>
		</div>
	</div>

	<!-- ./ Card de Inventario -->

</div><!--Fin Row Panels-->
	