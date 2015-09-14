	<!-- ./ breadcrumb -->

	<!-- Titulos y botones superiores -->
	<div class="block-header">
		<h2>Lista de Documentos</h2>
		
        <div class="modal fade" id="modalWider" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link waves-effect waves-button waves-float">Save changes</button>
                                                    <button type="button" class="btn btn-link waves-effect waves-button waves-float" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                
			<ul class="actions">
				<li>
					<?php echo anchor('facturar/crear','<i class="md md-add"></i>'); ?>
				</li><li>
					<a href="">
						<i class="md md-trending-up"></i>
					</a>
				</li>
				<li>
                   <a href="">
						<i class="md md-done-all"></i>                    
					</a>
				</li>
                <li class="dropdown">
					<a href="" data-toggle="dropdown">
						<i class="md md-more-vert"></i>
					</a>
                                
					<ul class="dropdown-menu dropdown-menu-right">
						<li>
							<a href="">Refresh</a>
						</li>
						<li>
							<a href="">Manage Widgets</a>
						</li>
						<li>
							<a href="">Widgets Settings</a>
						</li>
					</ul>
				</li>
			</ul>             
	</div>
	<!-- ./ Titulo y botones superiores -->

	
	<!-- contents -->
	
		<!-- fin de agregar clientes -->
		<div class="card">
			<div class="card-header">
				<h2>Lista de Documentos Creados</h2>
			</div>
			<div class="table-responsive">
				<table id="data-table-command-docs" class="table table-striped table-vmiddle">
					<thead>
						<tr>
							<th data-column-id="id" data-visible="false">ID</th>
							<th data-column-id="idunico">Nro. Doc</th>
							<th data-column-id="tipodoc">Tipo de Doc.</th>
							<th data-column-id="idcliente" data-visible="false">Id Cliente</th>
							<th data-column-id="razon-social"> Cliente</th>
							<th data-column-id="monto">Monto</th>
							<th data-column-id="fecha">Fecha</th>
							<th data-column-id="comandos" data-formatter="comandos" data-sortable="false">Comandos</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($documentos as $columna): ?>
						<tr>
							<td><?php echo $columna->id; ?></td>
							<td><?php echo $columna->id_factura; ?></td>
							<td><?php echo $columna->tipo_documento; ?></td>
							<td><?php echo $columna->id_cliente; ?></td>
							<td><?php echo $columna->razon_social; ?></td>
							<td><?php echo $columna->monto; ?></td>
							<td><?php echo $columna->fecha; ?></td>
							<td><?php echo ($columna->estado == 0) ? "-active":"";  ?></td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>

	<!-- ./ contents -->				