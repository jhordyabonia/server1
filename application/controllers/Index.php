<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{parent::__construct();	} 
	public function index()
	{	redirect("https://play.google.com/store/apps/details?id=com.jhordyabonia.mb");	}
	
}