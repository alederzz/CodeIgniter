<?php 
$tipo_persona_atributos = 'id="inputTipoPersona" class="form-control input-sm"';
$tipo_persona = array(
		'Juridico' 		=> 'Juridico',
		'Natural'		=> 'Natural'
);

$tipo_documento = array(
		'id' 			=> 'inputTipoDocumento',
		'name'			=> 'tipo_documento',
		'placeholder' 	=> 'RUC',
		'value' 		=> 'RUC',
		'class' 		=> 'form-control input-sm'
);

$nro_documento = array(
		'id' 			=> 'inputNroDocumento',
		'name' 			=> 'nro_documento',
		'maxlength' 	=> '11',
		'class' 		=> 'form-control input-sm',
		'required' 		=> 'required'
);

$tienda_atributos = 'id="inputTienda" class="form-control input-sm"';
$tienda = array(
		'tienda1'		=> 'Tienda 1',
		'tienda2'		=> 'Tienda 2',
		'global'		=> 'Global'
);

$razon_social = array(
		'id'			=> 'inputRazonSocial',
		'name'			=> 'razon_social',
		'class'			=> 'form-control input-sm',
		'required'		=> 'required'
);

$representante = array(
		'id'			=> 'inputRepresentante',
		'name'			=> 'representante',
		'class'			=> 'form-control input-sm'
);

$email = array(
		'id'			=> 'inputEmail',
		'name'			=> 'email',
		'class'			=> 'form-control input-sm',
		'required'		=> 'required',
		'type'			=> 'email'
);

$telefono = array(
		'id'			=> 'inputTelefono',
		'name'			=> 'telefono',
		'class'			=> 'form-control input-sm',
		'required'		=> 'required',
		'placeholder'	=> '01 123 4567',
		'maxlength'		=> '11'
);

$celular = array(
		'id'			=> 'inputCelular',
		'name'			=> 'celular',
		'class'			=> 'form-control input-sm',
		'placeholder'	=> '987 654 321',
		'maxlength'		=> '9',
);

$direccion = array(
		'id'			=> 'inputDireccion',
		'name'			=> 'direccion',
		'class'			=> 'form-control input-sm'
);

$localidad = array(
		'id'			=> 'inputLocalidad',
		'name'			=> 'localidad',
		'class'			=> 'form-control input-sm',
		'required'		=> 'required',
		'placeholder'	=> 'Distrito - Ciudad - Provincia',
);

$enviar = array(
		'name'			=> 'enviar',
		'class'			=> 'btn-success btn',
		'type'			=> 'submit',
		'content'		=> 'Guardar'
);

$reset = array(
		'class'			=> 'btn btn-danger',
		'type'			=> 'reset',
		'content'		=> 'Cancelar'
);
?>
	<!-- contents -->
	
	<div class="row">
		<!-- Agregar clientes -->
		<?php echo $this->session->flashdata('msje_datos_guardados'); ?>
		<div class="card">
			<div class="card-header">
				<h2>Agregar Clientes</h2>
			</div>
			<div class="card-body card-padding">
						
				<?php echo form_open(); ?>
					<div class="row">
						<div class="col-md-3">
							<label for="inputTipoPersona">Tipo Persona</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-pin-account"></i></span>
								<div class="fg-line select">
									<?php echo form_dropdown('tipo_persona', $tipo_persona, '', $tipo_persona_atributos);?>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputTipoDocumento">Tipo Documento</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-file"></i></span>
								<div class="fg-line">
									<?php echo form_input($tipo_documento);  ?>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputNroDocumento">Nro. Documento</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-dialpad"></i></span>
								<div class="fg-line">
									<?php echo form_input($nro_documento);?>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputTienda">Tienda</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-local-store"></i></span>
								<div class="fg-line select">
									<?php echo form_dropdown('tienda', $tienda,'', $tienda_atributos); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="inputRazonSocial">Razón Social</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-receipt"></i></span>
								<div class="fg-line">
									<?php echo form_input($razon_social); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputRepresentante">Representante</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
								<div class="fg-line">
									<?php echo form_input($representante); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<label for="inputEmail">Email</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
								<div class="fg-line">
									<?php echo form_input($email);?>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label for="inputTelefono">Teléfono</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
								<div class="fg-line">
									<?php echo form_input($telefono); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputCelular">Celular</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-smartphone-android"></i></span>
								<div class="fg-line">
									<?php echo form_input($celular); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label for="inputDireccion">Dirección</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-pin"></i></span>
								<div class="fg-line">
									<?php echo form_input($direccion); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<label for="inputLocalidad">Localidad</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="zmdi zmdi-map"></i></span>
								<div class="fg-line">
									<?php echo form_input($localidad); ?>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_button($enviar); ?>
					<?php echo form_button($reset); ?>
				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- fin de agregar clientes -->
	</div>