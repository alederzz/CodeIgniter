<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Imprimir Documento</title>
</head>
<style>
	html,body{
		margin: 0;
	}
	body {
		font-size: 10.9pt;
		font-family: consolas;
		background: #e3e3e3;
	}
	.main{
		position: relative;
		width: 816px;
		height: 624px;
		margin: 0 auto;
		background: url(bgfactura.jpg) no-repeat;
		background-size: cover;
	}
	.numero-factura{
		position: absolute;
		top: 154px;
		left: 70%;
	}
	.dia{
		position: absolute;
		top: 185px;
		left: 11%;
	}
	.mes{
		position: absolute;
		top: 185px;
		left: 19%;
	}
	.ano{
		position: absolute;
		top: 185px;
		left: 40%;
	}
	.razon{
		position: absolute;
		top: 210px;
		left: 14%;
	}
	.ruc{
		position: absolute;
		top: 210px;
		left: 78%;
	}
	.direccion{
		position: absolute;
		top: 235px;
		left: 14%;
	}
	.cantidad{
		position: absolute;
		top: 284px;
		left: 8%;
	}
</style>
<body>
	<div class="main">
		<div class="numero-factura"><?php echo $valores->serie;?> - <?php echo $valores->correlativo;?></div>
		<div class="dia">13</div>
		<div class="mes">Diciembre</div>
		<div class="ano">14</div>
		<div class="razon"><?php echo $valores->razon_social;?></div>
		<div class="ruc">20527372144</div>
		<div class="direccion">Av. Angamos Este Nro. 176 Miraflores - Lima - Lima</div>
		<div class="cantidad">3</div>
	</div>
	
</body>
</html>