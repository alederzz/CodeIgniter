	
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
						<div class="col-md-3">
							<label for="inputTipoPersona">Tipo Persona</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-people"></i></span>
								<div class="fg-line select">
										<select name="tipo_persona" id="inputTipoPersona" class="form-control input-sm">
											<option value="juridico">Juridico</option>
											<option value="natural">Natural</option>
										</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputTipoDocumento">Tipo Documento</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-today"></i></span>
								<div class="fg-line">
									<input id="inputTipoDocumento" type="text" name="tipo_documento" placeholder="RUC" value="RUC" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputNroDocumento">Nro. Documento</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-dialpad"></i></span>
								<div class="fg-line">
									<input id="inputNroDocumento" type="text" name="nro_documento" maxlength="11" class="form-control input-sm" required>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputTienda">Tienda</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-store-mall-directory"></i></span>
								<div class="fg-line select">
									<select name="tienda" id="inputTienda" class="form-control input-sm">
										<option value="tienda1">Tienda 1</option>
										<option value="tienda2">Tienda 2</option>
										<option value="global">Global</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="inputRazonSocial">Razón Social</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-event-note"></i></span>
								<div class="fg-line">
									<input id="inputRazonSocial" type="text" name="razon_social" class="form-control input-sm" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputRepresentante">Representante</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-person"></i></span>
								<div class="fg-line">
									<input id="inputRepresentante" type="text" name="representante" class="form-control input-sm">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<label for="inputEmail">Email</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-email"></i></span>
								<div class="fg-line">
									<input id="inputEmail" type="email" name="email" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputTelefono">Teléfono</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-phone"></i></span>
								<div class="fg-line">
									<input id="inputTelefono" type="text" placeholder="(01) 123 4567" data-mask="(01) 000 0000" name="telefono" maxlength="9" class="form-control input-sm input-mask" required>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputCelular">Celular</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-phone-android"></i></span>
								<div class="fg-line">
									<input id="inputCelular" type="text" placeholder="987 654 321" data-mask="000 000 000" name="celular" maxlength="9" class="form-control input-sm input-mask">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="inputDireccion">Dirección</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-place"></i></span>
								<div class="fg-line">
									<input id="inputDireccion" type="text" name="direccion" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputLocalidad">Localidad</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-map"></i></span>
								<div class="fg-line">
									<input id="inputLocalidad" placeholder="Distrito - Ciudad - Provincia" type="text" name="localidad" class="form-control input-sm">
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