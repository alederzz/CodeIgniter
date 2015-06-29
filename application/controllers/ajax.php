<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function login(){
		$this->load->model('Usuarios_model');

		$usuario=$this->security->xss_clean(strip_tags($this->input->post('user')));
		$password=md5($this->security->xss_clean(strip_tags($this->input->post('password'))));

		$this->Usuarios_model->login($usuario,$password);
	}
}