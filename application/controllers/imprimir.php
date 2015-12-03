<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imprimir extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
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
			$id_factura=$this->Crud_model->get_data_row('facturacion','id',$nro_documento);
			$val['valores']=$id_factura;
			$val['items']=$this->Crud_model->get_data_result('items','id_factura',$id_factura->id_factura);
			
			$this->load->view("imprimir/template_factura",$val);

		endif;
	}
}