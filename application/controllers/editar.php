<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
	}

	public function index(){
			
		$this->session->set_flashdata("document_status",mensaje("Debes editar un documento","warning"));
		redirect(base_url("facturar"));
	}
	public function documento($id_doc){
		if (!$this->session->userdata('login') || $this->uri->segment(3) == FALSE):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			//obtenemos el numero de id del documento que se quiere editar
			$datosfactura=$this->Facturar_model->get_data_row('facturacion','id',$id_doc);
			$datoscliente=$this->Facturar_model->get_data_row('clientes','razon_social',$datosfactura->razon_social);
			$val['items']=$this->Facturar_model->get_data_result('items','id_factura',$datosfactura->id_factura);
			$val['valores']=$datosfactura;
			$val['cliente']=$datoscliente;
			// agregar breadcrumbs
			$this->breadcrumbs->push('Dashboard', '/');
			$this->breadcrumbs->push('Documentos', '/documentos');
			$this->breadcrumbs->push('Editar Documento', '');
			$datos['bread']=$this->breadcrumbs->show();// salida

			$segmentos_totales=$this->uri->total_segments();

			$datos['segmentos']=$segmentos_totales;
			$datos['titulo']= "Editar Documento";
			$this->load->view('templates/header',$datos);
			$this->load->view('editar/editar_documento',$val);
			$this->load->view('templates/footer');
		endif;
	}
}