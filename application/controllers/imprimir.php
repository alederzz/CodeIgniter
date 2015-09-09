<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imprimir extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
		$this->load->model('Inventario_model');
		$this->load->helper("numeros");
	}

	public function index(){
	}
	public function factura(){
		if (!$this->session->userdata('login') || $this->uri->segment(3) == FALSE):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			
			$nro_documento=$this->uri->segment(3);
			$id_factura=$this->Facturar_model->obtener_datos($nro_documento);
			$val['valores']=$id_factura;
			$val['items']=$this->Inventario_model->obtener_datos($id_factura->id_factura);
			
			$this->load->view("imprimir/template_factura",$val);

		endif;
	}
}