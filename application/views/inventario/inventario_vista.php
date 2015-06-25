	<!-- contents -->
		<!-- Titulos y botones superiores -->
		<div class="block-header">
			<h2>Inventario de Productos</h2>
	                        
				<ul class="actions">
					<li>
						<?php echo anchor('inventario/agregar_producto','<i class="md md-add"></i>'); ?>
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
	<div class="row">
		<!-- fin de agregar clientes -->
		<div class="card">
			<div class="card-header">
				<h2>Lista de Productos</h2>
			</div>
			<table id="data-table-command" class="table table-striped table-vmiddle">
				<thead>
					<tr>
						<th data-column-id="sku">SKU</th>
						<th data-column-id="producto">Producto</th>
						<th data-column-id="cantidad">Cantidad</th>
						<th data-column-id="vendidos">Vendidos</th>
						<th data-column-id="stok">STOCK</th>
						<th data-column-id="precio">Precio Unidad</th>
						<th data-column-id="comandos" data-formatter="comandos" data-sortable="false">Comandos</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($consulta as $columna):?>
					<tr>
						<td><?php echo $columna->sku ?></td>
						<td><?php echo $columna->nombre_producto ?></td>
						<td><?php echo $columna->cantidad ?></td>
						<td><?php echo $columna->vendidos ?></td>
						<td>Sin Datos</td>
						<td>S/. <?php echo $columna->precio_unit ?></td>
						<td></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
			
	<!-- ./ contents -->				
