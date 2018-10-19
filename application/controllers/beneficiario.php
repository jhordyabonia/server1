<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiario extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		
		$this->load->model('Universidad_model','universidad');
		$this->load->model('Beneficiario_model','beneficiario');
	}
	public function ver()
	{		
		$beneficiarios=$this->beneficiario->get_all(array("ACTIVO"=>1));
		$beneficiario=$this->beneficiario->get("1059985632");
		$this->load->view("pages/examples/profile.html",array("beneficiario"=>$beneficiario,"beneficiarios"=>$beneficiarios),false);	
	}
	public function index()
	{	
		#$view="ag_asignaturas.html";
		#$pg=$this->load->view("adminlte/$view",false,true);
		#$engine=$this->load->view("engine.js",false,true);
		#echo "<script>$engine</script>$pg";
		#echo "Hola";
		$beneficiarios=$this->beneficiario->get_all(array("ACTIVO"=>1));
		$beneficiario=$this->beneficiario->get("1059985632");
		$this->load->view("beneficiarios.html",array("beneficiario"=>$beneficiario,"beneficiarios"=>$beneficiarios),false);
	}
}