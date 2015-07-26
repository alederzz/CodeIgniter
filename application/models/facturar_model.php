<?php
class Facturar_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	//Consulta los datos de la tabla de facturacion en la Base de Datos
	public function consultar_factura($correlativo){
		$this->db->select('correlativo');
		$this->db->where('correlativo', $correlativo);

		$query= $this->db->get('facturacion');

		//si no hay datos de serie en la Base de datos devolvera "nodata"
		
		if ($query->num_rows() > 0):

		        return $query->row()->correlativo;
		    
		else:
			return false;
		endif;

	}

	//Graba los datos de faturacion en la Base de Datos
	public function grabar_factura($codigounico, $cliente, $fecha, $moneda, $serie, $correlativo, $precio_total){
		$datos = array(
			'id_factura'	=> $codigounico,
			'id_cliente' => $cliente,
			'fecha' => $fecha,
			'serie' => $serie,
			'correlativo' => $correlativo,
			'moneda' => $moneda,
			'monto' => $precio_total
			 );

		$this->db->insert('facturacion',$datos);

	}

	public function grabar_producto($codigounico, $producto, $cantidad, $precio){
		$datos = array(
			'id_factura'=> $codigounico,
			'id_producto'	=> $producto,
			'cantidad'		=> $cantidad,
			'precio'		=> $cantidad*$precio,
			'precio_unit'	=> $precio
			 );

		$this->db->insert('items',$datos);

	}
}
?>