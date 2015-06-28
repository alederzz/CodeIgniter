		
	<!-- contents -->
	
	<div class="row">
		<!-- Agregar clientes -->
		<?php echo $this->session->flashdata('msje_datos_guardados'); ?>
		<div class="card col-md-6">
			<div class="card-header">
				<h2>Agregar Nuevo Producto</h2>
			</div>
			<div class="card-body card-padding">
						
				<form action="<?php echo base_url() ?>inventario/agregar_producto" method="post" class="">
					<div class="row">
						<div class="col-md-4">
							<label for="inputCodigoProducto">SKU</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-description"></i></span>
								<div class="fg-line">
									<input id="inputCodigoProducto" type="text" name="codigo_producto" class="form-control input-sm" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputPrecio">Precio</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-attach-money"></i></span>
								<div class="fg-line">
									<input id="inputPrecio" data-mask="000-00-0000000" type="number" name="precio" class="form-control input-sm" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputCantidad">Cantidad</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-today"></i></span>
								<div class="fg-line">
									<input id="inputCantidad" type="number" name="cantidad" class="form-control input-sm" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="inputProducto">Producto</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md  md-add-shopping-cart"></i></span>
								<div class="fg-line">
									<input id="inputProducto" type="text" name="nombre_producto" class="form-control input-sm" required>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" name="enviar" class="btn btn-success">Guardar</button> <button type="reset" class="btn btn-danger">Cancelar</button>
				</form>
			</div>
		</div>
		<!-- fin de agregar clientes -->
	</div>