<?php
class Usuarios_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function login($usuario,$password){
		$this->db->where('usuario',$usuario)
			->where('password',$password)
			->from('usuarios');
		
		$consulta=$this->db->get();

		if ($consulta->num_rows > 0) {
			$consulta = $consulta->row();
			$this->session->set_userdata('login',$consulta->usuario);//Crea la Session
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}
}
?>