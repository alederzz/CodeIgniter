	
	<!-- contents -->
	
	<div class="row">
		<!-- Agregar clientes -->
		<?php echo $this->session->flashdata('msje_datos_guardados'); ?>
		<div class="card">
			<div class="card-header">
				<h2>Agregar Clientes</h2>
			</div>
			<div class="card-body card-padding">
						
				<form action="<?php echo base_url();?>clientes/agregar" method="post" class="">
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="col-sm-6 control-label">Tipo Persona</label>
							<div class="col-sm-6">
								<select name="tipo_persona" id="" class="form-control input-sm">
									<option value="juridico">Juridico</option>
									<option value="natural">Natural</option>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="col-sm-6 control-label">Tipo Documento</label>
							<div class="col-sm-6">
								<input type="text" name="tipo_documento" placeholder="RUC" value="RUC" class="form-control input-sm" readonly>
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="col-sm-6 control-label">Nro. Documento</label>
							<div class="col-sm-6">
								<input type="text" name="nro_documento" maxlength="11" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="col-sm-6 control-label">Tienda</label>
							<div class="col-sm-6">
								<select name="tienda" id="" class="form-control input-sm">
									<option value="tienda1">Tienda 1</option>
									<option value="tienda2">Tienda 2</option>
									<option value="global">Global</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-8">
							<label class="col-sm-3 control-label">Razón Social</label>
							<div class="col-sm-9">
								<input type="text" name="razon_social" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-4 control-label">Representante</label>
							<div class="col-sm-8">
								<input type="text" name="representante" class="form-control input-sm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-5">
							<label class="col-sm-5 control-label">Email</label>
							<div class="col-sm-7">
								<input type="email" name="email" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="col-sm-6 control-label">Teléfono</label>
							<div class="col-sm-6">
								<input type="tel" name="telefono" maxlength="9" class="form-control input-sm" required>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-6 control-label">Celular</label>
							<div class="col-sm-6">
								<input type="tel" name="celular" maxlength="9" class="form-control input-sm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-8">
							<label class="col-sm-3 control-label">Dirección</label>
							<div class="col-sm-9">
								<input type="text" name="direccion" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label class="col-sm-3 control-label">Localidad</label>
							<div class="col-sm-9">
								<input type="text" name="localidad" class="form-control input-sm">
							</div>
						</div>
					</div>
					<button type="submit" name="enviar" class="btn btn-success">Guardar</button> <button type="reset" class="btn btn-danger">Cancelar</button>
				</form>
			</div>
		</div>
		<!-- fin de agregar clientes -->
	</div>