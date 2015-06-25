<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Clientes_model');
	}

	public function index(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			$datos['clientes'] = $this->Clientes_model->leer_clientes();
			$datos['titulo'] = 'Lista de Clientes';
			$this->load->view('templates/header',$datos);
			$this->load->view('clientes/clientes', $datos);
			$this->load->view('templates/footer');
		endif;

	}

	public function agregar(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			$datos['titulo'] = 'Agregar Clientes';
			$this->load->view('templates/header',$datos);
			$this->load->view('clientes/agregar');
			$this->load->view('templates/footer');
			$btn_enviar =$this->input->post('enviar');
			if (isset($btn_enviar)) {

				//ASIGNAMOS UNA VARIABLE A CADA CAMPO RECIBIDO

				$tipo_persona=$this->security->xss_clean(strip_tags($this->input->post('tipo_persona')));
				$tipo_doc=$this->security->xss_clean(strip_tags($this->input->post('tipo_documento')));
				$nro_documento=$this->security->xss_clean(strip_tags($this->input->post('nro_documento')));
				$razon_social=$this->security->xss_clean(strip_tags($this->input->post('razon_social')));
				$direccion=$this->security->xss_clean(strip_tags($this->input->post('direccion')));
				$email=$this->security->xss_clean(strip_tags($this->input->post('email')));
				$telefono=$this->security->xss_clean(strip_tags($this->input->post('telefono')));
				$celular=$this->security->xss_clean(strip_tags($this->input->post('celular')));
				$representante=$this->security->xss_clean(strip_tags($this->input->post('representante')));
				$localidad=$this->security->xss_clean(strip_tags($this->input->post('localidad')));
				$tienda=$this->security->xss_clean(strip_tags($this->input->post('tienda')));

				//COMPROBAMOS QUE TODOS LOS CAMPOS TENGAN DATOS

				if(isset($razon_social) && !empty($razon_social) && isset($nro_documento) && !empty($nro_documento)){

					//SI LOS CAMPOS ESTAN CORRECTOS LOS INSERTAMOS EN LA BASE DE DATOS
					//LLAMAMOS AL MODELO Clientes_model QUE SE ENCARGARÁ DE INGRESAR LOS DATOS

					$this->Clientes_model->agregar_clientes($tipo_persona,$tipo_doc,$nro_documento,$razon_social,$direccion,$email,
										$telefono,$celular,$representante,$localidad,$tienda);
					$this->session->set_flashdata('msje_datos_guardados', 'Los Datos se han guardado');

				}

			}
		endif;

	}

}