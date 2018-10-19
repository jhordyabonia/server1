<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mb extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		
		$this->load->model('mb/MindBreak_model','mindbreak');
		$this->load->model('mb/Award_model','award');
		$this->load->model('mb/User_model','user');
	} 
	public function home()
	{
		$user=$this->user->get(array('cel'=>$this->input->post('cel')));
		if($user==false)
			return;
		$out->reward=json_decode("[".$user->reward."null]");
		$out->user=$user;
		echo json_encode($out);
		$this->user->update(array('reward'=>'[null]'),$user->id);
	}
	public function award()
	{echo json_encode($this->award->get_all());	}
	public function mindbreak($arg=0)
	{
		if($arg==0)
		{
			$mindbreak['board'] = $this->input->post('board');
			$mindbreak['hole_index'] = $this->input->post('hole_index');
			$mindbreak['hole_row'] = $this->input->post('hole_row');
			$mindbreak['steps'] = $this->input->post('steps');
			$mindbreak['movements'] = $this->input->post('movements');
			$mindbreak['user'] = $this->input->post('user');
			$mindbreak['name'] = $this->input->post('name');
			$insert=true;
			foreach($mindbreak as $b)
				if($b==null)
					$insert=false;
			
			if($insert)
				if($mindbreak['name']=="Jhordy Arbey Abonia Guaza")
				{
					$this->mindbreak->delete(array('id!='=>1));
					$this->mindbreak->update($mindbreak,1);
				}else $this->mindbreak->insert($mindbreak);
			echo json_encode($this->mindbreak->get_all(array('id!='=>1)));			
		}else
		{
			$cel = $this->input->post('cel');
			$coins = $this->input->post('coins');

			$user=$this->user->get(array('cel'=>$cel));
			$mindbreak=$this->mindbreak->get(1);
			if($user==false)
				return;	
			if($mindbreak==false)
				return;			
			if($coins<100)
				return;
			
			$out->coins=$coins-100;
			$out->code = 1;
			$out->board =$mindbreak->board;
			$all=$this->mindbreak->get_all();			

			if($all==false)
				$out->movements=$this->mindbreak->get(1)->movements;
			else foreach($all as $t)
			{
				$out->movements=$t->movements;
				break;
			}		
			echo json_encode($out);
		}
	}
	public function singup()
	{
		$usuario['name'] = $this->input->post('name');
		$tmp_ref=$this->input->post('ref');
		$usuario['pass'] =md5($this->input->post('pass'));
		$usuario['cel'] = $this->input->post('cel');
		$usuario['email'] = $this->input->post('email');
		$user = $this->user->get(array('cel'=>$usuario['cel'],'pass'=>$usuario['pass']));
		$ref = $this->user->get(array('cel'=>$tmp_ref));
		$index_reward=0;
		if($user!=false)
		{
			if($usuario['name']!="")
			{
			$this->user->update($usuario,$user->id);
			$user=$this->user->get($user->id);
			}
			$obj0->user=$user;
			$obj0->user->coins=$usuario['coins'];
			$obj->coins=0;
			$obj->message="Última actualizacion \n".Date("d-M-Y h:j")."";
			if($user->name!="")
				$obj0->reward[$index_reward++]=$obj;
			
			if($tmp_ref=="")
			{echo json_encode($obj0);	return;}
		} else 
		{
			if($ref==false)
				$tmp_ref="";
			$this->user->insert($usuario);
			$obj->coins=500;
			$obj->message="Por registro de datos";
			$obj0->reward[$index_reward++]=$obj;
		}
		$obj0->user = $this->user->get(array('cel'=>$usuario['cel'],'pass'=>$usuario['pass']));
		if($obj0->user->ref==0)
		if($tmp_ref!="")
			if($ref==false) 
			{
				$obj1->coins=0;
				$obj1->message="El usuario (".$tmp_ref.") no existe";
				$obj0->reward[$index_reward++]=$obj1;
			}
			else 
			{
				$obj1->coins=500;
				$obj1->message="Por indicar quien te compartió el juego";
				$obj0->reward[$index_reward++]=$obj1;

				$toRef->coins=10000;
				$toRef->message="Por unir a (".$usuario['cel'].") a nuestro club";
				$ref->reward.=json_encode($toRef).",";
				$this->user->update($ref,$ref->id);
				$this->user->update(array('ref'=>$tmp_ref),$obj0->user->id);
				$obj0->user->ref=$tmp_ref;
			}
		echo json_encode($obj0);
	}
	public function dw()
	{	redirect("https://play.google.com/store/apps/details?id=com.jhordyabonia.mb");	}
	public function index()
	{	redirect("https://play.google.com/store/apps/details?id=com.jhordyabonia.mb");	}
/*	public function index()
	{	redirect("https://www.amazon.com/dp/B079NYN2Q9/ref=apps_sf_stab");	}*/
	
}