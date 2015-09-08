<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
		$this->load->model('Inventario_model');
	}

	public function index(){
			function mensaje($mensaje,$tipo){
				return '<div class="alert alert-'.$tipo.' alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                '.$mensaje.'
	                            </div>';
			}
		$this->session->set_flashdata("document_status",mensaje("Debes editar un documento","warning"));
		redirect(base_url("facturar"));
	}
	public function documento(){
		if (!$this->session->userdata('login') || $this->uri->segment(3) == FALSE):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			//obtnemos el numero de id del documento que se quiere editar
			//Se encuentra en el segmento 3 y lo agregamos a la varialble $nro_documento
			$nro_documento=$this->uri->segment(3);
			$id_factura=$this->Facturar_model->obtener_datos($nro_documento);
			$val['valores']=$id_factura;
			$val['items']=$this->Inventario_model->obtener_datos($id_factura->id_factura);
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