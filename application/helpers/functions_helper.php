<?php 

//$valor : cadena a cortar
//$delimitador : caracter que servirá de cortador
//$indice : valor que devolverá la funcion
//$array : 

//Usado en View : Template Factura
function cutString($valor, $delimitador, $indice, $array=0){


	$process=explode($delimitador, $valor);
	if(is_array($array)){
		return $array[(int)$process[$indice]];
	}else{
		return $process[$indice];
	}
}

//$mensaje : cadena de texto (mensaje)
//$tipo : tipo de mensaje (success, info, danger, warning)

//Usado en Controller: facturar, editar
function mensaje($mensaje,$tipo){
	return '<div class="alert alert-'.$tipo.' alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        '.$mensaje.'
                    </div>';
}

function user_data($valor){

	$CI =& get_instance();
	$user=$CI->session->userdata('login');

	switch ($valor) {
		case 'usuario':
			$CI->db->where('usuario',$user);
			$consulta= $CI->db->get('usuarios');
			return $consulta->row('nombre');
			break;

		case 'avatar':
			$CI->db->where('usuario',$user);
			$consulta= $CI->db->get('usuarios');
			return $consulta->row('avatar_uri');
			break;
	}

}