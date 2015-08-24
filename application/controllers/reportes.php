<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Facturar_model');
	}

	public function index(){
		$this->load->view("reportes/excel.php");
	}
}