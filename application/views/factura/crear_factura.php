	<!-- contents -->
	
	<div class="row">
		<form action="<?php echo base_url();?>facturar/guardar_datos_factura" method="post">
			<div class="block-header">
				<h2>asfsa</h2>
			</div>
			<div class="card">
				<div class="card-header">
					<h2>Datos de Facturación</h2>
				</div>
				<div class="card-body card-padding">
					<div class="row">
						<div class="col-md-5 col-xs-12">
							<label for="inputSerie">Serie - Correlativo</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-tab"></i></span>
								<div class="col-md-3 col-xs-3">
									<div class="fg-line">
										<input id="inputSerie" type="text" name="serie" class="form-control input-sm" value="001">
									</div>
								</div>
								<div class="col-md-9 col-xs-9">
									<div class="fg-line">
										<input id="inputCorrelativo" type="number" name="correlativo" class="form-control input-sm">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<label for="inputDate">Fecha</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-today"></i></span>
								<div class="dtp-container dropdown fg-line open">
									<input id="inputDate" type="text" name="fecha" class="form-control input-sm date-picker" data-toggle="dropdown">
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xd-12">
							<label for="">Moneda</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-attach-money"></i></span>
								<div class="fg-line ">
									<input id="" type="text" name="moneda" class="form-control input-sm">
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-primary waves-effect waves-button waves-float">Enviar</button>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h2>Datos de Cliente</h2>
				</div>
				<div class="card-body card-padding">
					<div class="row">
						<div class="col-md-5">
							<label for="inputCliente">Cliente</label>
							<div class=" input-group form-group">
								<span class="input-group-addon"><i class="md md-person"></i></span>
								<div class="fg-line">
									<input id="inputCliente" type="text" name="cliente" class="form-control input-sm">
									<input type="hidden" name="idcliente">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<label for="inputRuc">RUC</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-dialpad"></i></span>
								<div class="fg-line">
									<input id="inputRuc" type="text" name="ruc" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<label for="inputDireccion">Dirección</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-place"></i></span>
								<div class="fg-line">
									<input id="inputDireccion" type="text" name="direccion" class="form-control input-sm">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h2>Datos de Venta</h2>
				</div>
				<div class="card-body card-padding">
					<div class="row">
						<!-- Campo Productos -->
						<div class="producto-container">
							<div class="producto producto-row-0">
								<div class="col-md-5">
									<div class="form-group fg-line">
										<label class="sr-only" for="">Producto</label>
										<input type="text" name="producto" class="form-control input-sm" placeholder="Producto">
										<input type="hidden" name="prod_custom" class="form-control input-sm" placeholder="Producto Personalizado" value="0">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group fg-line">
										<label class="sr-only" for="">Cantidad</label>
										<input type="text" name="cantidad" class="form-control input-sm" placeholder="Ingrese la cantidad">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group fg-line">
										<label class="sr-only" for="">Precio</label>
										<input type="text" name="precio" class="form-control input-sm" placeholder="Precio">
									</div>
								</div>
								<div class="col-md-2">
									<div class="checkbox form-group fg-line">
										<label for="">Producto Personalizado</label>
										<input type="checkbox" name="act_custom" class="act_custom">
										<i class="input-helper"></i>
									</div>
								</div>
								<div id="botones" class="form-group col-md-1">
									<label class="sr-only" for="">Agregar otro Producto</label>
									<button id="add-producto" class="btn btn-primary waves-effect waves-button waves-float"><i class="md md-add"></i></button>
									<label class="sr-only" for="">Eliminar Producto</label>
									<button id="delete-producto" class="btn btn-primary waves-effect waves-button waves-float" disabled><i class="md md-remove"></i></button>
								</div>
							</div>
						</div>
						<!-- Fin Campo Productos -->
						<div class="form-group col-md-2 col-md-offset-10">
							<h3>Total</h3>
							<div class="input-group">
							  <span class="input-group-addon">Subtotal</span>
							  <input type="text" class="form-control" aria-describedby="subtotal">
							</div>
							<br/>
							<div class="input-group">
							  <span class="input-group-addon">I.G.V</span>
							  <input type="text" class="form-control" aria-describedby="igv">
							</div>
							<br/>
							<div class="input-group">
							  <span class="input-group-addon">Total</span>
							  <input type="text" name="total" class="form-control" aria-describedby="total">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>