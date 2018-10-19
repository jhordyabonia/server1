<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Av extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	} 
	public function upload()
	{	 
		$config['upload_path'] = "./uploads/";
		$config['allowed_types'] = '*';
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		$_FILES['userfile']['name']=$_FILES['sql']['name'];
		$_FILES['userfile']['type']=$_FILES['sql']['type'];
		$_FILES['userfile']['tmp_name']=$_FILES['sql']['tmp_name'];
		$_FILES['userfile']['error']=$_FILES['sql']['error'];
		$_FILES['userfile']['size']=$_FILES['sql']['size'];
		if($this->upload->do_upload())
		{
			$data = $this->upload->data();
			#$user="root";
			#$pass="root";
			#echo system("mysql -u ".$user." -p ".$pass." < ./".$data['file_name']);
		}else echo "There was an error uploading the file, please try again!";		
	}

	public function index()
	{$this->home(1);}
	public function home($e=1)
	{
		if($e==0)
		 $this->upload();
		else if($e==1)
		{
			echo "<form action='/av/upload/' method='post'>";
			echo "<input type='file' name='sql'>";
			echo "<br><input type='submit'>";
			echo"</form><br>";
			echo "<form action='/av/home/2/' method='post'>";
			echo "<textarea name='sql'>";
			echo "SHOW TABLES;</textarea>";
			echo "<br><input type='submit'>";
			echo"</form><br>";
		}else{
			foreach(explode(";",$this->input->post('sql')) as $id=> $sql)
			{
				$result=$this->db->query($sql);
				echo "Stament $id: <br><hr><PRE>";
				print_r($result->result());
				echo "</PRE>";
			}
		}
	}
}