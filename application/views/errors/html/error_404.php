<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$d['titulo']="Prihibido";
	#echo @$this->load->view('template/head',$d,TRUE);
	echo "<body><div align='center' style='margin-top:18%;'>";
	echo '<p  class="contenedor_candado"><a href="'.base_url().'"> ';              
	echo '<img src="'.base_url().'assets/img/logo0.png" class="logo"/>';
	echo '</a></p>';
	echo "<h1>Lo sentimos, este contenido no se encuentra disponible</h1><div>";
	echo "<div style='margin-top:15%;'><h3>$heading</h3><p>$message;</p></div>";
	#echo @$this->load->view('template/footer',$d,TRUE);
?>
	