<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Imprimir Documento</title>
</head>
<style type="text/css">
.tabla {
	background-image: url(bgfactura2.png);
	background-repeat: no-repeat;
	background-position: center top;
	background-size:cover;
}
/*table th,td { border:0px solid #03F; }*/
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
}
.ncliente{padding-left:110px; text-transform:uppercase;}
.ruc{padding-left:70px;}
.direccion{padding-left:110px; text-transform:uppercase;}
.numletras{padding-left:90px;}
.subtotal{padding-left:106px;}
.igv{padding-left:106px;}
.total{padding-left:106px;}
</style>
<?php $meses=["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"] ?>
<body>
<table width="810" height="440" align="center" cellpadding="0" cellspacing="0" class="tabla">
  <tr>
    <td height="25" colspan="2">&nbsp;</td>
    <td width="255">&nbsp;</td>
    <td width="248"><?php echo $valores->serie;?> - <?php echo $valores->correlativo;?></td>
  </tr>
  <tr>
    <td width="98" height="32" align="right" valign="bottom" class="dia"><strong><?php echo cutString($valores->fecha_emision,"/",0) ?></strong></td>
    <td width="207" align="center" valign="bottom"><strong><?php echo cutString($valores->fecha_emision,"/",1,$meses) ?></strong></td>
    <td valign="bottom"><strong><?php echo cutString($valores->fecha_emision,"/",2) ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="ncliente" height="25" colspan="3" valign="bottom"><strong><?php echo $valores->razon_social;?></strong></td>
    <td class="ruc" valign="bottom">20145986521</td>
  </tr>
  <tr>
    <td class="direccion" height="24" colspan="3" valign="bottom"><strong>Direccion del cliente</strong></td>
    <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td height="248" colspan="4" valign="top">
    <table width="735" align="center" cellpadding="0" cellspacing="0">
    <?php if(count($items) > 0 && $items != FALSE): ?>
    	<?php foreach ($items as $productoValor):?>
      <tr>
        <td width="74" height="32" align="center"><?php echo $productoValor->cantidad; ?></td>
        <td width="474"><?php echo $productoValor->producto; ?></td>
        <td width="88" align="center"><?php echo $productoValor->precio_unit;?></td>
        <td width="97" align="center"><?php echo $productoValor->precio;?></td>
      </tr>
    	<?php endforeach; ?>
    <?php else: ?>
    	<tr>
    		<td>
    			No hay Productos
    		</td>
    	</tr>
    <?php endif; ?>
    </table></td>
  </tr>
  <tr>
  	<?php $igv= $valores->monto * 18 /100;?>
	<?php $subtotal= $valores->monto - $igv;?>
    <td class="numletras" height="28" colspan="3"><?php echo num_to_letras($valores->monto)?></td>
    <td class="subtotal"><?php echo number_format($subtotal,2); ?></td>
  </tr>
  <tr>
    <td height="28" colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="igv"><?php echo number_format($igv,2); ?></td>
  </tr>
  <tr>
    <td height="28" colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="total"><?php echo $valores->monto; ?></td>
  </tr>
</table>
</body>
</html>