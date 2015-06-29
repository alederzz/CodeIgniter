<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$datos['titulo'] = 'Iniciar Sesion';
		//si la session no esta iniciada, muestra el formulario
		if (!$this->session->userdata('login')):
			$this->load->view('login',$datos);
		else:
			$segmentos_totales=$this->uri->total_segments();
			$datos['segmentos']=$segmentos_totales;
			$datos['titulo']='Bienvenido al Escritorio';
			$this->load->view('templates/header',$datos);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');
		endif;
	}

	public function login(){
		$this->load->model('Usuarios_model');

		$usuario=$this->security->xss_clean(strip_tags($this->input->post('user')));
		$password=md5($this->security->xss_clean(strip_tags($this->input->post('password'))));

		$this->Usuarios_model->login($usuario,$password);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}