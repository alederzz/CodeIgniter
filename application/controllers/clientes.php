<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->model('Clientes_model');
	}

	public function index(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:

			$datos['clientes'] = $this->Crud_model->get_data("clientes");
			$datos['titulo'] = 'Lista de Clientes';
			$this->load->view('templates/header',$datos);
			$this->load->view('clientes/clientes', $datos);
			$this->load->view('templates/footer');
		endif;

	}

	//Genera un Json para la seccion de Autocomplete en Crear Factura
	public function leer_clientes(){

		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:

			header('Content-Type: application/json');
			$valor=$_GET['query'];  //captura la variable que pasa el autocomplete
			$data=$this->Clientes_model->buscar_clientes($valor);
			$clientes = array(); //creamos un array

			foreach($data as $columna) { 
				$id	=	$columna->id;
			   $razon=$columna->razon_social;
			   $documento=$columna->nro_documento;
			   $direccion=$columna->direccion;
			    
			   $clientes[] = array(
			   	'value'=> $razon, 
			   	'data' => $id, 
			   	'nro_documento' => $documento, 
			   	'direccion' => $direccion
			   );
			 
			}

			$array = array("query" => "Unit", "suggestions" => $clientes);
			echo json_encode($array);
		endif;

	}

	//Pagina para Ingresar Clientes
	public function agregar(){
		$this->load->helper('form');
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

				$data = array(
					'tipo_persona' 	=> $tipo_persona,
					'tipo_doc' 		=> $tipo_doc,
					'nro_documento'	=> $nro_documento,
					'razon_social'	=> $razon_social,
					'direccion'		=> $direccion,
					'email'			=> $email,
					'telefono'		=> $telefono,
					'celular'		=> $celular,
					'representante'	=> $representante,
					'localidad'		=> $localidad,
					'tienda'		=> $tienda
				 );

				//COMPROBAMOS QUE TODOS LOS CAMPOS TENGAN DATOS

				if(isset($razon_social) && !empty($razon_social) && isset($nro_documento) && !empty($nro_documento)){

					//SI LOS CAMPOS ESTAN CORRECTOS LOS INSERTAMOS EN LA BASE DE DATOS
					//LLAMAMOS AL MODELO Clientes_model QUE SE ENCARGARÁ DE INGRESAR LOS DATOS

					$this->Crud_model->insert_data("clientes",$data);
					$this->session->set_flashdata('document_status', mensaje('Se Guardó el Cliente','success'));
					redirect(base_url("clientes"));

				}

			}
		endif;
	}

}