<?php
class Inventario_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function leer_inventario(){
		$consulta = $this->db->get('productos');
		return $consulta->result();

	}


	//obtiene los datos para su edicion Controlador Editar
	public function obtener_datos($id){
		$this->db->where('id_factura', $id);
		$consulta = $this->db->get('items');

		if ($consulta->num_rows() > 0):
			return $consulta->result();
		else:
			return false;
		endif;

	}

	public function agregar_producto($sku, $nombre_producto, $cantidad, $precio){
		
		$datos = array(
			'sku' 				=> $sku,
			'nombre_producto' 	=> $nombre_producto,
			'cantidad'			=> $cantidad,
			'precio_unit'		=> $precio,
		 );
		$this->db->insert('productos',$datos);
	}
}
?>