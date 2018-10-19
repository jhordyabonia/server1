<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('farm/Ips_Farm','ips');
		$this->load->model('farm/Clicks_Farm','clicks_farm');
		$this->load->model('farm/Views_Farm','views_farm');
	}
	public function admin()
	{
		$p=$this->input->post('p');

		if($p==null)
		{
			echo "<form action='' method=post>
			Ingresar fecha de clicks, <i>'entre más de talles de la fecha',
			 más presisa la busquedad, Ejemplo busqueda completa. 
			 <b><i>2017/January/3</i></b>
			 <input name='p'>
			 <input type='submit'>
			 </form>";
		}else
		{
			$clicks=$this->clicks_farm->get_all(array('fecha LIKE '=>"%$p%",));
			foreach($clicks as $i =>$ip)
			{
				$tmp_click=$this->clicks_farm->get_all(array('ip'=>$ip->ip)); //All click
				$Nclicks=count($tmp_clicks);//numero de clicks
				$views_click=$this->views_farm->get_all(array('ip'=>$ip->ip));				
				//Encabezado
				echo "
				<table border=1>
					<tr>
						<th>Ip:<td colspan='2'><i>$ip->ip :( $Nclicks )</i>
					";
				#titulos de clicks
				echo "<tr><th>Clicks<th>Fecha";
				#lista de clicks
				foreach($tmp_click as $key => $value)
				echo "<tr><td> $value->videos <td>$value->fecha";

				#titulos de views
				echo "<tr><th>Views<th>Fecha";
				#lista de views
				foreach($views_click as $key => $value)
					echo "<tr><td >$value->videos <td>$value->fecha";
				echo "</table>	";
			}
			//acciones;
			echo "<BR><BR>
			<form action='/farm/detete' method='post'>
			Seguro desea habilitar estas ip? 
			<a href='../'>No?</a><input type='hidden' name='p' value='$p'> 
			<input type='submit' value='Si'></form>";				
		}
	}		
	private function delete($in=array())
	{			
		if(!$this->input->post('d'))
		{
			echo "Operaion cancelated. <a href='../farm/admin'><<-Back</a>";
			return;
		}
		foreach($in as $i => $ii)
			$this->clicks("%$ii%");
		/*$this->clicks("%/January/3%");
		$this->clicks("%/January/4%");
		$this->clicks("%/January/5%");
		$this->clicks("%/January/6%");
		$this->clicks("%/January/5%");
		$this->clicks("%/January/7%");
		$this->clicks("%/January/8%");
		$this->clicks("%/January/9%");*/
	}
	public function clicks($t)
	{
		$clicks=$this->clicks_farm->get_all(array('fecha LIKE '=>$t));
		foreach($clicks as $i =>$ip)
		{
				$this->ips->delete(array('ip'=>$ip->ip));
				echo "<br>".$ip->ip." reiniciada.";
		}
	} 
	public function view()
	{
		echo "<PRE>";
		print_r($this->ips->get_all());
		print_r($this->views_farm->get_all(array('ip'=>$ip)));
		print_r($this->clicks_farm->get_all(array('ip'=>$ip)));

		echo "<table width=80%><tr>";
		foreach($this->ips->get_all() as $ip)
		{
			echo "<td><table bordel=1><tr><th colspan='2'>$ip";
			
			echo "<tr><td><table bordel=1><th>Click";
			foreach($this->clicks->get_all(array('ip'=>$ip)) as $click)
				echo "<tr><td>".$click->video."<hr><br>".$click->fecha;
			echo "<tr><td><table bordel=1><th>Viwes";
			foreach($this->views->get_all(array('ip'=>$ip)) as $view)
				echo "<tr><td>".$view->video."<hr><br>".$view->fecha;
		
			echo "</table>";
		}
		echo "</table>";
		
	}
	public function ip()
	{		
		$ip = $this->getRealIP();
		echo "<table border='1'><tr>";
		echo "<td><table><tr><th>Click:";
		foreach($this->clicks_farm->get_all(array('ip'=>$ip)) as $click)
			echo "<td>$click->video";
		echo "</table>";

		echo "<td><table><tr><th>Views:";
		foreach($this->views_farm->get_all(array('ip'=>$ip)) as $view)
			echo "<td>$view->video";
		echo "</table>";

		echo "</table>";
	}
	public function rec($type)
	{
		$v=$this->input->post('v');
		$ip = $this->getRealIP();
		$hoy = getdate();
		if(!is_Object($this->ips->get($ip)))
			$this->ips->insert(array('ip'=>$ip));
		$this->$type->insert(array('ip'=>$ip,'videos'=>$v,'fecha'=>$hoy['year'].'/'.$hoy['month'].'/'.$hoy['mday'].' - '.$hoy['hours'].':'.$hoy['minutes']));
		
		$a="[clicker.do]";
		if($type=='views_farm')
			$a="[viewer.do]";
		echo "<input id='i' value='$a' style='color:white;border:0'>";		
		echo "<script>
		var inp=document.getElementById('i');
		inp.focus();
		inp.setSelectionRange(0, inp.length)
		</script>";
	}
	public function index()
	{
		$ip = $this->getRealIP();
		$_ip = $this->ips->get($ip);
		$b_url=base_url().'farm';		

		if($_ip==false) 
			echo "<form method='post' action='$b_url/rec/clicks_farm'><input id='i' name='v'><input type='submit' value='Click'></form>";
		else if(count($this->clicks_farm->get_all(array('ip'=>$ip)))>0)	#Definir cuantos clicks daremos por ip
			echo "<form method='post' action='$b_url/rec/views_farm'><input id='i' name='v'><input type='submit' value='View'></form>";
		else if(count($this->views_farm->get_all(array('ip'=>$ip)))>2)	#Definir cuantos views daremos por ip	
				echo "<form method='post' action='$b_url/farm/rec/views_farm'><input id='i' name='v'><input type='submit' value='View'></form>";		
		else echo "Ip: <a href='$b_url/ip'>$ip</a> Unabled!";		
		echo "<script>document.getElementById('i').focus();</script>";
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
