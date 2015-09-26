<?php
class Facturar_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function listar_documentos(){

		$this->db->order_by("id", "desc"); 
		$consulta = $this->db->get('facturacion');
		return $consulta->result();

	}

	//Consulta los datos de la tabla de facturacion en la Base de Datos
	public function consultar_factura($valor){
		$this->db->select('id_factura');
		$this->db->where('id_factura', $valor);
		$query= $this->db->get('facturacion');

		//si no hay datos de serie en la Base de datos devolvera "nodata"
		if ($query->num_rows() > 0):
		    echo "true";
		else:
			echo "false";
		endif;

	}
	//Se utiliza en editar documento
	public function actualizar_documento($id,$datos){

		$this->db->where('id', $id);
		$this->db->update('facturacion', $datos); 
	}

	public function obtener_datos($id){
		$this->db->where('id', $id);
		$consulta = $this->db->get('facturacion');

		if ($consulta->num_rows() > 0):
			return $consulta->row();
		else:
			return false;
		endif;

	}

	//Graba los datos de faturacion en la Base de Datos
	public function grabar_factura($codigounico, $idcliente, $cliente, $tipodoc, $fechaEmision, $fechaCancelacion, $tipopago, $moneda, $serie, $correlativo, $precio_total, $igv){
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

		$this->db->insert('facturacion',$datos);

	}

	public function grabar_producto($codigounico,$array){

		$datos = array(); //abre el array

		for($i=0; $i<count($array); $i++){
		    $datos[] = array(
		    	'id_factura'	=> $codigounico,
				'producto'		=> $array[$i]['producto'],
				'cantidad'		=> $array[$i]['cantidad'],
				'precio_unit'	=> $array[$i]['precio_unit'],
				'precio'		=> $array[$i]['precio']
		    );
		}

		$this->db->insert_batch('items',$datos);

	}
}
?>