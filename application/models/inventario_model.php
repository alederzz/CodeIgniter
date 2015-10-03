<?php
class Inventario_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function leer_inventario(){
		$consulta = $this->db->get('productos');
		return $consulta->result();

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