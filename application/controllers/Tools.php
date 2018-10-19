<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    }
    function departamentos()
    {        
		$this->db->where("id_departamento LIKE ","%%" );
        $municipios = $this->db->get('departamento');
         
       foreach ($municipios->result() as $row)
       echo "<option value='$row->id_departamento'>$row->nombre</option>";
	
    } 
    function municipio_select() 
	{
        $dept = $_POST['dept'];
		$this->db->where("id_departamento", $dept );
		$municipios = $this->db->get('municipio');
        echo '<option value="0">--Municipios--</option>';
         if ($dept=="14")         
        echo '<option value="524">BOGOTÁ DC</option> <option value="0">--------</option>';
        elseif($dept=="30")
        echo '<option value="1071">CALI</option><option value="0">--------</option>';
        elseif($dept=="2")
        echo '<option value="82">MEDELLIN</option><option value="0">--------</option>';
       
       foreach ($municipios->result() as $row)
       echo "<option value='$row->id_municipio'>$row->municipio</option>";
	}

}