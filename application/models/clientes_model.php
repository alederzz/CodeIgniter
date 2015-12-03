<?php
class Clientes_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function buscar_clientes($valor){

		$consulta = $this->db->like('razon_social', $valor); 
		$consulta = $this->db->get('clientes');
		return $consulta->result();

	}

}
?>