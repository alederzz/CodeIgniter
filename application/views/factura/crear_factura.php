	<!-- contents -->
	
	<div class="row">
		<form id="formDocument" method="post" action="guardar_datos_factura">
			<div class="block-header">
				<h2>Crear Nuevo Documento</h2>
			</div>
			<div class="card">
				<div class="card-header bgm-bluegray m-b-20">
					<h2>Datos de Facturación <small>Ingresa los Datos del Documento</small></h2>
				</div>
				<div class="card-body card-padding">
					<div class="row">
						<div class="col-md-2 col-xs-12">
							<label for="inputTipoDoc">Tipo de Documento</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-assignment"></i></span>
								<div class="fg-line select">
									<select id="inputTipoDoc" type="text" name="tipodoc" class="form-control input-sm" required>
										<option value="Factura" selected>Factura</option>
										<option value="Boleta">Boleta</option>
										<option value="Guía de Remisión">Guía de Remisión</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<label for="inputSerie">Serie</label> - <label for="inputCorrelativo">Correlativo</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-tab"></i></span>
								<div class="col-md-3 col-xs-3">
									<div class="fg-line">
										<input id="inputSerie" type="text" name="serie" class="form-control input-sm" value="001" required>
									</div>
								</div>
								<div class="col-md-9 col-xs-9">
									<div class="fg-line">
										<input id="inputCorrelativo" type="number" name="correlativo" class="form-control input-sm" required>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<label for="inputDate">Fecha de Emision</label> - <label for="inputDateC">Cancelación</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-today"></i></span>
								<div class="col-md-6 col-xs-6">
									<div class="dtp-container dropdown fg-line open">
										<input id="inputDate" type="text" name="fechaEmision" class="form-control input-sm date-picker" data-toggle="dropdown" required>
									</div>
								</div>
								<div class="col-md-6 col-xs-6">
									<div class="dtp-container dropdown fg-line open">
										<input id="inputDateC" type="text" name="fechaCancelacion" class="form-control input-sm date-picker" data-toggle="dropdown" required>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-12">
							<label for="inputMoneda">Moneda</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-attach-money"></i></span>
								<div class="fg-line select">
									<select id="inputMoneda" type="text" name="moneda" class="form-control input-sm" required>
										<option value="soles" selected>Soles</option>
										<option value="dolares">Dólares</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-12">
							<label for="inputTipoPago">Tipo de Pago</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-assignment"></i></span>
								<div class="fg-line select">
									<select id="inputTipoPago" type="text" name="tipopago" class="form-control input-sm" required>
										<option value="Contado" selected>Contado</option>
										<option value="Crédito">Crédito</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header bgm-bluegray m-b-20">
					<h2>Datos de Cliente <small>Ingresa los Datos del Cliente</small></h2>
				</div>
				<div class="card-body card-padding">
					<div class="row">
						<div class="col-md-5">
							<label class="control-label" for="inputCliente">Cliente</label>
							<div class=" input-group form-group">
								<span class="input-group-addon"><i class="md md-person"></i></span>
								<div class="fg-line">
									<input id="inputCliente" type="text" name="cliente" class="form-control input-sm" required>
									<input type="hidden" id="inputIdCliente" name="idcliente">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<label class="control-label" for="inputRuc">RUC</label>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="md md-dialpad"></i></span>
								<div class="fg-line">
									<input id="inputRuc" type="text" name="ruc" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<label class="control-label" for="inputDireccion">Dirección</label>
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
			<div class="row">
				<div class="col-md-9">
					<div class="card repeater">
						<div class="card-header bgm-bluegray m-b-20">
							<h2>Datos de Venta <small>Ingresa los Productos o Servicios</small></h2>
							<button data-repeater-create type="button" class="btn bgm-red btn-float waves-effect waves-effect waves-button waves-float"><i class="md md-add"></i></button>
						</div>
						<div class="card-body card-padding">
							<div class="row">
								<!-- Campo Productos -->
								<div data-repeater-list="group-a" class="col-md-12 producto-container">
									<div data-repeater-item class="row">
										<div class="col-md-2">
											<div class="form-group fg-line">
												<label class="control-label" for="inputCantidad">Cantidad</label>
												<input type="text" id="inputCantidad" name="cantidad" class="form-control input-sm" placeholder="Ingrese la cantidad" autocomplete="off" required>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group fg-line">
												<label class="control-label" for="inputProducto">Producto</label>
												<input type="text" id="inputProducto" name="producto" class="form-control input-sm" placeholder="Escriba el Nombre" required>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group fg-line">
												<label class="control-label" for="inputPrecioUnidad">Precio Unidad</label>
												<input type="text" id="inputPrecioUnidad" name="precio_unit" class="form-control input-sm" placeholder="Solo Números" autocomplete="off" required>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group fg-line">
												<label class="control-label" for="inputPrecio">Precio</label>
												<input type="text" id="inputPrecio" name="precio" class="form-control input-sm" placeholder="Solo Números" readonly>
											</div>
										</div>
										<div id="botones" class="form-group col-md-1">
											<button data-repeater-delete type="button" id="delete-producto" class="btn btn-primary"><i class="md md-remove"></i></button>
										</div>
									</div>
								</div>
								<!-- Fin Campo Productos -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<div class="card-header bgm-gray">
							<h2>Totales <small>Importe total</small></h2>
						</div>
						<div class="card-body card-padding">
							<div class="row form-group">
								<div class="input-group">
								  <span class="input-group-addon">Subtotal</span>
								  <input id="inputSubtotal" type="text" class="form-control" aria-describedby="subtotal">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon">I.G.V</span>
								  <input id="inputIgv" type="text" class="form-control" aria-describedby="igv">
								</div>
								<br/>
								<div class="input-group">
								  <span class="input-group-addon">Total</span>
								  <input id="inputTotal" type="text" name="total" class="form-control" aria-describedby="total">
								</div>
							</div>
							<div class="row form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input id="incluyeIGV" name="igv" type="checkbox" value="0">
                                            <i class="input-helper"></i>
                                            Precio Incluye IGV
                                        </label>
                                    </div>
                                </div>
							</div>
							<div class="row">
								<button type="button" id="enviarDatos" class="btn btn-lg btn-block btn-success waves-effect waves-button waves-float waves-effect waves-button waves-float">Crear Documento</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div id="resultado"></div>