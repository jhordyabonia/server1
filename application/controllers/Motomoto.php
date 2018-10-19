<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motomoto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('motomoto/Usuarios_model','usuarios');	
	}
	public function solicitudes()
	{
		$this->load->model('motomoto/Solicitud_model','solicitudes');

		$moto = $this->input->post('membresia');
		echo "<PRE>";
		print_r($this->solicitudes->get_all(array('moto'=>$moto)));
	}
	public function registrar_posicion()
	{
		$this->load->model('motomoto/Motos_model','motos');	
		$moto['membresia'] = $this->input->post('membresia');
		$moto['latitud'] = $this->input->post('latitud');
		$moto['longitud'] = $this->input->post('longitud');
		if($this->motos->get($moto['membresia'])!=FALSE)
			echo $this->motos->update($moto,$moto['membresia'])." Posicion actualizada!";
		else echo $this->motos->insert($moto)." Posicion registrada!";		
	}
	public function motos()
	{
		$this->load->model('motomoto/Motos_model','motos');
		$this->load->model('motomoto/Membresias_model','membresias');
		
		$limit = $this->input->post('limite');
		
		$motos['latitud'] = "LIKE '". $this->input->post('latitud')."%'";
		$motos['longitud'] = "LIKE '". $this->input->post('longitud')."%'";
		
		$membresias=array();
		#foreach($this->motos->get_all($motos) as $k => $u )
		foreach($this->motos->get_all() as $k => $u )
		{
			$tmp=$this->membresias->get($u->membresia);
			if($tmp==false)
				continue;
			#echo json_encode($tmp);
			$u=$this->usuarios->get($tmp->usuario);
			if($u==false)
				continue;

			foreach($u as $kk => $uu )
				$tmp->$kk=$uu;
			echo json_encode($tmp).",";
		} 
		#echo json_encode($membresias);
		#echo json_encode($this->membresias->get_all());

		#echo json_encode($this->motos->get_all());		
	}
	public function singup_departamentos()
	{ 
		$this->load->model('motomoto/Departamento_model','departamento');
		echo "{departamentos:{";
		foreach($this->departamento->get_all() as $dep)
			echo $dep->nombre.",";
		echo "}}";
	}	
	public function singup_municipios()
	{ 
		$this->load->model('motomoto/Municipio_model','municipio');
		$id_dep= $this->input->post('dep');
		echo "{municipios:{";
		foreach($this->municipio->get_all(array('id_departamento'=>$id_dep)) as $dep)
			echo $dep->municipio.",";
		echo "}}";
	}
	public function historial()
	{ 
		$this->load->model('motomoto/Historial_model','historial');
		$id = $this->input->post('usuario');	
		echo json_encode($this->historial->get_all(array('usuario'=>$id)));
	}
	public function borrar_historial()
	{ 
		$this->load->model('motomoto/Historial_model','historial');
		$id = $this->input->post('usuario');	
		echo $this->historial->delete(array('usuario'=>$id));
	}
	private function button($p)
	{
		return "<td><button onclick='fill($p)'>Rellenar ejemplo</button>";
	}
	public function test()
	{
		echo '<!DOCTYPE HTML>
				<html>
				<head>
				<meta charset="UTF-8">
				<title>login Facebook Motomoto</title>
				</head>
				<body>
				<p>Iniciar sesi&oacute;n con Facebook:</p>
				<fb:login-button perms="email,user_birthday"></fb:login-button>
				<script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
				<script>
        
				$(function() {
						$.ajax({
							url: "//connect.facebook.net/es_ES/all.js",
							dataType: "script",
							cache: true,
							success: function() {
							FB.init({
								appId: "154866588355175",
								xfbml: true
							});
							FB.Event.subscribe("auth.authResponseChange", function(response) {
								if (response && response.status == "connected") {
								//FB.api("/motomoto", function(response) {
									alert("Nombre: " + data.name);
									alert("Connected");
							//	});
								}
							});
							}
						});
						});
				</script>
				</body>
				</html>';
		
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
	public function sigin($ventor=FALSE)
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
		$usuario['email'] =$this->input->post('email');
		$usuario['celular'] = $this->input->post('celular');
		$usuario['direccion'] = $this->input->post('direccion');
		$usuario['departamento'] = $this->input->post('departamento');
		$usuario['ciudad'] = $this->input->post('ciudad');
		$usuario['pais'] ="Colombia";
		$usuario['telefono'] = $this->input->post('telefono');
		echo $this->usuarios->insert($usuario). " Registro Exitoso!";
	}
	public function registrar_moto()
	{
		$this->load->model('motomoto/Membresias_model','membresias');
				
		$membresia['usuario'] = $this->input->post('usuario');
		$membresia['cc'] = $this->input->post('cc');
		$membresia['licencia'] =$this->input->post('licencia');
		$membresia['placas_moto'] = $this->input->post('placas_moto');
		$membresia['descripcion_moto'] = $this->input->post('descripcion_moto');
		$membresia['soat'] = $this->input->post('soat');
		$membresia['dias'] = $this->input->post('dias');
		$membresia['fotos'] = $this->input->post('fotos');
		echo $this->membresias->insert($membresia). " Registro Exitoso!";
	}
	public function editar()
	{
		$id = $this->input->post('id');
		$usuario['usuario'] = $this->input->post('usuario');
		$usuario['password'] = md5($this->input->post('password'));
		$usuario['email'] =$this->input->post('email');
		$usuario['celular'] = $this->input->post('celular');
		$usuario['direccion'] = $this->input->post('direccion');
		$usuario['departamento'] = $this->input->post('departamento');
		$usuario['ciudad'] = $this->input->post('ciudad');
		$usuario['pais'] ="Colombia";
		$usuario['telefono'] = $this->input->post('telefono');
		echo $this->usuarios->update($usuario,$id). " Actualizacion Exitosa!";
	}
	public function index($err="")
	{
		$doc="<h3>Services:<h3><br><table><tr><th>Nombre<th>Entradas<th>Salida<th>Ejemplo";
		$doc.="<tr><td><b>singup_departamentos</b><td><td>{despartamento:{dep0,dep1,dep2...depn}".$this->button('"singup_departamentos"');
		$doc.="<tr><td><b>singup_municipios</b><td>dep:int (id_departamento)<td>{municipios:{mun0,mun1,mun2...munN}".$this->button('"singup_municipios"');
		$doc.="<tr><td><b>historial</b><td>usuario:int (id de usuario)<td>".$this->button('"historial"');
		$doc.="<tr><td><b>borrar_historial</b><td>usuario:int (id de usuario)<td>0|1".$this->button('"borrar_historial"');
		$doc.="<tr><td><b>logout</b><th><td>".$this->button('"logout"');
		$doc.="<tr><td><b>loging</b><td>usuario,password<td>[USUARIO]:Datos incorrectos!".$this->button('"login"');
		$doc.="<tr><td><b>registrar</b><td>usuario,password,email,celular,direccion,departamento,ciudad,telefono<td>false:Registro Exitoso!".$this->button('"registrar"');
		$doc.="<tr><td><b>registrar_moto</b><td>usuario,cc,licencia,placas_moto,descripcion_moto,soat,dias,fotos<td>false:Datos incorrectos!".$this->button('"registrar_moto"');
		$doc.="<tr><td><b>editar</b><td>id,usuario,password,email,celular,direccion,departamento,ciudad,telefono<td>false:Actualizacion Exitosa!".$this->button('"editar"');
		$doc.="<tr><td><b>registrar_posicion</b><td>usuario,latitud,longitud<td>false:#!".$this->button('"registrar_posicion"');
		$doc.="<tr><td><b>motos</b><td>latitud,longitud<td>list_position!".$this->button('"motos"');
		echo "<big>
		<label for='url'>Servicio:</label>
		<br><input id='url' name='url'><br>
		<label for='params'>Nombres y Valores:  <small><small>(Separados por '&')</small></small></label>
		<br><input id='params' name='params'><br>
		<button onclick='send();'>Send</button>
		
		<label for='resultados'><br><br>Resultados:<br><br>
		<div id='resultados'></div>
		<label for='doc'><br><br>Doc:<br><br>
		<div id='doc'>$doc</div>
		<script type='text/javascript'>
			function send()
			{
				var http=new XMLHttpRequest();
				var url=document.getElementById('url').value;
				if(url=='')return;
				if(url=='test')return;

				url='http://123seller.azurewebsites.net/motomoto/'+url;

				var params = document.getElementById('params').value;
				http.open('POST', url, true);
				http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				http.send(params);
				
				http.onreadystatechange = function() 
				{
					console.log(http);
					if(http.readyState == 4 && http.status == 200) 
					{
						cotizar=document.getElementById('resultados');
						cotizar.innerHTML=http.response;
					}
				};
			}
			function fill(example)
			{
				switch(example)
				{
					case 'singup_departamentos':
						document.getElementById('params').value='';
						document.getElementById('url').value='singup_departamentos';
						break;
					case 'singup_municipios':
						document.getElementById('params').value='dep=10';
						document.getElementById('url').value='singup_municipios';
						break;
					case 'historial':
						document.getElementById('params').value='usuario=1';
						document.getElementById('url').value='historial';
						break;
					case 'borrar_historial':
						document.getElementById('params').value='usuario=1';
						document.getElementById('url').value='borrar_historial';
						break;
					case 'logout':
						document.getElementById('params').value='';
						document.getElementById('url').value='logout';
						break;
					case 'login':
						document.getElementById('params').value='usuario=jhordy&password=123456';
						document.getElementById('url').value='login';
						break;
					case 'registrar':
						document.getElementById('params').value='usuario=jhordy&password=123456&email=test@test.tst&celular=1234&direccion=cll 47#40-33&departamento=Valle&ciudad=Cali&telefono=03211';
						document.getElementById('url').value='registrar';
						break;
					case 'registrar_moto':
						document.getElementById('params').value='usuario=1&cc=1023&licencia=232&placas_moto=33WHA&descripcion_moto=detalles&soat=DS334&dias=30&fotos=1.jpg';
						document.getElementById('url').value='registrar_moto';
						break;
					case 'editar':
						document.getElementById('params').value='id=1&usuario=jhordy0&password=123456&email=test@test.tst&celular=1234&direccion=cll 47#40-33&departamento=Valle&ciudad=Cali&telefono=03211';
						document.getElementById('url').value='editar';
						break;
					case 'registrar_posicion':
						document.getElementById('params').value='membresia=1&longitud=76908678&latitud=24987654';
						document.getElementById('url').value='registrar_posicion';
						break;
					case 'motos':
						document.getElementById('params').value='latitud=2498&longitud=7690';
						document.getElementById('url').value='motos';
						break;
					default:
						break;
				}
			}
		</script>";	
	}
	
}
