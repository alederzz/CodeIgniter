		
	<!-- contents -->
	
	<div class="row">
		<!-- Agregar clientes -->
		<?php echo $this->session->flashdata('mensaje'); ?>
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
								<span class="input-group-addon"><i class="zmdi zmdi-dialpad"></i></span>
								<div class="fg-line">
									<input id="inputCodigoProducto" placeholder="0003004021" type="text" maxlength="10" name="codigo_producto" class="form-control input-sm" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputPrecio">Precio</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-money-box"></i></span>
								<div class="fg-line">
									<input id="inputPrecio" placeholder="150.00" data-mask="000 000.00" data-mask-reverse="true" type="text" name="precio" class="form-control input-sm input-mask" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputCantidad">Cantidad</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-upload"></i></span>
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
								<span class="input-group-addon"><i class="zmdi zmdi-shopping-cart"></i></span>
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