<?php
class Crud_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	//++++++++++++++++++++++++++
	//Devuelve todos lo resultdos de una Tabla
	public function get_data($tabla){
		$consulta = $this->db->get($tabla);

		if ($consulta->num_rows() > 0):
			return $consulta->result();
		else:
			return false;
		endif;
	}

	//Devulve un solo resultado
	public function get_data_row($tabla,$campo,$valor){
		$this->db->where($campo, $valor);
		$consulta = $this->db->get($tabla);

		if ($consulta->num_rows() > 0):
			return $consulta->row();
		else:
			return false;
		endif;
	}

	//Devuelve multiples resultados
	public function get_data_result($tabla,$campo,$valor){
		$this->db->where($campo, $valor);
		$consulta = $this->db->get($tabla);

		if ($consulta->num_rows() > 0):
			return $consulta->result();
		else:
			return false;
		endif;
	}
	//Devuelve multiples resultados En ARRAY
	public function get_data_result_array($tabla,$campo,$valor){
		$this->db->where($campo, $valor);
		$consulta = $this->db->get($tabla);

		if ($consulta->num_rows() > 0):
			return $consulta->result_array();
		else:
			return false;
		endif;
	}

	//Guardar datos en la BD
	public function insert_data($tabla,$data){
		$this->db->insert($tabla,$data);
	}

	//Elimina datos en una tabla
	public function delete_data($arraTabla,$arrayID){}

	//++++++++++++++++++++++++++

}
?>