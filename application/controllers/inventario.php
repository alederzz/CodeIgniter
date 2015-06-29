<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// CONTROLADOR INVENTARIO
//////////////////////////

class Inventario extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Inventario_model');
	}


	// Pagina de Inventario
	public function index(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
		// agregar breadcrumbs
		$this->breadcrumbs->push('Dashboard', '/');
		$this->breadcrumbs->push('Productos', '/inventario');

		// salida
		$datos['bread']=$this->breadcrumbs->show();

		$segmentos_totales=$this->uri->total_segments();
		$datos['segmentos']=$segmentos_totales;
		// ./ agregar breadcrumbs

		$datos['titulo']= "Inventario";//Titulo de la página
		$datos['consulta']=$this->Inventario_model->leer_inventario();//carga los datos de la consulta SQL

		$this->load->view('templates/header',$datos);
		$this->load->view('inventario/inventario_vista',$datos);
		$this->load->view('templates/footer');
		endif;
	}


	public function agregar_producto(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			// agregar breadcrumbs
			$this->breadcrumbs->push('Dashboard', '/');
			$this->breadcrumbs->push('Productos', '/inventario');
			$this->breadcrumbs->push('Agregar Producto', '/inventario/agregar_producto');

			// salida
			$datos['bread']=$this->breadcrumbs->show();

			$segmentos_totales=$this->uri->total_segments();
			$datos['segmentos']=$segmentos_totales;
			// ./ agregar breadcrumbs

			$datos['titulo']="Agregar Nuevo Producto";
			$this->load->view('templates/header',$datos);
			$this->load->view('inventario/agregar');
			$this->load->view('templates/footer');

			$btn_enviar = $this->input->post('enviar');
				if (isset($btn_enviar)) {
				
				//asignamos una variable a cada campo

				$sku=$this->security->xss_clean(strip_tags($this->input->post('codigo_producto')));
				$nombre_producto=$this->security->xss_clean(strip_tags($this->input->post('nombre_producto')));
				$cantidad=$this->security->xss_clean(strip_tags($this->input->post('cantidad')));
				$precio=$this->security->xss_clean(strip_tags($this->input->post('precio')));

				//comprobamos que los campos no esten vacios

					if( isset($sku) && !empty($sku) && isset($nombre_producto) && !empty($nombre_producto) 
						&& isset($cantidad) && !empty($cantidad) && isset($precio) && !empty($precio) ){

						$this->Inventario_model->agregar_producto($sku, $nombre_producto, $cantidad, $precio);
						$this->session->set_flashdata('mensaje', 'Los Datos se han guardado');
					}
			}

		endif;
	}
}