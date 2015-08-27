<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
	}

	//Pagina Muestra Facturas Realizadas
	public function index(){

		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			// agregar breadcrumbs
			$this->breadcrumbs->push('Dashboard', '/');
			$this->breadcrumbs->push('Documentos', '/documentos');
			$datos['bread']=$this->breadcrumbs->show();// salida


			$segmentos_totales=$this->uri->total_segments();

			$datos['segmentos']=$segmentos_totales;
			$datos['titulo'] = "Documentos Creados";
			$datos['documentos'] = $this->Facturar_model->listar_documentos();
			$this->load->view('templates/header', $datos);
			$this->load->view('factura/documentos');
			$this->load->view('templates/footer');
		endif;
	}

	// Pagina de Facturación
	public function crear(){
		if (!$this->session->userdata('login')):
			$this->session->set_flashdata('mensaje','Debes Iniciar Sesion');
			redirect(base_url());
		else:
			// agregar breadcrumbs
			$this->breadcrumbs->push('Dashboard', '/');
			$this->breadcrumbs->push('Documentos', '/documentos');
			$this->breadcrumbs->push('Agregar Factura', '/facturar');
			$datos['bread']=$this->breadcrumbs->show();// salida


			$segmentos_totales=$this->uri->total_segments();

			$datos['segmentos']=$segmentos_totales;
			$datos['titulo']= "Crear Documento";
			$this->load->view('templates/header',$datos);
			$this->load->view('factura/crear_factura');
			$this->load->view('templates/footer');
		endif;
	}

	//anular facturas con ajax
	public function anular_doc(){
		$id=$this->input->post('id');
		$estado=$this->input->post('estado');
		$this->Facturar_model->actualizar_factura($id,$estado);
	}

	//comprobador de correlativo
	public function comprobar_correlativo(){
		//recibimos los valores de serie y correltivo
		$serie=$this->security->xss_clean(strip_tags($this->input->post('serie')));
		$correlativo=$this->security->xss_clean(strip_tags($this->input->post('correlativo')));

		$valor=$serie.$correlativo;
		//comprobamos que no se haya registrado otra factura con el mismo numero de correlativo
		$consulta_serie = $this->Facturar_model->consultar_factura($valor);

		if ($consulta_serie) {
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}

	//Pagina invisible, guardara los datos que se envio del formulario
	public function guardar_datos_factura(){

		// Campos para tabla de Facturacion
		// Recibe el Valor de los Campos por post, asignadas a una varibale
		$tipodoc=$this->security->xss_clean(strip_tags($this->input->post('tipodoc')));
		$serie=$this->security->xss_clean(strip_tags($this->input->post('serie')));
		$correlativo=$this->security->xss_clean(strip_tags($this->input->post('correlativo')));
		$fecha=$this->security->xss_clean(strip_tags($this->input->post('fecha')));
		$moneda=$this->security->xss_clean(strip_tags($this->input->post('moneda')));
		$idcliente=$this->security->xss_clean(strip_tags($this->input->post('idcliente')));
		$cliente=$this->security->xss_clean(strip_tags($this->input->post('cliente')));
		$precio_total=$this->security->xss_clean(strip_tags($this->input->post('total')));
		$direccion=$this->security->xss_clean(strip_tags($this->input->post('direccion')));
		$ruc=$this->security->xss_clean(strip_tags($this->input->post('ruc')));
		$igv=$this->security->xss_clean(strip_tags($this->input->post('igv')));


		//Campos para tabla producto
		$array=$this->security->xss_clean($this->input->post('group-a'));
		// $cantidad=$this->security->xss_clean(strip_tags($this->input->post('cantidad')));
		// $precio=$this->security->xss_clean(strip_tags($this->input->post('precio')));


		//Codigo unico de Documentos
		$codigounico=$serie.$correlativo;

		//Comprobamos que los campos necesarios para Factura esten llenos
		if( isset($tipodoc) && !empty($tipodoc) && isset($idcliente) && !empty($idcliente) && isset($cliente) && !empty($cliente) && isset($fecha) && !empty($fecha) && isset($moneda) && !empty($moneda) 
			&& isset($serie) && !empty($serie) && isset($correlativo) && !empty($correlativo) && isset($precio_total) && !empty($precio_total) && isset($igv) ):

			//comprobamos que no se haya registrado otra factura con el mismo numero de correlativo
			$consulta_serie = $this->Facturar_model->consultar_factura($correlativo);

			//Si no hay el correlativo en la base de datos, la registrará
			if ($consulta_serie) :
				echo "<h2>Ya se ha registrado este numero de correlativo :(</h2>";
			else:
				$this->Facturar_model->grabar_factura($codigounico, $idcliente, $cliente, $tipodoc, $fecha, $moneda, $serie, $correlativo, $precio_total, $igv);
				echo "Listo, la factura se guardo<br>";
				$this->Facturar_model->grabar_producto($codigounico,$array);
				echo "Se guardo el Producto";
			endif;

		else:
			echo "<h2>No Has mandado Datos<br>";
			echo $tipodoc;
		echo $serie;
		echo $correlativo;
		echo $fecha;
		echo $moneda;
		echo $idcliente;
		echo $cliente."<br> precio";
		echo $precio_total;
		echo $direccion."<br/>";
		echo $ruc."<br/>";
		echo $igv;
		endif;
	}
}