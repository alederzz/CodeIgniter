<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Imprimir Documento</title>
	<link rel="stylesheet" href="http://192.168.1.33/CodeIgniter/css/app.min.1.css">
</head>
<style>
	html,body{
		margin: 0;
	}
	body {
		font-size: 10.9pt; font-family: Courier; background: #e3e3e3;padding-top: 0;
	}
	.main{
		position: relative; width: 816px; height: 624px; margin: 0 auto; background: url(<?php echo base_url("img");?>/bgfactura.jpg) no-repeat; background-size: cover;
	}
	.numero-factura{
		position: absolute; top: 151px; left: 70%;
	}
	.dia{
		position: absolute; top: 183px; left: 11%;
	}
	.mes{
		position: absolute; top: 183px; left: 19%;
	}
	.ano{
		position: absolute; top: 183px; left: 38%;
	}
	.razon{
		position: absolute; top: 207px; left: 14%;
	}
	.ruc{
		position: absolute; top: 208px; left: 78%;
	}
	.direccion{
		position: absolute; top: 233px; left: 14%;
	}
	.productos{
		position: absolute; top:45%; left: 5%; width: 90%; line-height: 32px;
	}
	.productos .cantidad{
		width: 70px; text-align: center;
	}
	.productos .precunitario{
		width: 90px; text-align: center;
	}
	.productos .prectotal{
		width: 92px; text-align: center;
	}
	.numeroletras {
	    position: absolute; bottom: 95px; left: 88px;
	}
	.subtotal{
		position: absolute; bottom: 95px; right: 50px;
	}
	.igv{
		position: absolute; bottom: 66px; right: 50px;
	}
	.total{
		position: absolute; bottom: 34px; right: 50px;
	}
</style>
<?php $meses=["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"] ?>
<body>
	<div class="main">
		<div class="numero-factura"><?php echo $valores->serie;?> - <?php echo $valores->correlativo;?></div>
		<!-- Campos de Cliente y Fecha -->
		<div class="dia"><?php echo cutString($valores->fecha,"/",0) ?></div>
		<div class="mes"><?php echo cutString($valores->fecha,"/",1,$meses) ?></div>
		<div class="ano"><?php echo cutString($valores->fecha,"/",2) ?></div>
		<div class="razon"><?php echo $valores->razon_social;?></div>
		<div class="ruc">ruc</div>
		<div class="direccion">direccion</div>
		<!-- Campos de Productos -->
		<table class="productos">
		<?php if(count($items) > 0 && $items != FALSE): ?>
			<?php foreach ($items as $productoValor):?>
			<tr>
				<td class="cantidad" valign="top"><?php echo $productoValor->cantidad; ?></td>
				<td><?php echo $productoValor->producto; ?></td>
				<td class="precunitario" valign="top"><?php echo $productoValor->precio_unit;?></td>
				<td class="prectotal" valign="top"><?php echo $productoValor->precio;?></td>
			</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td>
					No hay Productos
				</td>
			</tr>
		<?php endif; ?>
		</table>
		<div class="numeroletras"><?php echo num_to_letras($valores->monto)?></div>
		<!-- Campos de Precios -->
		<?php $igv= $valores->monto * 18 /100;?>
		<?php $subtotal= $valores->monto - $igv;?>
		<div class="subtotal"><?php echo number_format($subtotal,2); ?></div>
		<div class="igv"><?php echo number_format($igv,2); ?></div>
		<div class="total"><?php echo $valores->monto; ?></div>
	</div>
	
</body>
</html>