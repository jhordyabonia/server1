<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vl extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		
		$this->load->model('pu/Usuario_model','usuario');
		$data['usuario']=array();
	}

	public function singin()
	{
		$tmp['celular'] = $this->input->post('celular');
		$tmp['password'] = md5($this->input->post('password'));	
		
		$this->data['usuario']=$this->usuario->get($tmp);	
		
		if($this->data['usuario']==FALSE)
		 {echo "Datos incorrectos!";return;};
		
		echo json_encode($this->data);
	}
	public function registrar()
	{
		$usuario['nombre'] = $this->input->post('nombre');
		$usuario['password'] = md5($this->input->post('password'));
		$usuario['celular'] = $this->input->post('celular');
		$usuario['correo'] = $this->input->post('correo');
		$usuario['universidad'] = 0;
		echo 0<$this->usuario->insert($usuario)?"Registro Exitoso!":"Error de registro";
	}
	public function editar()
	{
		$id = $this->input->post('id');
		$usuario['nombre'] = $this->input->post('nombre');
		$usuario['password'] = $this->input->post('password');
		$usuario['celular'] = $this->input->post('celular');
		$usuario['correo'] = $this->input->post('correo');
		$usuario['universidad'] =0;
		
		$_usuario= array();
		foreach($usuario as $key=>$u)
			if($u!=null)
				$_usuario[$key]=$u;
		if($usuario['password']!=null)
			$_usuario['password'] = md5($usuario['password']);
		
		echo 0<$this->usuario->update($_usuario,$id)?"Actualizacion Exitosa!":"";
	}
	public function transmitiendo()
	{
		$user = $this->input->post('usuario');
		$d=scandir("./uploads/videos/");
		$t=array();
		foreach($d as $k=>$f)
		{
			if($k<2)continue;    

			$ff=str_replace(".mp4","",$f);
			if($ff==$user)continue;
			$u=$this->usuario->get(array('celular'=>$ff));
			if($u!=false)
			{
				unset($obj);
				$obj->url=$f;
				$obj->nombre=$u->nombre;
				$t[]=$obj;
			}
		}
		
		echo json_encode($t);
	}
	public function video($f)
	{
		redirect("http://123seller.azurewebsites.net/uploads/videos/".$f);
	}
	public function remove()
	{
		$out;
		$v=$this->input->post('video');
		system('del  "uploads\\videos\\'.$v.'" /q',$out);
		echo 0==$out?"delete":"no delete";
		#echo 1;#$v;
	} 
	public function upload()
	{
		$target_path = "./uploads/videos/";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
		
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
			echo "The file ". $target_path." has been uploaded";
		else
			echo "There was an error uploading the file, please try again!";
	}
	
}
