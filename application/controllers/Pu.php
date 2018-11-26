<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pu extends CI_Controller {
	var $empty="Para más opciones de búsqueda, vea Ayuda:Búsqueda.";
	var $data= array(
		'horarios'=>array(),
		'alertas'=>array(),
		'apuntes'=>array(),
		'lecturas'=>array(),
		'calificables'=>array()
	);
	function __construct()
	{
		parent::__construct();	
		
		$this->load->model('pu/Universidad_model','universidad');
		$this->load->model('pu/Usuario_model','usuario');
		$this->load->model('pu/Asignatura_model','asignatura');
		$this->load->model('pu/Horario_model','horario');
		$this->load->model('pu/Alerta_model','alerta');
		$this->load->model('pu/Apunte_model','apunte');
		$this->load->model('pu/Lectura_model','lectura');
		$this->load->model('pu/Calificable_model','calificable');
	}
	public function index()
	{	redirect("https://drive.google.com/file/d/0Bw7-14BZUCcvTThrMkZWbmlNVGM/view?usp=sharing");	}
	public function delete()
	{
		for($x=0;$x<72;$x++)
			$this->asignatura->delete($x);
		echo "delete $x<br>";

		$this->universidad->insert(array('nombre'=>"Academic Glider"));
		$this->universidad->insert(array('nombre'=>"Universidad del Valle"));
		$this->universidad->insert(array('nombre'=>"Universidad Autonoma de Occidente"));
		$this->universidad->insert(array('nombre'=>"Universidad Icesi"));
		$this->universidad->insert(array('nombre'=>"Universidad Javeriana"));

		$this->usuario->insert(array('nombre'=>"Academic Glider",'correo'=>"jeigl7@gmail.com",'celular'=>3158241412,'password'=>md5("123456")));
	}
	public function scrapp()
	{ $this->leer_archivos_y_directorios();	}
	private function leer_archivos_y_directorios($ruta="./uploads/")
	{		
		if (is_dir($ruta))
		{
			if ($aux = opendir($ruta))
				{
					while (($archivo = readdir($aux)) !== false)
						if ($archivo!="." && $archivo!="..")
						{
							$ruta_completa = $ruta . '/' . $archivo;
							if (is_dir($ruta_completa))
							{
								echo "<br>Directorio: $ruta_completa";
								$this->leer_archivos_y_directorios($ruta_completa . "/");
							}else $this->scrapp_select($archivo);
						}
					closedir($aux);
				}
		}
	}
	private function scrapp_select($file)
	{		
		if(str_replace('horario','',$file)!=$file)
			$this->scrapp_horario($file);
		else if(str_replace('asignatura','',$file)!=$file)
			$this->scrapp_asignaturas($file);
	}
	private function scrapp_asignaturas($file)
	{ 
	  echo "<br>$file";
	  $asignatura= file_get_contents("./uploads/$file",true);		
      $asignatura= json_decode($asignatura);
	  
	  foreach($asignatura as $a)
	  	if(false==$this->asignatura->get(array('codigo'=>$a->codigo)))
		  {
			$a->usuario=1;
			$a->publico=1;
			$a->nota="Universidad del Valle";
	  		echo $this->asignatura->insert($a)."<br>";
		  }
	}
	private function scrapp_horario($file)
	{
	  echo "<br>$file";
      $horario= file_get_contents("./uploads/$file",true);		
      $horario= json_decode($horario);
	  $grupo=0;
	  $codigo=0;
	  $nuevo=false;
	  foreach($horario as $h)
	  {
		  if($codigo==$h->asignatura)
		  	$nuevo=$grupo!=$h->grupo;
		  else $nuevo=false;
		  $grupo=$h->grupo;
		  $codigo=$h->asignatura;
		  $get['codigo']=$codigo;
		  $get['nombre LIKE']="%Grupo ".$grupo;
		  $a=$this->asignatura->get($get);
		  
		  if($a==false)
		  {
			$a=$this->asignatura->get(array('codigo'=>$codigo));
			if($nuevo)
			{
				$a->nombre.=" Grupo $grupo";
				$a->id=null;
				$id=$this->asignatura->insert($a);
				echo "<b> nueva</b> $id";
			}else $id=$a->id;
		  }else $id=$a->id;

		  if(!$id)continue;

		  echo "<br>".$this->horario->insert(
			  array('asignatura'=>$id,
					'dia'=>$h->dia,
					'hora'=>$h->hora,
					'duracion'=>$h->duracion,
					'ubicacion'=>$h->ubicacion)
				);
	  }
	}
     
	public function fecha()
	{echo date("Y\-m\-d h:i:s");}
	public function feedback()
	{
		$this->load->model('pu/Feedback_model','feedback');	
		$feedback['mensaje']=$this->input->post('mensaje');
		$feedback['usuario']=$this->input->post('id');
		echo 0<$this->feedback->insert($feedback)?"Mensaje enviado al desarrollador":"Error enviando mensaje";
	}
	public function chat($action="get")
	{
		$this->load->model('pu/Chat_model','chat');
		$this->load->model('pu/Mensaje_model','mensaje');

		$chat['usuario']=$this->input->post('usuario');
		if($action=="add")
		{
			$chat['nombre']=$this->input->post('nombre');
			$chat['tipo']=$this->input->post('tipo');
			$chat['descripcion']=$this->input->post('descripcion');
			$u2="";
			$e=false;
			if($chat['tipo']!=0)
			{
				$u2=$this->input->post('usuario2');
				$u1=$chat['usuario'];
				$chat['usuario']=$u2;
				$e=$this->chat->get(array('nombre'=>$chat['nombre']));
			}
			if($e==false)
			 	$id=$this->chat->insert($chat);
			else $id=$e->id;

			if(0<$id)
			{
				if($chat['tipo']==0)
				{
					$msj=array('chat'=>$id,'usuario'=>$chat['usuario'],'tipo'=>'mensaje','dato'=>'Grupo iniciado');				
				}else
				{
					$msj2=array('chat'=>$id,'usuario'=>$u2,'tipo'=>'inicio','dato'=>'Inicio chat');
					$this->mensaje->insert($msj2);

					$msj=array('chat'=>$id,'usuario'=>$u1,'tipo'=>'inicio','dato'=>'Inicio chat');
				}
				
				$msj=$this->mensaje->insert($msj);
				$msj=$this->mensaje->get($msj);
				$out=$this->chat->get($id);
				$out->mensajes=$this->mensaje->get_all(array('chat'=>$id));
				$out->fecha=$msj->fecha;
				echo json_encode($out);
			}else echo json_encode($chat);//"Error agregando chat";
		}else if($action=="get")
		{
			$chat['estado <>']="-1";
			//$chat['id >']=$last_msj;
			$mensajes=$this->mensaje->get_all($chat);
			$tmp_ids=array();
			foreach($mensajes as $mensaje)
				$tmp_ids[$mensaje->chat]=$mensaje->fecha;
			$out=array();
			$last_msj=$this->input->post('last_msj');
			if($last_msj!="0")
				foreach($tmp_ids as $k=>$v)
				{
					$msj_=array('id >'=>$last_msj,'estado'=>"0",'chat'=>$k,'usuario <>'=>$chat['usuario']);
					$t=$this->chat->get($k);
					$t->mensajes=$this->mensaje->get_all($msj_);
					$t->fecha=$v;
					$out[]=$t;
					if($t->tipo!=0)
						$this->mensaje->update(array('estado'=>1),$msj_);
				}	
			$out[]=$this->update($chat['usuario']);
			echo json_encode($out);
		}else if($action=="delete")
		{
			$chat_['chat']=$this->input->post('chat');
			$cel=$this->input->post('celular');
			$chat_['usuario']=$this->usuario->get(array('celular'=>$cel))->id;
			$id=$this->mensaje->update(array('estado'=>-1),$chat_);
			if(0<$id)
			{
				$msj2=array('chat'=>$chat_['chat'],
				'usuario'=>$chat_['usuario'],
				'tipo'=>'salir','dato'=>"$cel salío del grupo");
				$rt=$this->mensaje->insert($msj2);
				$out=$this->chat->get($chat_['chat']);
				$out->mensajes=$this->mensaje->get_all(array('id'=>$rt));
				$out->fecha=$out->mensajes[0]->fecha;
				echo json_encode($out);
			}else echo "Error en Actualizacion::0";
		}
	}
	public function update($usuario,$print=false){
		$this->load->model('pu/Mensaje_model','mensaje');
		$out=(Object)array('id'=>-1,'nombre'=>"",'descripcion'=>"",'tipo'=>"","mensajes"=>[]);
		$out->fecha=date("Y\-m\-d h:i:s");	

		$out->mensajes=$this->mensaje->get_all(array('chat'=>-$usuario));
		if($out->mensajes)
			foreach($out->mensajes as $k=>$message){
				if(is_int($message->dato)){
					$result=$this->output_("get",$message->tipo,array('id'=>$message->dato),false);
					$out->mensajes[$k]->dato=$result->data;	
				}
			}
		$this->mensaje->delete(array('chat'=>-$usuario));	
		if($print)
			echo json_encode($out);
		return $out;
	}
	public function chat_edit()
	{
		$this->load->model('pu/Chat_model','chat');
		$this->load->model('pu/Mensaje_model','mensaje');
		$id=$this->input->post('chat');
		$u=$this->input->post('usuario');
		$chat['nombre']=$this->input->post('nombre');
		$chat['descripcion']=$this->input->post('descripcion');
		$old= $this->chat->get($id);
		$edited=$this->chat->update($chat,$id);
		if($edited>=0)
		{
			$dato="Datos del grupo, cambiados\n";
			$dato.="Nombre anterior: ".$old->nombre."\n";
			$dato.="Descripcion anterior: ".$old->descripcion."\n";
			$dato.="Nuevo nombre: ".$chat['nombre']."\n";
			$dato.="Nueva descripcion: ".$chat['descripcion'];
			$msj=array('chat'=>$id,'usuario'=>$u,'tipo'=>'edicion','dato'=>$dato);
			$this->mensaje->insert($msj);
			echo "Chat editado!";
		}else echo "Error durante edicion!";
	}
	public function mensaje($action="get")
	{		
		$this->load->model('pu/Mensaje_model','mensaje');
		if($action=="read")
		{			
			$mensaje=array('usuario <>'=>$this->input->post('usuario'),
						'chat'=>$this->input->post('chat'),'estado'=>0);
			$this->mensaje->update(array('estado'=>2),$mensaje);
			return;
		}else if($action=="add_group")
		{
			$chat=$this->input->post('chat');
			$tipo="inicio";
			$usuario=$this->input->post('usuario');
			$usuarios=$this->input->post('usuarios');
			foreach(split(",",$usuarios) as $u)
			{
				$cel=$this->clean($u);
				$uu=$this->usuario->get(array('celular'=>$cel));
				if($uu==false)
					continue;
				$get=array('chat'=>$chat,'usuario'=>$uu->id,'estado <>'=>-1);
				if($this->mensaje->get($get)!=false)
					continue;
				$this->mensaje->insert(
					array(
						'chat'=>$chat,
						'tipo'=>'inicio',
						'usuario'=>$uu->id,
						'dato'=>"$cel fue agregado"));
			}
		}
		
		$mensaje['chat']=$this->input->post('chat');
		$mensaje['tipo']=$this->input->post('tipo');
		$mensaje['usuario']=$this->input->post('usuario');
		$mensaje['dato']=$this->input->post('dato');
	
		$get=array('chat'=>$mensaje['chat'],'usuario'=>$mensaje['usuario'],'estado <>'=>-1);
		if($this->mensaje->get($get)==false)
		{
			echo "No puedes enviar mensajes a este chat";
			return;
		}
		$id=$this->mensaje->insert($mensaje);
		echo 0<$id?json_encode($this->mensaje->get($id)):"";
	}
	public function contactos()
	{
		$contactos=json_decode($this->input->post('contactos'));
		$out=array();
		foreach($contactos as $key=>$contacto)
		{
			$cel=$this->clean($contacto->cel);
			$u=$this->usuario->get(array('celular'=>$cel));
			if($u!=false)
			{
				$contactos[$key]->cel_=$cel;
				$contactos[$key]->id=$u->id;
				$out[]=$contactos[$key];
			}
		}
		echo json_encode($out);
	}
	public function integrantes()
	{
		$this->load->model('pu/Mensaje_model','mensaje');
		$chat=$this->input->post('chat');
		$integrantes=$this->mensaje->get_all(array('chat'=>$chat,'tipo'=>'inicio', 'estado !='=>-1));
		$integrantes_=array();
		foreach($integrantes as $key=>$value)
		{
			$integrantes_[$value->usuario]=$this->usuario->get($value->usuario);
			$integrantes_[$value->usuario]->password="";
			$integrantes_[$value->usuario]->fecha=$value->fecha;
		}

		$out->integrantes=array();
		foreach($integrantes_ as $value)
			$out->integrantes[]=$value;

		$out->asignaturas=$this->mensaje->get_all(array('chat'=>$chat,'tipo'=>'asignatura'));
		if(!is_array($out->asignaturas))
			$out->asignaturas=array();
		$out->solicitudes=$this->mensaje->get_all(array('chat'=>$chat,'tipo'=>'solicitud'));
		if(!is_array($out->solicitudes))
			$out->solicitudes=array();

		echo json_encode($out);
	}
	private function clean($data)
	{
		$data=str_replace(" ","",$data);
		$data=str_replace("(","",$data);
		$data=str_replace(")","",$data);
		$data=str_replace("-","",$data);
		$data=str_replace("+","",$data);
		$data=substr($data,strlen($data)-10,strlen($data));
		return $data;
	}
	public function upload()
	{
		$target_path = "./uploads/fotos/";
	 
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
		
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
		{
			echo "The file ". basename( $_FILES['uploadedfile']['name']).
			" has been uploaded";
		} else
		{
			echo "There was an error uploading the file, please try again!";
		}
	}
	public function actualizar()
	{
		$usuario = $this->input->post('usuario');
		$de = $this->input->post('de'); 
		$a = $this->input->post('a');
		$this->descargar($usuario,$de,$a);
	}
	public function descargar($usuario=null,$id_a_descargar=null,$id=null)
	{		
		if($id_a_descargar==null)
			$id_a_descargar = $this->input->post('asignatura');

		if($usuario==null)
		{
			$usuario = $this->input->post('usuario');

			$descarga=$this->usuario->get($usuario)->descarga==0;
			if($descarga)
			{
				$out=array(
					'asignaturas'=>array(),
					'menssage'=>"Ahora debes compartir alguna asignatura que hallas creado.\nLuego solo la eliminas si no la usas."
				);
				$out=(Object)array_merge($out,$this->data);
				echo json_encode($out);
				return;
			}
		}
		#Extraccion de datos
		$this->query('horario',$id_a_descargar,'horarios');
		$this->query('alerta',$id_a_descargar,'alertas');
		$this->query('apunte',$id_a_descargar,'apuntes');
		$this->query('lectura',$id_a_descargar,'lecturas');
		$this->query('calificable',$id_a_descargar,'calificables');

		if($id==null)
		{
			#Cambio de ids y reinsertsion 
			$asignatura=$this->asignatura->get($id_a_descargar);
			if(false!=$this->asignatura->get(array('nombre'=>$asignatura->nombre,'usuario'=>$usuario,'publico'=>0)))
			{
				$out=array(
					'asignaturas'=>array($asignatura),
					'menssage'=>$asignatura->nombre." Ya se encuentra en tu tabulado"
				);
				$out=(Object)array_merge($out,$this->data);
				echo json_encode($out);
				return; 
			}
			$asignatura->id=null;
			$asignatura->publico=0;
			$asignatura->nota="";
			$asignatura->usuario=$usuario;
			$id=$this->asignatura->insert((Array)$asignatura);

			$asignatura->imagen = $this->findImg($asignatura->nombre);
			$asignatura->descripcion=$this->getDescripcion($id);
			if($asignatura->descripcion=="")
				$asignatura->descripcion=$this->findText($asignatura->nombre);
		}

		foreach($this->data['horarios'] as $index => $data)
		{
			$this->data['horarios'][$index]->id=null;
			$this->data['horarios'][$index]->asignatura=$id;	
			$this->data['horarios'][$index]->id=
				$this->horario->insert((Array)$this->data['horarios'][$index]);		

		}
		foreach($this->data['alertas'] as $index => $data)
		{
			$this->data['alertas'][$index]->id=null;
			$this->data['alertas'][$index]->asignatura=$id;			
			$this->data['alertas'][$index]->id=
				$this->alerta->insert((Array)$this->data['alertas'][$index]);			
		}
		foreach($this->data['apuntes'] as $index => $data)
		{
			$this->data['apuntes'][$index]->id=null;
			$this->data['apuntes'][$index]->asignatura=$id;	
			$this->data['apuntes'][$index]->id=
				$this->apunte->insert((Array)$this->data['apuntes'][$index]);	
		}		
		foreach($this->data['lecturas'] as $index => $data)
		{
			$this->data['lecturas'][$index]->id=null;
			$this->data['lecturas'][$index]->asignatura=$id;	
			$this->data['lecturas'][$index]->id=
				$this->lectura->insert((Array)$this->data['lecturas'][$index]);	
		}	
		foreach($this->data['calificables'] as $index => $data)
		{
			$this->data['calificables'][$index]->id=null;
			$this->data['calificables'][$index]->asignatura=$id;	
			$this->data['calificables'][$index]->id=
				$this->calificable->insert((Array)$this->data['calificables'][$index]);
		}			
		$asignatura->id=$id;
		$message="";
		if($id_a_descargar==null)
			$message="Asignatura agregada al tabulado";		
		else $message="Asignatura actulizada";

		$out=array(
			'asignaturas'=>array($asignatura),
			'menssage'=>$message
		);
		$out=(Object)array_merge($out,$this->data);
		echo json_encode($out);		
	}
	public function compartir()
	{		
		$id_a_compartir = $this->input->post('compartir');
		$compartir['horarios'] = $this->input->post('horarios');
		$compartir['apuntes'] = $this->input->post('apuntes');
		$compartir['lecturas'] = $this->input->post('lecturas');
		$compartir['calificables'] = $this->input->post('calificables');
		$compartir['alertas'] = $this->input->post('alertas');
		$compartir_con = $this->input->post('compartir_con');
		
		$publico=1;
		if($compartir_con!=null)
			$publico=2; 

		#Extraccion de datos
		if($compartir['horarios']==="true")
			$this->query('horario',$id_a_compartir,'horarios');
		if($compartir['alertas']==="true")
			$this->query('alerta',$id_a_compartir,'alertas');
		if($compartir['apuntes']==="true")
			$this->query('apunte',$id_a_compartir,'apuntes');
		if($compartir['lecturas']==="true")
			$this->query('lectura',$id_a_compartir,'lecturas');
		if($compartir['calificables']==="true")
			$this->query('calificable',$id_a_compartir,'calificables');

		#Cambio de ids hacer publico/enviar a y reinsertsion 
		$asignatura=$this->asignatura->get($id_a_compartir);
		$asignatura->id=null;
		$u=$this->usuario->get($asignatura->usuario);
		$asignatura->nota=$this->universidad->get($u->universidad)->nombre;
		$asignatura->publico=$publico;
		$id=$this->asignatura->insert((Array)$asignatura);

		foreach($this->data['horarios'] as $index => $data)
		{
			$this->data['horarios'][$index]->id=null;
			$this->data['horarios'][$index]->asignatura=$id;	
			$this->horario->insert((Array)$this->data['horarios'][$index]);		
		}
		foreach($this->data['alertas'] as $index => $data)
		{
			$this->data['alertas'][$index]->id=null;
			$this->data['alertas'][$index]->asignatura=$id;	
			$this->data['alertas'][$index]->alerta=0;
			$this->alerta->insert((Array)$this->data['alertas'][$index]);			
		}
		foreach($this->data['apuntes'] as $index => $data)
		{
			$this->data['apuntes'][$index]->id=null;
			$this->data['apuntes'][$index]->asignatura=$id;	
			$this->apunte->insert((Array)$this->data['apuntes'][$index]);	
		}		
		foreach($this->data['lecturas'] as $index => $data)
		{
			$this->data['lecturas'][$index]->id=null;
			$this->data['lecturas'][$index]->asignatura=$id;	
			$this->lectura->insert((Array)$this->data['lecturas'][$index]);	
		}	
		foreach($this->data['calificables'] as $index => $data)
		{
			$this->data['calificables'][$index]->id=null;
			$this->data['calificables'][$index]->nota="";
			$this->data['calificables'][$index]->asignatura=$id;	
			$this->calificable->insert((Array)$this->data['calificables'][$index]);
		}			
		if($compartir_con!=null)
		{
			$mensaje=array(
							'chat'=>$compartir_con,
							'tipo'=>'asignatura',
							'usuario'=>$u->id,
							'dato'=>json_encode($this->asignatura->get($id))
						);
			$this->load->model('pu/Mensaje_model','mensaje');
			$id=$this->mensaje->insert((Array)$mensaje);
			echo json_encode($this->mensaje->get($id)); 
		}
		else
			echo "Contenido compartido con exito, en la comunidad Glider";				
	}
	public function universidad()
	{
		$universidades=$this->universidad->get_all(array('verificada'=>1));
		
		echo "Universidad,";
		if($universidades!=false)
			foreach($universidades as $u )
				echo $u->nombre.",";
		echo "Otra";
	}
	public function foto($foto)
	{	redirect(base_url()."uploads/fotos/".$foto);	}
	public function registrar()
	{
		$usuario['nombre'] = $this->input->post('nombre');
		$usuario['password'] = md5($this->input->post('password'));
		$usuario['celular'] = $this->input->post('celular');
		$usuario['correo'] = $this->input->post('correo');
		
		$u=$this->input->post('universidad');
		$usuario['universidad'] = $this->universidad->get(array('nombre'=>$u));
		if($usuario['universidad']==false)
			$usuario['universidad'] = $this->universidad->insert(array('nombre'=>$u));
		else 
			$usuario['universidad'] = $usuario['universidad']->id;

		$id=$this->usuario->insert($usuario);
		$menssage = 0<$id?"Registro Exitoso!":"Error de registro";
		$usuario['id']=$id;
		$output=(Object)array('menssage'=>$menssage,'data'=>$usuario,'action'=>__METHOD__);
		echo json_encode($output);
	}
	public function editar()
	{
		$id = $this->input->post('id');
		$usuario['nombre'] = $this->input->post('nombre');
		$usuario['password'] = $this->input->post('password');
		$usuario['celular'] = $this->input->post('celular');
		$usuario['correo'] = $this->input->post('correo');
		$u=$this->input->post('universidad');
		$usuario['universidad'] =$this->universidad->get(array('nombre'=>$u))->id;
		
		$_usuario= array();
		foreach($usuario as $key=>$u)
			if($u!=null)
				$_usuario[$key]=$u;
		if($usuario['password']!=null)
			$_usuario['password'] = md5($usuario['password']);
		
		$menssage = 0<$this->usuario->update($_usuario,$id)?"Actualizacion Exitosa!":"Error durante actualizacion";

		$data=$this->usuario->get($id);
		if($data)
			$data->universidad=$this->universidad->get($data->universidad)->nombre;
		$output=(Object)array('menssage'=>$menssage,'data'=>$data,'action'=>__METHOD__);
		echo json_encode($output);
	}
	public function asignaturas($action="add")
	{		
		$asignatura['usuario'] = $this->input->post('usuario');
		$asignatura['nombre'] = $this->input->post('nombre');
		$asignatura['id'] = $this->input->post('id');
		$asignatura['codigo'] = $this->input->post('codigo');
		$asignatura['creditos'] = $this->input->post('creditos');
		$asignatura['nota'] = $this->input->post('nota');
		echo $this->output_($action,'asignatura',$asignatura);
		/*
		if($action==="edit") echo 0<($this->asignatura->update($asignatura,$id))?"Asignatura Actualizada::0":"Error en Actualizacion::0";
		else 
		{  $id=$this->asignatura->insert($asignatura);
			echo 0<$id?"Registro Exitoso::$id":"Error de Registro::0";
		}*/
	}
	public function alertas($action="add")
	{
		$alerta['id'] = $this->input->post('id');
		$alerta['nombre'] = $this->input->post('nombre');
		$alerta['fecha'] = $this->input->post('fecha');
		$alerta['hora'] = $this->input->post('hora');
		$alerta['alerta'] =  $action=="add"?1:$this->input->post('alerta');
		$alerta['asignatura'] =$this->input->post('asignatura');
		echo $this->output_($action,'alerta',$alerta);
		#if($action==="edit") echo 0<($this->alerta->update($alerta,$id))?"Alerta Actualizada::0":"Error en Actualizacion::0";
		#else echo 0<($this->alerta->insert($alerta))?"Alerta Registrada::0":"Error de Registro::0";
	}
	public function apuntes($action="add")
	{
		$apunte['asignatura'] = $this->input->post('asignatura');
		$apunte['nombre'] = $this->input->post('nombre');
		$apunte['id'] = $this->input->post('id');
		$apunte['apunte'] = $this->input->post('apunte');
		$apunte['fecha'] = $this->input->post('fecha');
		$apunte['descripcion'] = $this->input->post('descripcion');
		echo $this->output_($action,'apunte',$apunte);
		#if($action==="edit") echo 0<($this->apunte->update($apunte,$id))?"Apunte Actualizado::0":"Error en Actualizacion::0";
		#else echo 0<($this->apunte->insert($apunte))?"Apuntes Guardados::0":"Error de Registro::0";
	}
	public function lecturas($action="add")
	{
		$lectura['asignatura'] = $this->input->post('asignatura');
		$lectura['nombre'] = $this->input->post('nombre');		
		$lectura['id'] = $this->input->post('id');
		$lectura['descripcion'] = $this->input->post('descripcion');
		echo $this->output_($action,'lectura',$lectura);
		#if($action==="edit") echo 0<($this->lectura->update($lectura,$id))?"Lectura Actualizada::0":"Error en Actualizacion::0";
		#else echo 0<($this->lectura->insert($lectura))?"lectura Registrada::0":"Error de Registro::0";
	}
	public function calificables($action="add")
	{	
		$calificable['asignatura'] = $this->input->post('asignatura');
		$calificable['nombre'] = $this->input->post('nombre');		
		$calificable['id'] = $this->input->post('id');
		$calificable['fecha'] = $this->input->post('fecha');
		$calificable['nota'] = $this->input->post('nota');
		$calificable['porcentaje'] = $this->input->post('porcentaje');
		$calificable['descripcion'] = $this->input->post('descripcion');

		echo $this->output_($action,'calificable',$calificable);
		#if($action==="edit")  echo 0<($this->calificable->update($calificable,$id))?"Calificable Actualizado::0":"Error en Actualizacion::0";
		#else echo 0<($this->calificable->insert($calificable))?"Calificable Registrado::0":"Error de Registro::0";
	}
	public function horarios($action="add")
	{
		$horario['id'] = $this->input->post('id');
		$horario['asignatura'] = $this->input->post('asignatura');
		$horario['dia'] = $this->input->post('dia');
		$horario['hora'] = $this->input->post('hora');
		$horario['ubicacion'] = $this->input->post('ubicacion');
		$horario['duracion'] = $this->input->post('duracion');
		echo $this->output_($action,'horario',$horario);		
		
		#if($action==="edit") echo 0<($this->horario->update($horario,$id))?"Horario Actualizado::0":"Error en Actualizacion::0";
		#else echo 0<($this->horario->insert($horario))?"Horario Registrado::0":"Error de Registro::0";
	}
	private function output_($action,$table,$data,$encode=true)
	{
		$out;$menssage="";
		
		if(substr($action,-1)==="s")
			$action=substr($action,0,-1);
		if(substr($table,-1)==="s")
			$table=substr($table,0,-1);

		if($action==="get"){	
			$data=(Array)$this->$table->get($data['id']);
		}else if($action==="delete"){	
			$out=$this->$table->delete($data['id']);
			$out=$this->$table->get($data['id']);
			if(!$out)$out=$data['id'];
			$menssage=0<$out?"$table Eliminado":"Error al eliminar";
		}else if($action==="edit"){
			$out=$this->$table->update($data,$data['id']);
			$menssage=0<$out?"$table actualizado":"Error en actualizacion";
		}else if($action==="alerta"){
			$menssage="Alarma ".($data['alerta']==1?"activada":"desactivada");
			$out=$this->alerta->update(array('alerta'=>$data['alerta']),$data['id']);
			$menssage=0<$out?$menssage:"Error al establecer alarma";
		}else{
			//unset($data['alerta']);
			$out=$this->$table->insert($data);
			$menssage=0<$out?"$table regsitrado":"Error en registro";	
			$data['id']=$out;
		}	
		if($table==="asignatura")if($action!="delete"){
			$data['imagen']=$this->findImg($data['nombre']);
			$data['descripcion']=$this->findText($data['nombre']);
			if($data['descripcion']==$this->empty)
				$data['descripcion']="";
		}
		//*/ $menssage="$action ,$table,".json_encode($data);
		$output=(Object)array('menssage'=>$menssage,'data'=>$data,'action'=>$action);

		$this->output->set_content_type('application/json');
		if($encode)
			return json_encode($output);
		else return $output;
	}
	private function query($tabla,$asignatura,$callback)
	{
		$data_tabla=$this->$tabla->get_all(array('asignatura'=>$asignatura));
		if($data_tabla)
			foreach($data_tabla as $value)
				$this->data[$callback][]=$value;
	}	
	public function getAll($encrypt="encrypt")
	{		
		$a_buscar=null;
		$publico= $this->input->post('publico');
		$tmp['celular'] = $this->input->post('celular');
		if($encrypt=="no_encrypt")		
			$tmp['password'] = $this->input->post('password');	
		else $tmp['password'] = md5($this->input->post('password'));	
		$this->data['usuario']=$this->usuario->get($tmp);	
		if($this->data['usuario']==FALSE)
		 {echo "Datos incorrectos!";return;};
		$u=$this->data['usuario']->universidad;
		$this->data['usuario']->universidad =
				$this->universidad->get($u)->nombre;
		if($publico==0)
			$query=array("usuario"=>$this->data['usuario']->id,'publico'=>0);
		else 
		{
			$a_buscar=$this->input->post('a_buscar');
			if($a_buscar!=null)
				$query=array('nombre LIKE'=>"%".$a_buscar."%",'publico'=>1);
			else $query=array('publico'=>1);
			
			$universidad=$this->input->post('universidad');
			if($universidad!=null&&$universidad!="Todas")
				$query['nota']=$universidad;			
		}
		$page=intval($this->input->post('page'));
		
		$all=$this->asignatura->get_all($query);
		$count_tmp=count($all)/100;
		if($count_tmp!=intval($count_tmp))
			$count_tmp=intval($count_tmp+1);

		if($page>=$count_tmp)
			$page-=1;

		if($all!=false)
			$query['id >=']=$all[($page*100)]->id;
		$this->data['pager']=(Object)array('data'=>0,'before'=>0,'after'=>0,'a_buscar'=>0);
		$this->data['pager']->data=($page+1)."/".$count_tmp;
		$this->data['pager']->before=($page<=0)?0:abs($page-1);
		$this->data['pager']->after=$page+1;
		$this->data['pager']->a_buscar=$a_buscar!=null?$a_buscar:"";	
		
		$this->data['asignaturas']=$this->asignatura->get_all($query,100);
		if($this->data['asignaturas']!=false){
            foreach($this->data['asignaturas'] as $asignatura)
            {
                if($publico==1)
                {
                    $u=$this->usuario->get($asignatura->usuario);
                    $asignatura->usuario=$u->nombre;
                }else{   
					$asignatura->imagen=$this->findImg($asignatura->nombre);
					
					$asignatura->descripcion=$this->getDescripcion($asignatura->id);
					if($asignatura->descripcion=="")
						$asignatura->descripcion=$this->findText($asignatura->nombre);
					if($asignatura->descripcion==$this->empty)
						$asignatura->descripcion="";
                }
                $this->query('horario',$asignatura->id,'horarios');
                $this->query('alerta',$asignatura->id,'alertas');
                $this->query('apunte',$asignatura->id,'apuntes');
                $this->query('lectura',$asignatura->id,'lecturas');
                $this->query('calificable',$asignatura->id,'calificables');
            }
        } elseif($publico==0){
           # $this->data['asignaturas'] =json_decode('[{"id":"-1","usuario":"","codigo":"","nombre":"","creditos":"","nota":"","publico":"1"}]');
        }
		echo json_encode($this->data);
	}
	public function getDescripcion($id,$print=false)
	{
        $date = (new DateTime())->format('Y-m-d');
		$out[]=$this->alerta->get(array('asignatura'=>$id,'alerta'=>1,'fecha >='=>"'$date'"));
		$out[]=$this->lectura->get(array('asignatura'=>$id));
		$out[]=$this->alerta->get(array('asignatura'=>$id));
		$_out="";
		foreach($out as $d)if($d){			
			$_out.=$d->nombre."  \n";
			if(isset($d->descripcion))
				$_out.=$d->descripcion."\n";
		}
        if($print){
		echo "<PRE>$_out<br>";
		print_r($out);
		echo "</PRE><br>";
		}
		return $_out;
	}
    public function findImg($q="español",$print=false)
    {
        $q=urlencode($q);
        $var=file_get_contents("https://www.google.com/search?biw=1366&bih=671&tbs=itp%3Aclipart&tbm=isch&sa=1&ei=dSuZW-vwHZK85gKsxLuoCA&q=+$q&oq=+$q&gs_l=img.3..0i67k1l4j0j0i67k1l4j0.6339.6339.0.6524.1.1.0.0.0.0.170.170.0j1.1.0....0...1c.1.64.img..0.1.170....0.bau4MOhaStY",true);
        $long=strlen($var)/50;
        $ram=rand($long,4*$long);
        $ipos=strpos($var,"<img ")+$ram;
        $start=strpos($var,"src=\"",$ipos)+strlen("src=\"");
        $end=strpos($var,"\"",$start);
        $result=substr($var,$start,$end-$start); 
        if($print)echo"<img src='$result'> <br>$ram";
        return $result;
    }
    public function findText($qq="español",$print=false)
    {
        $q=trim($qq);
        $q=urlencode($q);
        $var=file_get_contents("https://es.wikipedia.org/w/index.php?search=$q",true);
        $ipos=strpos($var,"<p");
        $start=strpos($var,">",$ipos)+strlen(">");
        $end=strpos($var,"</p>",$start);
        $result=substr($var,$start,$end-$start); 
        $result=strip_tags(trim($result));
        if(($result==$this->empty)){     
            if(!strpos($q,"+")) $result = $this->empty;
            else foreach(explode("+",$q) as $r){
                if(strlen($r)>2){
                    $out=$this->findText($r);
                    if(($out==$this->empty))
                        continue;
                    $result = $out;
                }
            }
        }
        if($print) echo $result;
        return $result;
    }
	public function sql()
	{
		$query =$this->db->query($this->input->post('script'));
		echo json_encode($query->result());
		//SYSTEM_WS{"url":"sql","script":"SELECT * FROM  `pu_usuario`LIMIT 0 , 30"}           
	}
	public function web($file="login.html"){
		echo file_get_contents("./application/views/pages/examples/$file",true);
	}
	public function test()
	{
		$msj=array(
			'chat'=>-7,
			'usuario'=>0,
			'tipo'=>'file',
			'dato'=>json_encode((Object)array('nombre'=>"server.js",'dato'=>"http://10.0.0.55/server1/pu/"))
		);
		/*
		$msj=array(
			'chat'=>-7,
			'usuario'=>0,
			'tipo'=>'notificacion',
			'dato'=>json_encode((Object)array('asignatura'=>"Notificacion I",'item'=>'2','type'=>'asignatura','data'=>"COPYRIGHT todos los derechos y contenidos intelectuales y gráficos dentro de este mail y sus adjuntos son propiedad de AMC Ecuador Cía. Ltda. Derechos reservados prohibida su copia parcial o total. La información contenida en este mensaje online es confidencial y destinada solamente para el uso de la persona o entidad mencionada. Si el receptor de este mensaje no es la persona de destino mencionada, cualquier divulgación, distribución o copia de la información contenida en este mensaje vía Internet se encuentra totalmente prohibida. Si usted recibe este mensaje por error, por favor notifique al emisor.usted recibe este mensaje por error, por favor notifique al emisor."))
		);
		$msj=array(
			'chat'=>-7,
			'usuario'=>0,
			'tipo'=>'asignatura',
			'dato'=>2342
		);*/

		$this->load->model('pu/Mensaje_model','mensaje');
		echo $this->mensaje->insert($msj)?
			"ok":"error";
	}

	public function sendmail()
	{
		$this->load->library('email');
		//$config['protocol']    = 'smtp';
		//$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['protocol'] = 'ssmtp';
		$config['smtp_host'] = 'ssl://ssmtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'jeigl7@gmail.com';
		$config['smtp_pass']    = '************';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      
		$this->email->initialize($config);
		$this->email->from('jeigl7@gmail.com', 'sender_name');
		$this->email->to('jhordy.abonia@gmail.com'); 
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');  
		$this->email->send();
		echo $this->email->print_debugger();
		/*
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('contacto@123seller.azurewebsites.net', 'Seller Online');
		$this->email->to('jeigl7@gmail.com');
		$this->email->subject("Bienvenido a Seller Online");
		$this->email->message("hola");
		if($this->email->send())
			echo "ok";
			else {
				$this->email
			}*/
	}
}