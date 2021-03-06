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
		$datos = array(
			'estado' => $estado
		);
		$this->Facturar_model->actualizar_documento($id,$datos);
	}

	//Actualiza un documento pasando el id
	public function actualizar_documento($id){

		// Campos para tabla de Facturacion
		// Recibe el Valor de los Campos por post, asignadas a una varibale
		$tipodoc=$this->security->xss_clean(strip_tags($this->input->post('tipodoc')));
		$serie=$this->security->xss_clean(strip_tags($this->input->post('serie')));
		$correlativo=$this->security->xss_clean(strip_tags($this->input->post('correlativo')));
		$fechaEmision=$this->security->xss_clean(strip_tags($this->input->post('fechaEmision')));
		$fechaCancelacion=$this->security->xss_clean(strip_tags($this->input->post('fechaCancelacion')));
		$tipopago=$this->security->xss_clean(strip_tags($this->input->post('tipopago')));
		$moneda=$this->security->xss_clean(strip_tags($this->input->post('moneda')));
		$idcliente=$this->security->xss_clean(strip_tags($this->input->post('idcliente')));
		$cliente=$this->security->xss_clean(strip_tags($this->input->post('cliente')));
		$precio_total=$this->security->xss_clean(strip_tags($this->input->post('total')));
		$direccion=$this->security->xss_clean(strip_tags($this->input->post('direccion')));
		$ruc=$this->security->xss_clean(strip_tags($this->input->post('ruc')));
		$igv=$this->security->xss_clean(strip_tags($this->input->post('igv')));

		//codigo unico
		$codigounico=$serie.$correlativo;

		//Campos para tabla producto
		$array=$this->security->xss_clean($this->input->post('productos'));

		//Comprobamos que los campos necesarios para Factura esten llenos
		if( isset($tipodoc) && !empty($tipodoc) && isset($idcliente) && !empty($idcliente) && isset($cliente) && !empty($cliente) && isset($fechaEmision) && !empty($fechaEmision) 
			&& isset($fechaCancelacion) && !empty($fechaCancelacion) && isset($tipopago) && !empty($tipopago) && isset($moneda) && !empty($moneda) 
			&& isset($serie) && !empty($serie) && isset($correlativo) && !empty($correlativo) && isset($precio_total) && !empty($precio_total) && isset($igv) ):

				$datos = array(
					'id_factura'		=> $codigounico,
					'id_cliente'		=> $idcliente,
					'razon_social' 		=> $cliente,
					'tipo_documento'	=> $tipodoc,
					'serie'				=> $serie,
					'correlativo' 		=> $correlativo,
					'fecha_emision'		=> $fechaEmision,
					'fecha_cancelacion'	=> $fechaCancelacion,
					'tipo_pago'			=> $tipopago,
					'moneda'			=> $moneda,
					'monto'				=> $precio_total,
					'estado'			=> "1",
					'igv'				=> $igv
					 );

				$this->Facturar_model->actualizar_documento($id, $datos);
				echo "Listo, la factura se guardo<br>";
				// $this->Facturar_model->actualizar_productos($codigounico,$array);
				// echo "Se guardo el Producto";

				$this->session->set_flashdata('document_status', mensaje('Se Actualizó el Documento','success'));
				redirect(base_url("facturar"));

		else:
			$this->session->set_flashdata('document_status', mensaje('Hubo un error al actualizar el Documento. Intenta Nuevamente','danger'));
			redirect(base_url("facturar"));
		endif;
	}

	//Pagina invisible, guardara los datos que se envio del formulario
	public function guardar_datos_factura(){

		// Campos para tabla de Facturacion
		// Recibe el Valor de los Campos por post, asignadas a una varibale
		$tipodoc=$this->security->xss_clean(strip_tags($this->input->post('tipodoc')));
		$serie=$this->security->xss_clean(strip_tags($this->input->post('serie')));
		$correlativo=$this->security->xss_clean(strip_tags($this->input->post('correlativo')));
		$fechaEmision=$this->security->xss_clean(strip_tags($this->input->post('fechaEmision')));
		$fechaCancelacion=$this->security->xss_clean(strip_tags($this->input->post('fechaCancelacion')));
		$tipopago=$this->security->xss_clean(strip_tags($this->input->post('tipopago')));
		$moneda=$this->security->xss_clean(strip_tags($this->input->post('moneda')));
		$idcliente=$this->security->xss_clean(strip_tags($this->input->post('idcliente')));
		$cliente=$this->security->xss_clean(strip_tags($this->input->post('cliente')));
		$precio_total=$this->security->xss_clean(strip_tags($this->input->post('total')));
		$direccion=$this->security->xss_clean(strip_tags($this->input->post('direccion')));
		$ruc=$this->security->xss_clean(strip_tags($this->input->post('ruc')));
		$igv=$this->security->xss_clean(strip_tags($this->input->post('igv')));

		//Codigo unico de Documentos
		$codigounico=$serie.$correlativo;

		//Campos para tabla producto
		$array=$this->security->xss_clean($this->input->post('productos'));


		//Comprobamos que los campos necesarios para Factura esten llenos
		if( isset($tipodoc) && !empty($tipodoc) && isset($idcliente) && !empty($idcliente) && isset($cliente) && !empty($cliente) && isset($fechaEmision) && !empty($fechaEmision) 
			&& isset($fechaCancelacion) && !empty($fechaCancelacion) && isset($tipopago) && !empty($tipopago) && isset($moneda) && !empty($moneda) 
			&& isset($serie) && !empty($serie) && isset($correlativo) && !empty($correlativo) && isset($precio_total) && !empty($precio_total) && isset($igv) ):

				$data = array(
					'id_factura'		=> $codigounico,
					'id_cliente'		=> $idcliente,
					'razon_social' 		=> $cliente,
					'tipo_documento'	=> $tipodoc,
					'serie'				=> $serie,
					'correlativo' 		=> $correlativo,
					'fecha_emision'		=> $fechaEmision,
					'fecha_cancelacion'	=> $fechaCancelacion,
					'tipo_pago'			=> $tipopago,
					'moneda'			=> $moneda,
					'monto'				=> $precio_total,
					'estado'			=> "1",
					'igv'				=> $igv
					 );

				$this->Facturar_model->insert_data('facturacion',$data);
				echo "Listo, la factura se guardo<br>";
				$this->Facturar_model->grabar_producto($codigounico,$array);
				echo "Se guardo el Producto";
				$this->session->set_flashdata('document_status', mensaje('Se Guardo el Documento','success'));
				redirect(base_url("facturar"));

		else:
			$this->session->set_flashdata('document_status', mensaje('Hubo un error al registrar el Documento. Intenta Nuevamente','danger'));
			redirect(base_url("facturar"));
		endif;
	}
}