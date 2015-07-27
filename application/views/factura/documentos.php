	<!-- ./ breadcrumb -->

	<!-- Titulos y botones superiores -->
	<div class="block-header">
		<h2>Lista de Documentos</h2>
                        
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
							<th data-column-id="idunico">ID Unico</th>
							<th data-column-id="idcliente">Id Cliente</th>
							<th data-column-id="monto">Monto</th>
							<th data-column-id="fecha">Fecha</th>
							<th data-column-id="comandos" data-formatter="comandos" data-sortable="false">Comandos</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($documentos as $columna): ?>
						<tr>
							<td><?php echo $columna->id_factura; ?></td>
							<td><?php echo $columna->id_cliente; ?></td>
							<td><?php echo $columna->monto; ?></td>
							<td><?php echo $columna->fecha; ?></td>
							<td></td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
			
	<!-- ./ contents -->				