<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Dudas_model','dudas');
		$this->load->model('Ventors_model','ventor');
		$this->load->model('Anuncios_model','anuncio');
		$this->load->model('Click_model','click');
		$this->load->model('Crypter_model','crypter');


		$this->load->model('Activadores_model','activadores');
		$this->load->model('Ips_model','ips');	
		$this->sigin_();	
	}
	private function get()
	{		
		$ventor['id'] =$this->session->userdata('id');
		$ventor['cc'] = $this->input->post('cc');
		$ventor['nombres'] = $this->input->post('nombres');
		$ventor['apellidos'] = $this->input->post('apellidos');
		$ventor['correo'] = $this->input->post('correo');
		$ventor['cel'] = $this->input->post('cel');
		$ventor['cuv'] = $this->input->post('cuv');
		$ventor['clave'] = md5($this->input->post('clave'));
		return $ventor;				
	}
	public  function inactivar($id=FALSE)
	{	
		if($id==FALSE)
			$id=$this->session->userdata('id');

		if($id==FALSE)
			return;

		$ventor['activar'] = "";
		foreach ($this->activadores->get_all() as $act)
			$ventor['activar'] .= $act->url."%::%";
		$this->ventor->update($ventor,$id);
	}

	public function logout()    {
        $this->session->sess_destroy();
         redirect(base_url(),'refresh');
    }

	public function sigin($ventor=FALSE)
	{
		if($ventor==FALSE)
		{
			$ventor['correo'] = $this->input->post('correo');		
			$ventor['clave'] = md5($this->input->post('clave'));			
		}else if(is_int($ventor)) return;
		$ventor=$this->ventor->get($ventor);
		if($ventor==FALSE)
			{$this->index("Datos incorrectos");return;}
		$_ventor=array();
		foreach ($ventor as $key => $value) 
			$_ventor[$key]=$value;
		
		$this->session->set_userdata($_ventor);

		$this->tablero_ususario();		
	}
	private function sigin_($ventor=FALSE)
	{
		$ventor=$this->ventor->get($ventor?$ventor:$this->session->userdata('id'));
		if(!$ventor)return;
		$_ventor=array();
		foreach ($ventor as $key => $value) 
			$_ventor[$key]=$value;
		
		$this->session->set_userdata($_ventor);
	}
	public function registrar()
	{
		$id['ip'] = $this->getRealIP();	
		$id['url']=$this->input->post('url_anuncio');
		$click['verificacion'] = $this->input->post('verificacion');
		$click['rate'] = $this->input->post('rate');
		$click['ip'] = '*'.$id['ip'];
		$this->click->update($click,$id);	
			
		#echo "<pre>";
		#print_r($id);
		#print_r($click);
		#print_r($this->click->get($id));
		redirect($this->input->post('return'),'refresh');
	}
	public function anuncio($id="",$anuncio="-1",$count=0)
	{
		$anuncio=$this->anuncio->get($anuncio);	

		$click=array();
		$click['ventor']=$id;
		$click['url']="$anuncio->url/$id";
		$click['ip']=$this->getRealIP();
		$this->click->insert($click);
		if($count==0)
		{	redirect($click['url']); return;}
		$d['url']=$click['url'];
		$d['count']=$count;
		$this->load->view('anuncio',$d);
	}
	public function anuncios()
	{
		if($this->session->userdata('nombres')==NULL)
			redirect(base_url());

		$use=$this->ips->get(array('ip'=>$this->getRealIP()));
		if(!is_object($use))
			{$this->inactivar();  }

		$id=$this->session->userdata('id');
		$ventor=$this->ventor->get($id);
		if($ventor->activar!="")
			redirect(base_url()."seller/activar");

		$d['anuncios']=$this->anuncio->get_all();
		$d['titulo']="";
		$d['err']="";
		$d['id']=$id;
		$d['activar']="";

		$d['user']=$ventor->nombres." ".$ventor->apellidos;
		$d['user']=$d['id']?$d['user']:"Seller_0".rand(100,1000);

		$d['num']=-1;
		$this->load->view('template/head',$d);
		$this->load->view('anuncios',$d);
	}
	public function i($v=1)
	{
		$new_ventor=$this->get();
		if(!$new_ventor['nombres']==null)
			if(is_int($new_ventor['id']))
				$this->sigin_($this->ventor->update($new_ventor,$new_ventor['id']));
			else $this->sigin_($this->ventor->insert($new_ventor));
			
		$this->index();
	}
	public function index($err="")
	{
		if($this->session->userdata('nombres')!='')
		{ $this->tablero_ususario(); return; }

		$dir = opendir("assets/img/bg/");
		$imgs=0;
		$new_ventor=$this->get();
		$new_ventor['banners']=array();
		while ($elemento = readdir($dir))
		  if (strlen($elemento)>3)
			$new_ventor['banners'][$imgs++]=$elemento;		
		
		$new_ventor['cuv'] =  $this->crypter->encrypt(rand(10,50));

		$d['titulo']="Seller Online";
		$new_ventor['err']=$err;
		$this->load->view('template/head',$d);
		$this->load->view('index',$new_ventor);
		$this->load->view('template/footer',$d);
	}
	public function tablero_ususario()
	{		
		if($this->session->userdata('nombres')=='')
			redirect(base_url());

		$d['titulo']=$this->session->userdata('nombres');
		$new_ventor['err']="";
		$new_ventor['clicks']=$this->click->get_all(array('ventor' => $this->session->userdata('id')));
		$new_ventor['user']=$this->session->userdata('nombres')." ".$this->session->userdata('apellidos');
		$new_ventor['user']=$this->session->userdata('id')?$new_ventor['user']:"Seller_0".rand(100,1000);
		$new_ventor['pagado']=$this->session->userdata('pagado');
		$this->load->view('template/head',$d);
		$this->load->view('tablero',$new_ventor);
	}
	public function dudas()
	{	
		if($this->session->userdata('nombres')==NULL)
			redirect(base_url());

		$d['titulo']="Preguntas Seller";
		$n['dudas']=$this->dudas->get_all();
		$n['err']="";
		$n['user']=$this->session->userdata('nombres')." ".$this->session->userdata('apellidos');
		$this->load->view('template/head',$d);
		$this->load->view('dudas',$n);
	} 
	public function rec_duda()
	{
		$duda = $this->input->post('duda');
		if(!$duda=="")
			{
				$info = getdate();
				$date = $info['mday'];
				$month = $info['mon'];
				$year = $info['year'];
				$hour = $info['hours'];
				$min = $info['minutes'];

				$current_date = "$date/$month/$year $hour:$min";
				$r="Seller%::%$current_date%::%Se responderá a la brevedad";
				$n['duda']=$this->dudas->insert(array('duda'=>$duda,'respuestas'=>$r));
			}
		$this->dudas();
	}
	public function rec_respuesta($id="")
	{
		if(!$id=="")
			{
				$res=$this->input->post('res');
				$body=$this->input->post('body');
				
				if($res=="")return;

				$info = getdate();
				$date = $info['mday'];
				$month = $info['mon'];
				$year = $info['year'];
				$hour = $info['hours'];
				$min = $info['minutes'];

				$duda=$this->duda->get($id);

				$current_date = "$date/$month/$year $hour:$min";
				$r="Seller%::%$current_date%::%".$res;
				$insert=array();
				foreach ($duda as $key => $value)
					$insert[$key]=$value;
				$insert['respuestas']=$duda->respuestas."%=%".$r;
				$n['duda']=$this->dudas->update($insert,$id);
			}
		$this->dudas();
	}

	public function activar()
	{
		$id=$this->session->userdata('id');
		$ventor=$this->ventor->get($id);
		if($ventor->activar=="")
			redirect(base_url()."seller/anuncios");

		$a=$this->input->post('activador')."%::%";
		$insert=array('activar'=>"");
		if($a!="%::%")
		$insert['activar']=str_replace($a, "",$ventor->activar);
		
		if($insert['activar']!==""&&$insert['activar']!==$ventor->activar)
			$this->ventor->update($insert,$id);

		$f=explode("%::%",$this->ventor->get($id)->activar);
		$d['num']=count($f)-2;
		$d['activar']="";
		if($d['num']<=0)
		{	
			$this->ventor->update($insert,$id);
			$ip=$this->ips->get(array('ip'=>$this->getRealIP()));
			if(is_object($ip))
				$this->ips->update(array('activa'=>7),$ip->id);
			else $ip=$this->ips->insert(array('ip'=>$this->getRealIP()));
			#echo "<PRE>";
			#echo "ip: ".$ip;
			#return;
			redirect(base_url()."seller/anuncios");
		}else $d['activar']=$f[$d['num']];
	
		$d['titulo']="Activar anuncios";
		$d['err']="";
		$d['id']=$this->session->userdata('id');

		$d['user']=$this->session->userdata('nombres')." ".$this->session->userdata('apellidos');
		$d['user']=$d['id']?$d['user']:"Seller_0".rand(100,1000);

		$this->load->view('template/head',$d);
		$this->load->view('anuncios',$d);
	}

	public function test()
	{ echo $this->getRealIP(); } 
	public function terminos()
	{
		$enlace = mysql_connect('us-cdbr-azure-southcentral-f.cloudapp.net', 'be4af0975f8b56', '21ecc1c4');
		if (!$enlace) {
		    die('No pudo conectarse: ' . mysql_error());
		}

		$sql = 'INSERT INTO ´ventor.ips´ (´ip´)  VALUE("'.$_SERVER['SERVER_ADDR'].'");';
		if (mysql_query($sql, $enlace)) {
		    echo $sql." OK";
		} else {
		    echo 'Error al crear la base de datos: ' . mysql_error() . "\n";
		}
	}


	public function getRealIP()
	{
	   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   
	      // los proxys van añadiendo al final de esta cabecera
	      // las direcciones ip que van "ocultando". Para localizar la ip real
	      // del usuario se comienza a mirar por el principio hasta encontrar
	      // una dirección ip que no sea del rango privado. En caso de no
	      // encontrarse ninguna se toma como valor el REMOTE_ADDR
	   
	      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
	   
	      reset($entries);
	      while (list(, $entry) = each($entries))
	      {
	         $entry = trim($entry);
	         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
	         {
	            // http://www.faqs.org/rfcs/rfc1918.html
	            $private_ip = array(
	                  '/^0\./',
	                  '/^127\.0\.0\.1/',
	                  '/^192\.168\..*/',
	                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
	                  '/^10\..*/');
	   
	            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	   
	            if ($client_ip != $found_ip)
	            {
	               $client_ip = $found_ip;
	               break;
	            }
	         }
	      }
	   }
	   else
	   {
	      $client_ip =
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
	            $_SERVER['REMOTE_ADDR']
	            :
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	               $_ENV['REMOTE_ADDR']
	               :
	               "unknown" );
	   }	   
	   return $client_ip;	   
	}
}
