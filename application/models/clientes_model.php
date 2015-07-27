<?php
class Clientes_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function listar_clientes(){
		
		$consulta = $this->db->get('clientes');
		return $consulta->result();

	}

	public function buscar_clientes($valor){

		$consulta = $this->db->like('razon_social', $valor); 
		$consulta = $this->db->get('clientes');
		return $consulta->result();

	}

	public function agregar_clientes($tipo_persona,$tipo_doc,$nro_documento,$razon_social,$direccion,$email,
									$telefono,$celular,$representante,$localidad,$tienda){
		
		$datos = array(
			'tipo_persona' 	=> $tipo_persona,
			'tipo_doc' 		=> $tipo_doc,
			'nro_documento'	=> $nro_documento,
			'razon_social'	=> $razon_social,
			'direccion'		=> $direccion,
			'email'			=> $email,
			'telefono'		=> $telefono,
			'celular'		=> $celular,
			'representante'	=> $representante,
			'localidad'		=> $localidad,
			'tienda'		=> $tienda
		 );
		$this->db->insert('clientes',$datos);
	}
}
?>