	<!-- ./ breadcrumb -->

	<!-- Titulos y botones superiores -->
	<div class="block-header">
		<h2>Lista de Clientes</h2>
                        
			<ul class="actions">
				<li>
					<?php echo anchor('clientes/agregar/','<i class="md md-add"></i>'); ?>
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
				<h2>Lista de Clientes</h2>
			</div>
			<div class="table-responsive">
				<table id="data-table-command" class="table table-striped table-vmiddle">
					<thead>
						<tr>
							<th data-column-id="tpersona" data-visible="false">Tipo Persona</th>
							<th data-column-id="ruc">RUC</th>
							<th data-column-id="rsocial">Razon Social</th>
							<th data-column-id="direccion" data-visible="false">Direccion</th>
							<th data-column-id="email">Email</th>
							<th data-column-id="telefono">Teléfono</th>
							<th data-column-id="tienda">Tienda</th>
							<th data-column-id="comandos" data-formatter="comandos" data-sortable="false">Comand</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($clientes as $columna): ?>
						<tr>
							<td><?php echo $columna->tipo_persona; ?></td>
							<td><?php echo $columna->nro_documento; ?></td>
							<td><?php echo $columna->razon_social; ?></td>
							<td><?php echo $columna->direccion; ?></td>
							<td><?php echo $columna->email; ?></td>
							<td><?php echo $columna->telefono; ?></td>
							<td><?php echo $columna->tienda; ?></td>
							<td></td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
			
	<!-- ./ contents -->				