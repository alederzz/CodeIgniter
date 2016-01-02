<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
		$this->load->model('Crud_model');
		$this->load->helper('form');
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
			$datosfactura	=	$this->Crud_model->get_data_row('facturacion','id',$id_doc);
			$datoscliente	=	$this->Crud_model->get_data_row('clientes','id',$datosfactura->id_cliente);
			$val['items']	=	$this->Crud_model->get_data_result('items','id_factura',$datosfactura->id_factura);
			$val['valores']	=	$datosfactura;
			$val['cliente']	=	$datoscliente;
			
			$datos['titulo']= "Editar Documento";
			$this->load->view('templates/header',$datos);
			$this->load->view('editar/editar_documento',$val);
			$this->load->view('templates/footer');
		endif;
	}

	public function cliente($id_cliente){
		if (!$this->session->userdata('login') || $this->uri->segment(3) == FALSE):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			//obtiene la informacion del cliente en la base de datos
			$datos['info'] 		=	$this->Crud_model->get_data_row('clientes','id',$id_cliente);
			if ($datos['info']) {
				$datos['titulo']	=	"Editar Cliente";
				$this->load->view('templates/header', $datos);
				$this->load->view('clientes/agregar', $datos);
				$this->load->view('templates/footer');
			}else{
				$this->session->set_flashdata("document_status",mensaje("El Cliente no existe","danger"));
				redirect('clientes');
			}
		endif;
	}
}