		
	<!-- contents -->
	
	<div class="row">
		<!-- Agregar clientes -->
		<?php echo $this->session->flashdata('msje_datos_guardados'); ?>
		<div class="card">
			<div class="card-header">
				<h2>Agregar Nuevo Producto</h2>
			</div>
			<div class="card-body">
						
				<form action="<?php echo base_url() ?>inventario/agregar_producto" method="post" class="">
					<div class="row">
						<div class="form-group col-sm-4">
							<label class="col-sm-6 control-label">SKU</label>
							<div class="col-sm-6">
								<input type="text" name="codigo_producto" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-6 control-label">Precio</label>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon">S/.</span>
									<input type="number" name="precio" class="form-control input-sm" required>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-6 control-label">Cantidad</label>
							<div class="col-sm-6">
								<input type="number" name="cantidad" class="form-control input-sm" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-8">
							<label class="col-sm-3 control-label">Producto</label>
							<div class="col-sm-9">
								<input type="text" name="nombre_producto" class="form-control input-sm" required>
							</div>
						</div>
					</div>
					<button type="submit" name="enviar" class="btn btn-success">Guardar</button> <button type="reset" class="btn btn-danger">Cancelar</button>
				</form>
			</div>
		</div>
		<!-- fin de agregar clientes -->
	</div>