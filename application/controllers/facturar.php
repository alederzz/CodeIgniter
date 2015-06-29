<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
	}
	// Pagina de Inventario
	public function index(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			// agregar breadcrumbs
			$this->breadcrumbs->push('Dashboard', '/');
			$this->breadcrumbs->push('Documentos', '/documentos');
			$this->breadcrumbs->push('Agregar Factura', '/facturar');

			// salida
			$datos['bread']=$this->breadcrumbs->show();

			$segmentos_totales=$this->uri->total_segments();
			$datos['segmentos']=$segmentos_totales;

			$datos['titulo']= "Facturar";
			$this->load->view('templates/header',$datos);
			$this->load->view('factura/crear_factura');
			$this->load->view('templates/footer');
		endif;
	}

	//Pagina invisible, guardara los datos que se envio del formulario
	public function guardar_datos_factura(){

		// Campos para tabla de Facturacion
		// Recibe el Valor de los Campos por post, asignadas a una varibale
		$serie=$this->security->xss_clean(strip_tags($this->input->post('serie')));
		$correlativo=$this->security->xss_clean(strip_tags($this->input->post('correlativo')));
		$fecha=$this->security->xss_clean(strip_tags($this->input->post('fecha')));
		$moneda=$this->security->xss_clean(strip_tags($this->input->post('moneda')));
		$cliente=$this->security->xss_clean(strip_tags($this->input->post('cliente')));
		$precio_total=$this->security->xss_clean(strip_tags($this->input->post('total')));
		$direccion=$this->security->xss_clean(strip_tags($this->input->post('direccion')));
		$ruc=$this->security->xss_clean(strip_tags($this->input->post('ruc')));


		//Campos para tabla producto
		$producto=$this->security->xss_clean(strip_tags($this->input->post('producto')));
		$cantidad=$this->security->xss_clean(strip_tags($this->input->post('cantidad')));
		$precio=$this->security->xss_clean(strip_tags($this->input->post('precio')));


		//Codigo unico de Documentos
		$codigounico=$serie.$correlativo;

		//Comprobamos que los campos necesarios para Factura esten llenos
		if(isset($cliente) && !empty($cliente) && isset($fecha) && !empty($fecha) && isset($moneda) && !empty($moneda) && isset($serie) && !empty($serie)
			&& isset($correlativo) && !empty($correlativo) && isset($precio_total) && !empty($precio_total)):

			//comprobamos que no se haya registrado otra factura con el mismo numero de correlativo
			$consulta_serie = $this->Facturar_model->consultar_factura($correlativo);

			//Si no hay el correlativo en la base de datos, la registrará
			if ($consulta_serie) :

				echo "<h2>Ya se ha registrado este numero de correlativo :(</h2>";

			else:

				$this->Facturar_model->grabar_factura($codigounico, $cliente, $fecha, $moneda, $serie, $correlativo, $precio_total);
				echo "Listo, la factura se guardo :3";
				$this->Facturar_model->grabar_producto($codigounico,$producto,$cantidad,$precio);
				echo "Se guardo el Producto";

			endif;

		else:
			echo "<h2>No Has mandado Datos";
		endif;
	}
}