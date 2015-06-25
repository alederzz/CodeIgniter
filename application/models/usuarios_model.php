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
			$this->session->set_userdata('login',$consulta->usuario);
			redirect(base_url());
		}else{
			$mensaje1 ='
			<div class="alert alert-danger">El usuario y la contraseña son incorrectos</div>
			';
			$this->session->set_flashdata('mensaje', $mensaje1);
			redirect(base_url());
		}
	}
}
?>