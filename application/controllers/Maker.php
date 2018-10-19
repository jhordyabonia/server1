<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maker extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Clientes_model','clientes');
		$this->load->model('Scripts_model','scripts');
	}
	public function form_maker($edit=FALSE)
	{	
		if($this->session->userdata('nivel')==0)
			redirect(base_url());

		$titulo=$_POST['titulo'];
		$subtitulo=$_POST['subtitulo'];
		$encabezado=$_POST['encabezado'];
		$titulo_submit=$_POST['titulo_submit'];
		$footer=$_POST['footer'];
		$logo=$_POST['logo'];
		$background=$_POST['background'];
		$url=$_POST['url'];

		$s='<script type="text/javascript">   
	   var inputs_seller=Array();   
	   var url_seller="<?=base_url()?>maker";
	   var id_seller="<?=$id_script?>";';

	   $s.="add_input('titulo','$titulo');";
	   $s.="add_input('background','$background');";
	   $s.="add_input('subtitulo','$subtitulo');";
	   $s.="add_input('encabezado','$encabezado');";
	   $s.="add_input('titulo_submit','$titulo_submit');";
	   $s.="add_input('logo','$logo');";
	   $s.="add_input('footer','$footer');";
	   $s.="add_input('url','$url');";
	   foreach (explode(',',$_POST['inputs']) as $k=> $V) 
		$s.="add_input('inputs','titulo%=%$V%=%nombre%=%$V%=%valor%=%%=%tipo%=%');";

	   $s.="getForm();";
	   $s.="</script>";

	   $id_v=$this->session->userdata('id');
	   if($edit!=FALSE)
	   { $c = $edit; $this->scripts->update(array('script'=>$s),$edit); }
	   else
	   {
		   $n=-1;
		   $p=$this->scripts->get(array('nombre'=>$titulo));
		   while(!$p==FALSE)
		   	{$n++;$p=$this->scripts->get(array('nombre'=>$titulo.$n));}
		   if($n!=-1)
		   	$titulo.=$n;
	   	    $this->scripts->insert(array('nombre'=>$titulo,'script'=>$s,'ventor'=>$id_v));
	   	   $c =$this->scripts->get(array('nombre'=>$titulo))->id;
	    }
	   redirect(base_url()."maker/a/$c");
	}
	public function me()
	{	
		if($this->session->userdata('nivel')==0)
			redirect(base_url());

		$d['titulo']=$this->session->userdata('nombres');
		$ss['err']="";
		$ss['scripts']=$this->scripts->get_all(array('ventor' => $this->session->userdata('id')));
		$ss['user']=$this->session->userdata('nombres')." ".$this->session->userdata('apellidos');
		$ss['user']=$this->session->userdata('id')?$ss['user']:"Seller_0".rand(100,1000);
		$ss['pagado']=$this->session->userdata('pagado');
		$this->load->view('template/head',$d);
		$this->load->view('script_manager',$ss);
	}
	public function index()
	{
		$d=$this->get();
		$d['url']=isset($d['url'])?$d['url']:base_url()."maker/i";
		$d['id']=isset($d['id'])?$d['id']:$this->session->userdata('id');
		$this->load->view('template/head',$d);
		$this->load->view('made',$d);
	}
	public function i()
	{
		if(!isset($_POST))
			redirect($_SERVER['HTTP_REFERER'],'refres');			

		$this->clientes->insert(array('data'=>implode("%::%",$_POST),'id_seller'=>$_POST['id']));
	
		redirect($_SERVER['HTTP_REFERER'],'refres');
	}
	public function a($id_script="form_maker",$d=FALSE)
	{
		#if(is_numeric($d))$d=array('id'=>$d);
		if(is_numeric($id_script))
			$s=$this->scripts->get($id_script);
		else $s=$this->scripts->get(array('nombre'=>$id_script));
		if($s==FALSE) return show_404();
		if($s->publico=='-1')
			return $this->print_script($s->ventor,$s->nombre,$s->script,"script_tmp",$d);	
		else if($s->ventor==$this->session->userdata('id'))
			return $this->print_script($s->ventor,$s->nombre,$s->script,"script_tmp",$d);
		else if(strlen($s->publico)>0)
				{
					if(str_replace(','.$this->session->userdata('id').',','',$s->publico)!=$s->publico)
						return $this->print_script($s->ventor,$s->nombre,$s->script,"script_tmp",$d);
				}
		show_404();
	}
	private function print_script($i,$t,$s,$f="script_tmp",$p=FALSE)
	{
		$t=$t==""?"script_tmp":$t;
		$f=$f==""?$t:$f;

		$d['titulo']=$t;
		$d['id_script']=$i;
		echo @$this->load->view('template/head',$d,TRUE);
		echo '<script src="http://123seller.azurewebsites.net/assets/js/form.js"></script>';
		$file = fopen("application/views/scripts/$f.php", "w");
		fwrite($file, $s. PHP_EOL);
		fclose($file);
		echo @$this->load->view("scripts/$f",$p,TRUE);
		echo '<div id="popup_seller"></div>';	
 		echo @$this->load->view('template/footer',$d,TRUE);
	}
	private function make_input($in_)
	{
		$in_=explode("%=%",$in_);
		$out=array();
		for($t=0;$t<count($in_)-1;$t++)
		{$out[$in_[$t]]=$in_[++$t];}
		return $out;
	}

	private function get($nombre="Vender a través de Seller online")
	{		
		$inputs=array();
		$in=array('nombre',$nombre);
		$i=0;
		$r=0;
		$read=true;
		do
		{
			if($in[0]=='inputs')
				$inputs['inputs'][$r++]=$this->make_input($in[1]);			
			else $inputs[$in[0]]=$in[1];
			$in= explode("%::%",$this->input->post('seller_input_'.$i++));
			$read=count($in)>1;
		}while ($read);
		return $inputs;				
	}
	public function d($id)
	{		
		if($this->session->userdata('nivel')==0)
			redirect(base_url());
		$v=$this->session->userdata('id');
		$r=$this->scripts->get(array('ventor'=>$v,'id'=>$id));
		$this->scripts->delete(array('ventor'=>$v,'id'=>$id));
		echo $r!=FALSE?"OK, $r->nombre, ha sido borrado":"Error, item no encontrado";
	}
	public function activate($n)
	{
		if($this->session->userdata('nivel')==0)
			redirect(base_url());

		$v=$this->session->userdata('id');
		$r=$this->scripts->get(array('ventor'=>$v,'id'=>$n));
		if($r==FALSE) return show_404();
		$earn=$this->session->userdata('earn');
		$precio = $this->input->post('Precio');
		$comision = $this->input->post('Comision');
		$nombre = $this->input->post('Nombre');

		$out=($comision/100)*$precio;	

		if(($earn-$out)<0)
			return $this->a('Ups');

		$this->load->model('Ventors_model','ventor');
		$v=$this->ventor->get($v);
		$this->ventor->update(array('pagado'=>$v->pagado+$out),$v->id);
		$this->load->model('Anuncios_model','anuncios');
		$anuncio['url']=base_url()."maker/a/$r->id";
		$anuncio['nombre']=$this->session->userdata('nombres');
		$anuncio['nombre'].=" ".$this->session->userdata('apellidos');
		$anuncio['nombre'].=": ".$nombre;
		$anuncio['comision']=$comision;
		$anuncio['venta']=$precio;
		$this->anuncios->insert($anuncio);	

		redirect(base_url()."maker/me");
	}
	public function s($id)
	{		
		if($this->session->userdata('nivel')==0)
			redirect(base_url());
		$v=$this->session->userdata('id');
		$r=$this->scripts->get(array('ventor'=>$v,'id'=>$id));

		$out['earn']=$this->session->userdata('earn');
		$out['url']=base_url()."maker/a/$r->nombre";
		$out['nombre']=$r->nombre;
		$out['id_public']=$r->id;
		$out['script_footer']="";
		$this->a('publicar',$out);
	}
	public function reponderDuda($id)
	{		
		if($this->session->userdata('nivel')=='')
			redirect(base_url());
		$out['pregunta']=" -pregunta $id";
		$out['id_pregunta']=$id;
		$this->a(44,$out);
	}
	public function e($id)
	{		
		if($this->session->userdata('nivel')==0)
			redirect(base_url());

		$v=$this->session->userdata('id');
		$s=$this->scripts->get(array('ventor'=>$v,'id'=>$id));
		if($s==FALSE) return show_404();

		$s_raw=$s->script;
		$s_raw=explode(";",$s->script);
		$out;
		$out['campos']="";
		foreach ($s_raw as $k => $v ) 
		{
			if(str_replace('add_input','',$v)==$v)
				continue;

			$v=str_replace("add_input('", '', $v);
			$v=str_replace("')", '', $v);
			$v=explode("','",$v);
			if("inputs"==$v[0])
				{
					$v[1]=str_replace("titulo%=%","",$v[1]);
					$v[1]=str_replace("nombre%=%","",$v[1]);
					$v[1]=str_replace("valor%=%","",$v[1]);
					$v[1]=str_replace("tipo%=%","",$v[1]);
					$v[1]=str_replace("%=%",",",$v[1]);
					$out['campos'].=$v[1];
					continue;
				}else $out[$v[0]]=$v[1];
		}
		$out['id_edit']=$id;
		$this->a(19,$out);
	}
}
