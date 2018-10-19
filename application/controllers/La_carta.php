<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class la_carta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('la_carta/Usuarios_model','usuarios');	
	}
	
	public function test()
	{
		echo '<!DOCTYPE HTML>
				<html>
				<head>
				<meta charset="UTF-8">
				<title>login Facebook La Carta</title>
				</head>
				<body>
				<p>Iniciar sesi&oacute;n con Facebook:</p>
				<fb:login-button perms="email,user_birthday"></fb:login-button>
				<script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
				<script>
        
				$(function() {
						$.ajax({
							url: "http://connect.facebook.net/es_ES/all.js",
							dataType: "script",
							cache: true,
							success: function() {
							FB.init({
								appId: "624760184374882",
								xfbml: true
							});
							FB.Event.subscribe("auth.authResponseChange", function(response) {
								if (response && response.status == "connected") {
								/*FB.api("/me",{ locale: "en_US", fields: "name, email" }, function(response) {
									//alert("Nombre: " + data.name);
									console.log(response);
									console.log("Nombre: " + response.name);
									console.log("Correo: " + response.email);
									console.log("Connected");
								});*/

								FB.login(function(response) {
							if (response.status === "connected") {
								
									console.log("Nombre: " + response.name);
									console.log("Correo: " + response.email);
							} else if (response.status === "not_authorized") {
								// The person is logged into Facebook, but not your app.
							} else {
								// The person is not logged into Facebook, so were not sure if
								// they are logged into this app or not.
							}
							});
								}
							});
							}
						});
						});
				</script>
				</body>
				</html>';

				echo "<script>
							window.fbAsyncInit = function() {
								FB.init({
								appId      : '624760184374882',
								xfbml      : true,
								version    : 'v2.8'
								});
								FB.AppEvents.logPageView();
							};

							(function(d, s, id){
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) {return;}
								js = d.createElement(s); js.id = id;
								js.src = '//connect.facebook.net/en_US/sdk.js';
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));

							
							</script>
							<div
  class='fb-like''
  data-share='true'
  data-width='450'
  data-show-faces='true'>
</div>
";		
	}	
	public function index()
	{
		echo "La Carta!!";
	}
    public function singup_departamentos()
	{ 
		$this->load->model('la_carta/Departamento_model','departamento');
		echo "{departamentos:{";
		foreach($this->departamento->get_all() as $dep)
			echo $dep->nombre.",";
		echo "}}";
	}	
	public function singup_municipios()
	{ 
		$this->load->model('la_carta/Municipio_model','municipio');
		$id_dep= $this->input->post('dep');
		echo "{municipios:{";
		foreach($this->municipio->get_all(array('id_departamento'=>$id_dep)) as $dep)
			echo $dep->municipio.",";
		echo "}}";
	}
    public function logout()    
	{
        $this->session->sess_destroy();
        echo "logout!";
    }
	public function login($ventor=FALSE)
	{
		if($ventor==FALSE)
		{
			$ventor['usuario'] = $this->input->post('usuario');		
			$ventor['password'] = md5($this->input->post('password'));		
		}else if(is_int($ventor)) return;
		$ventor=$this->usuarios->get($ventor);
		if($ventor==FALSE)
			{echo "Datos incorrectos!"; return;}
		$_ventor=array();
		foreach ($ventor as $key => $value) 
			$_ventor[$key]=$value;
		
		$this->session->set_userdata($_ventor);

		echo json_encode($_ventor);	
	}
    
	public function registrar()
	{
		$usuario['usuario'] = $this->input->post('usuario');
		$usuario['password'] = md5($this->input->post('password'));
		$usuario['correo'] =$this->input->post('email');
		$usuario['celular'] = $this->input->post('celular');
		$usuario['direccion'] = $this->input->post('direccion');
		$usuario['departamento'] = $this->input->post('departamento');
		$usuario['ciudad'] = $this->input->post('ciudad');
		echo $this->usuarios->insert($usuario). " Registro Exitoso!";
	}
	public function registrar_vendedor()
	{
		$this->load->model('la_carta/Vendedores_model','vendedores');
				
		$membresia['usuario'] = $this->input->post('usuario');
		$membresia['nombre'] = $this->input->post('nombre');
		$membresia['descripcion'] =$this->input->post('descripcion');
		$membresia['departamento'] = $this->input->post('departamento');
		$membresia['ciudad'] = $this->input->post('ciudad');
		$membresia['direccion'] = $this->input->post('direccion');
		$membresia['latitud'] = $this->input->post('latitud');
		$membresia['longitud'] = $this->input->post('longitud');
		$membresia['del_dia'] = $this->input->post('del_dia');
		echo $this->vendedores->insert($membresia). " Registro Exitoso!";
	}
	
	public function vendedores()
	{
		$this->load->model('la_carta/vendedores_model','vendedore');
		
		$limit = $this->input->post('limite');
		
		$vendedore['latitud'] = "LIKE '". $this->input->post('latitud')."%'";
		$vendedore['longitud'] = "LIKE '". $this->input->post('longitud')."%'";
		
		#foreach($this->vendedore->get_all($vendedore) as $k => $u )
		foreach($this->vendedore->get_all() as $k => $u )
		{
			if($tmp==false)
				continue;
			#echo json_encode($tmp);
			if($u==false)
				continue;

			foreach($u as $kk => $uu )
				$tmp->$kk=$uu;
			echo json_encode($tmp).",";
		} 
		#echo json_encode($vendedore);
		#echo json_encode($this->vendedore->get_all());
	
	}
	}
